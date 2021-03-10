<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Cliente;
use App\Producto;
use Illuminate\Support\Carbon;
use App\Imagen;
use App\TipoPago;
use App\TipoProducto;

class CompraController extends Controller
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
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        //
    }

    public function paginaCompra($id)
    {
        $tipos = TipoProducto::all();

        $pagos = TipoPago::all();

        $producto = Producto::where('id', $id)->first();

        $imagenes = Imagen::where('id_detalle_producto', $producto->id)->get();

        return view('paginaCompra')->with(['producto' => $producto, 'imagenes' => $imagenes, 'tipos' => $tipos, 'pagos' => $pagos]);
    }

    public function comprar(Request $request)
    {
        $request->validate([
            'cantidad' => 'required',
        ]);

        $cantidad = $request->get('cantidad');
        $id = $request->get('id');

        $cliente = Cliente::where('id_usuario', auth()->user()->id)->first();
        $producto = Producto::where('id', $id)->first();

        $hora = Carbon::now()->format('H:i:s');

        $fecha = Carbon::now()->format('Y-m-d'); //ESTO PUEDE DAR ERROR, SI DA CAMBIAR LA 'Y' AL PRINCIPIO

        /*
        7=espera de pago
        6=espera envio
        4=en transito
        3=en espera
        2=cancelada
        1=confirmada
        */
        $compra = new Compra;
        $compra->fecha = $fecha;
        $compra->id_cliente = $cliente->id;
        $compra->id_detalle_producto = $producto->id;
        $compra->hora = $hora;
        $compra->estado = 3;
        $compra->tipo_compra_id = 3;
        $compra->cantidad = $cantidad;
        $compra->pagado = 2;
        $compra->fecha_envio = '1753-01-01';
        $compra->save();
        return redirect()->route('misCompras');
    }

    public function cambiarEstadoCompra($id)
    {
        $compra = Compra::where('id', $id)->first();
        if ($compra->estado == 3) {
            $compra->estado = 2;
            $compra->save();
            return back();
        }
    }
}
