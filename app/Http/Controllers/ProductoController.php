<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Usuario;
use App\Proveedor;
use App\Imagen;
use App\Cliente;
use Illuminate\Support\Carbon;
use App\Compra;
use App\TipoProducto;

class ProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoProducto::all();
        return view('crearProducto')->with(['tipos' => $tipos]);
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
        $request->validate([
            'tipo_producto' => 'required',
            'medida' => 'required',
            'precio_unitario' => 'required',
            'venta_minima' => 'required',
            'imagenes' =>'required'
        ]);

        $id_usuario = auth()->user()->id;
        $proveedor = Proveedor::where('id_usuario', $id_usuario)->first();

            

        $producto = new Producto;
        $producto->tipo_producto_id = $request->tipo_producto;
        $producto->medida = $request->medida;
        $producto->precio_unitario = $request->precio_unitario;
        $producto->venta_minima = $request->venta_minima;
        $producto->id_proveedor = $proveedor->id;

        $producto->save();

        
        $archivos = $request->file('imagenes');
        $ruta = 'img';

        foreach ($archivos as $archivo) {
            $img = new Imagen();
            $nombre = bin2hex(random_bytes(5));
            $img->nombre = $nombre;
            $img->id_detalle_producto = $producto->id;
            $imagen_carpeta = $nombre . '.jpg';
            $archivo->move($ruta, $imagen_carpeta);
            $img->save();
        }

        return redirect()->route('paginaProductos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::where('id', $id)->first();

        $imagenes = Imagen::where('id_detalle_producto', $producto->id)->get();

        $tipos = TipoProducto::all();
        //devolver las imagenes
        return view('editarProducto')->with(['producto' => $producto, 'imagenes' => $imagenes, 'tipos' => $tipos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required',
            'medida' => 'required',
            'precio_unitario' => 'required',
            'venta_minima' => 'required',
        ]);


        $producto = Producto::find($id);

        $producto->tipo_producto_id = $request->get('tipo');;
        $producto->medida = $request->get('medida');
        $producto->precio_unitario = $request->get('precio_unitario');
        $producto->venta_minima = $request->get('venta_minima');



        $archivos = $request->file('imagenes');
        $ruta = 'img';
        $producto->save();
        if ($request->hasFile('imagenes')) {

            foreach ($archivos as $archivo) {

                $img = new Imagen();
                $nombre = bin2hex(random_bytes(5));
                $img->nombre = $nombre;
                $img->id_detalle_producto = $producto->id;
                $imagen_carpeta = $nombre . '.jpg';
                $archivo->move($ruta, $imagen_carpeta);
                $img->save();
            }
        }
        return redirect()->route('paginaProductos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::where('id', $id)->first();
        $img = Imagen::where('id_detalle_producto', $producto->id);
        $img->delete();
        $producto->delete();


        return redirect()->back();
    }

    public function borrarImagen($id)
    {
        $imagen = Imagen::find($id);
        $image_path = public_path() . '/img/' . $imagen->nombre . '.jpg';
        $imagen->delete();
        unlink($image_path);
        return back();
    }
}
