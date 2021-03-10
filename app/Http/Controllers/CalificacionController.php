<?php

namespace App\Http\Controllers;

use App\Calificacion;
use App\Cliente;
use Illuminate\Http\Request;
use App\Proveedor;

class CalificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Calificacion $calificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Calificacion $calificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calificacion $calificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calificacion $calificacion)
    {
        //
    }
    public function agregarCalificacion($id)
    {
        $id_usuario =  auth()->user()->id;

        $aux = Calificacion::where(['id_proveedor' => $id, 'id_usuario' => $id_usuario])->first();

        if (empty($aux)) {
            $calificacion = new Calificacion;
            $calificacion->id_proveedor = $id;
            $calificacion->id_usuario = $id_usuario;
            $calificacion->save();
        } else {
            $aux->delete();
        }

        return back();
    }

    public function mejoresCalificados()
    {
        $proveedores = Proveedor::having('calificacion', '>=', 1)->orderBy('calificacion', 'desc')->take(5)->get();
        return view('mejoresCalificados')->with(['proveedores' => $proveedores]);
    }
}
