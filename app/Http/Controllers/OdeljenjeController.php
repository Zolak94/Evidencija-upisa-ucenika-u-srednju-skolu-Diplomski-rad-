<?php

namespace App\Http\Controllers;

use App\Odeljenje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class OdeljenjeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('odeljenje.lista');
    }

    public function tabela()
    {
        $odeljenja = DB::table('odeljenja')
            ->select(
                'odeljenja.*', 'staresine.ime_prezime', 'smerovi.naziv as smer_naziv',
            )
            ->leftJoin('staresine', 'odeljenja.staresina_id', 'staresine.id')
            ->leftJoin('smerovi', 'odeljenja.smer_id', 'smerovi.id');
        return datatables()->of($odeljenja)
            ->addColumn('akcija', function ($data) {
                $prikaz = '<a href="'.route('odeljenja.show', ['id'=>$data->id]).'" class="btn btn-outline-primary btn-sm" role="button">Prikaži</a>';
                $izmena = '<a href="'.route('odeljenja.edit', ['id'=>$data->id]).'" class="btn btn-outline-primary btn-sm" role="button">Izmeni</a>';
                $obrisi = '<a class="btn btn-outline-secondary btn-sm btn-obrisi" data-url="'.route('odeljenja.destroy', ['id'=>$data->id]).'">Obriši</a>';
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
        $smerovi = \App\Smer::all();
        $staresine = \App\Staresina::select('staresine.*')
            ->leftJoin('odeljenja', 'staresine.id', 'odeljenja.staresina_id')
            ->whereNull('odeljenja.staresina_id')
            ->get();
        return view('odeljenje.unos', compact('smerovi', 'staresine'));
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
                'naziv' => 'required',
                'broj_ucenika' => 'required',
                'smer_id' => 'required',
                'staresina_id' => 'required'
            ]);
            if ($validator->passes()) {
                DB::beginTransaction();
                $odeljenje = new Odeljenje();
                $odeljenje->naziv = $request->get('naziv');
                $odeljenje->broj_ucenika = $request->get('broj_ucenika');
                $odeljenje->smer_id = $request->get('smer_id');
                $odeljenje->staresina_id = $request->get('staresina_id');
                $odeljenje->save();
                DB::commit();
                return redirect()->route('odeljenja.show', $odeljenje->id)
                    ->with('success', 'Odeljenje '.$odeljenje->naziv.' je uspešno uneto.');	
            
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
     * @param  \App\Odeljenje  $odeljenje
     * @return \Illuminate\Http\Response
     */
    public function show(Odeljenje $odeljenje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Odeljenje  $odeljenje
     * @return \Illuminate\Http\Response
     */
    public function edit(Odeljenje $odeljenje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Odeljenje  $odeljenje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Odeljenje $odeljenje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Odeljenje  $odeljenje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Odeljenje $odeljenje)
    {
        //
    }
}
