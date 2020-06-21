<?php

namespace App\Http\Controllers;

use App\Ucenik;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class UcenikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nerasporedjeni = 0;
        return view('ucenik.lista', compact('nerasporedjeni'));
    }

    public function tabela(Request $request)
    {
        $ucenici = DB::table('ucenici')
            ->select(
                'ucenici.*', 'odeljenja.naziv', 'smerovi.naziv as smer_naziv',
                DB::raw('IF(ucenici.pol = 1, "Muški", "Ženski") as pol')
            )
            ->leftJoin('odeljenja', 'ucenici.odeljenje_id', 'odeljenja.id')
            ->leftJoin('smerovi', 'ucenici.smer_id', 'smerovi.id')
            ->when($request->get('nerasporedjeni') == 1, function ($query) {
                return $query->whereNull('odeljenje_id');
            });
        return datatables()->of($ucenici)
            ->filterColumn('pol', function($query, $keyword) {
                $sql = 'IF(ucenici.pol = 1, "Muški", "Ženski") like ?';
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('akcija', function ($data) {
                $prikaz = '<a href="'.route('ucenici.show', ['id'=>$data->id]).'" class="btn btn-outline-primary btn-sm" role="button">Prikaži</a>';
                $izmena = '<a href="'.route('ucenici.edit', ['id'=>$data->id]).'" class="btn btn-outline-primary btn-sm" role="button">Izmeni</a>';
                $obrisi = '<a class="btn btn-outline-secondary btn-sm btn-obrisi" data-url="'.route('ucenici.destroy', ['id'=>$data->id]).'">Obriši</a>';
                return $prikaz." ".$izmena.' '.$obrisi;
            })
            ->rawColumns(['akcija', 'radnik'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ucenik.unos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ime_prezime' => 'required',
                'pol' => 'required',
                'datum_rodjenja' => 'required',
                'jmbg' => [
                    'regex:[^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([09][0-9]{2})([0-8][0-9]|9[0-6])([0-9]{3})(\d)$]',
                    'unique:ucenici,jmbg'
                ],
                'broj_bodova' => 'required',
            ]);
            if ($validator->passes()) {
                DB::beginTransaction();
                $datum_rodjenja = \Carbon\Carbon::parse($request->get('datum_rodjenja'));
                $ucenik = new Ucenik();
                $ucenik->ime_prezime = $request->get('ime_prezime');
                $ucenik->pol = $request->get('pol');
                $ucenik->datum_rodjenja = $datum_rodjenja;
                $ucenik->jmbg = $request->get('jmbg');
                $ucenik->broj_bodova = $request->get('broj_bodova');
                $ucenik->save();
                DB::commit();
                return redirect()->route('ucenici.show', $ucenik->id)
                    ->with('success', 'Učenik '.$ucenik->ime_prezime.' je uspešno unet/a.');	
            
            } else {
                return back()->withInput($request->input())->withErrors($validator->errors());
            }
        } catch (\Exception $e) { 
            report($e);
            DB::rollback();
            return back()
                ->withErrors($validator)
                ->withInput($request->input())
                ->with('fail', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ucenik = Ucenik::findOrFail($id);

        return view('ucenik.prikaz', compact('ucenik', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ucenik = Ucenik::findOrFail($id);

        return view('ucenik.izmena', compact('ucenik', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'ime_prezime' => 'required',
                'pol' => 'required',
                'datum_rodjenja' => 'required',
                'jmbg' => [
                    'regex:[^(0[1-9]|[1-2][0-9]|31(?!(?:0[2469]|11))|30(?!02))(0[1-9]|1[0-2])([09][0-9]{2})([0-8][0-9]|9[0-6])([0-9]{3})(\d)$]',
                    'unique:ucenici,jmbg,'.$id
                ],
                'broj_bodova' => 'required',
            ]);
            if ($validator->passes()) {
                DB::beginTransaction();
                $datum_rodjenja = \Carbon\Carbon::parse($request->get('datum_rodjenja'));
                $ucenik = Ucenik::findOrFail($id);
                $ucenik->ime_prezime = $request->get('ime_prezime');
                $ucenik->pol = $request->get('pol');
                $ucenik->datum_rodjenja = $datum_rodjenja;
                $ucenik->jmbg = $request->get('jmbg');
                $ucenik->broj_bodova = $request->get('broj_bodova');
                $ucenik->save();
                DB::commit();
                return redirect()->route('ucenici.show', $ucenik->id)
                    ->with('success', 'Učenik '.$ucenik->ime_prezime.' je uspešno izmenjen/a.');	
            
            } else {
                return back()->withInput($request->input())->withErrors($validator->errors());
            }
        } catch (\Exception $e) { 
            report($e);
            DB::rollback();
            return back()
                ->withErrors($validator)
                ->withInput($request->input())
                ->with('fail', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $ucenik = Ucenik::findOrFail($id);
            $ucenik_podaci = $ucenik->ime_prezime;
            $ucenik->delete();
            return \Session::flash('success', 'Učenik '.$ucenik_podaci.' je uspešno obrisan/a!');
        } catch (\Exception $e) { 
            report($e);
            return \Session::flash('fail', 'Operacija nije uspela! '. $e->getMessage());
        }
    }
}
