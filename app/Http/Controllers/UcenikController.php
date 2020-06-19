<?php

namespace App\Http\Controllers;

use App\Ucenik;
use Illuminate\Http\Request;
use DB;

class UcenikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('ucenik.nerasporedjeni');
    }

    public function tabela(Request $request)
    {
        $ucenici = DB::table('ucenici')
            ->select(
                'ucenici.*', 'odeljenja.naziv'
            )
            ->leftJoin('odeljenja', 'ucenici.odeljenje_id', 'odeljenja.id')
            ->when($request->has('nerasporedjeni'), function ($query) {
                return $query->whereNull('odeljenje_id');
            });
        return datatables()->of($ucenici)
            ->addColumn('akcija', function ($data) {
                $prikaz = '<a href="'.route('ucenici.show', ['id'=>$data->id]).'" class="btn btn-secondary" role="button">Prikaži</a>';
                $izmena = '<a href="'.route('ucenici.edit', ['id'=>$data->id]).'" class="btn btn-secondary" role="button">Izmeni</a>';
                $obrisi = '<a class="btn btn-link" onclick="obrisi()" data-url="'.route('ucenici.destroy', ['id'=>$data->id]).'">Obriši</a>';
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
