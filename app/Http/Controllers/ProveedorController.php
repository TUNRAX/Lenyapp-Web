<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Usuario;
use Illuminate\Http\Request;
use App\Producto;
use App\Imagen;
use App\Compra;
use App\Cliente;
use App\Calificacion;
use App\TipoProducto;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ProveedorController extends Controller
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

    public function paginaProductos()
    {
        $proveedor = Proveedor::where('id_usuario', auth()->user()->id)->first();

        $productos = Producto::where('id_proveedor', $proveedor->id)->get();

        $tipos = TipoProducto::all();


        $imagenes = Imagen::all();
        return view('paginaProductos')->with(['productos' => $productos, 'tipos' => $tipos,'imagenes'=>$imagenes]);
    }

    public function paginaEntregas()
    {
        $proveedor =  Proveedor::where('id_usuario', auth()->user()->id)->first();
        $productos = Producto::where('id_proveedor', $proveedor->id)->get();
        $clientes = Cliente::all();
        $tipos = TipoProducto::all();

        $entregas = Compra::select()
            ->join('detalle_producto', 'detalle_producto.id', '=', 'historial_envio.id_detalle_producto')
            ->where('detalle_producto.id_proveedor', $proveedor->id)
            ->paginate(6);

        return view('paginaEntregas')->with(['entregas' => $entregas, 'productos' => $productos, 'clientes' => $clientes, 'tipos' => $tipos]);
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
            'nombre' => 'required',
            'apellido' => 'required',
            'nombre_empresa' => 'required',
            'rut' => 'required',
            'direccion' => 'required',
            'email' => 'required',
            'contrasenya' => 'required',
            'rep_contrasenya' => 'required'
        ]);


        if ($request->contrasenya == $request->rep_contrasenya) {
            if (Proveedor::where('rut', '=', $request->rut)->exists()) {
                return Redirect::back()->withErrors(['El rut ingresado ya esta en uso'])->withInput(Input::all());
            } else {
                if (Usuario::where('email', '=', $request->email)->exists()) {
                    return Redirect::back()->withErrors(['El email ingresado ya esta en uso'])->withInput(Input::all());
                } else {
                    $usuario = new Usuario;
                    $usuario->email = $request->email;
                    $usuario->contrasenya = sha1($request->contrasenya);
                    $usuario->activo = 0;
                    $usuario->id_rol = 3;

                    $usuario->save();
                }
            }
        } else {
            return Redirect::back()->withErrors(['Las contraseñas deben ser iguales'])->withInput(Input::all());
        }




        $id_usuario = $usuario->id;

        $proveedor = new Proveedor;
        $proveedor->nombre = $request->nombre;
        $proveedor->apellido = $request->apellido;
        $proveedor->nombre_empresa = $request->nombre_empresa;
        $proveedor->rut = $request->rut;
        $proveedor->direccion = $request->direccion;
        $proveedor->id_usuario = $id_usuario;
        $proveedor->calificacion = 0;

        $proveedor->save();


        return redirect()->route('paginaProveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'nombre_empresa' => 'required',
            'direccion' => 'required',
        ]);

        $proveedor = Proveedor::find($id);

        $proveedor->nombre = $request->get('nombre');
        $proveedor->apellido = $request->get('apellido');
        $proveedor->nombre_empresa = $request->get('nombre_empresa');
        $proveedor->direccion = $request->get('direccion');

        $proveedor->save();


        return redirect()->route('paginaProveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }

    public function datosProveedor($id)
    {

        $tipos = TipoProducto::all();

        $proveedor = Proveedor::where('id_usuario', $id)->first();

        $productos = Producto::where('id_proveedor', $proveedor->id)->get();

        if ($productos->isEmpty()) {
            return redirect()->back()->withErrors(['El proveedor seleccionado no contiene productos a la venta']);
        }

        $calificacion = Calificacion::where('id_proveedor', $proveedor->id)->get();
        $cali = $calificacion->count();

        $proveedor->calificacion = $cali;
        $proveedor->save();

        $imagenes = Imagen::all();

        $cliente =  Cliente::where('id_usuario', auth()->user()->id)->first();
        $compras = Compra::where('id_cliente', $cliente->id)->get();
        return view('datosProveedor')->with(['productos' => $productos, 'cali' => $cali, 'compras' => $compras, 'proveedor' => $proveedor, 'tipos' => $tipos,'imagenes'=>$imagenes]);
    }

    public function paginaEntregasConfirmadas()
    {
        $proveedor =  Proveedor::where('id_usuario', auth()->user()->id)->first();
        $clientes = Cliente::all();
        $tipos = TipoProducto::all();



        $entregas = Compra::select()
            ->join('detalle_producto', 'detalle_producto.id', '=', 'historial_envio.id_detalle_producto')
            ->where('historial_envio.estado', 1)
            ->where('detalle_producto.id_proveedor', $proveedor->id)
            ->get();

        return view('paginaEntregasConfirmadas')->with(['entregas' => $entregas, 'clientes' => $clientes, 'tipos' => $tipos]);
    }

    public function entregaFechas(Request $request)
    {
        $proveedor =  Proveedor::where('id_usuario', auth()->user()->id)->first();
        $clientes = Cliente::all();
        $tipos = TipoProducto::all();


        $fecha1 = $request->get('fecha1');
        $fecha2 = $request->get('fecha2');

        $entregas = Compra::select()
            ->join('detalle_producto', 'detalle_producto.id', '=', 'historial_envio.id_detalle_producto')
            ->when($fecha1 && $fecha2, function ($query) use ($fecha1, $fecha2) {
                return $query->whereBetween('historial_envio.fecha_envio', [$fecha1, $fecha2]);
            })
            ->where('historial_envio.estado', 1)
            ->where('detalle_producto.id_proveedor', $proveedor->id)
            ->get();



        return view('paginaEntregasConfirmadas')->with(['entregas' => $entregas, 'clientes' => $clientes, 'tipos' => $tipos, 'fecha1' => $fecha1, 'fecha2' => $fecha2]);
    }

    public function imprimir(Request $request)
    {
        $fecha1 = $request->get('fecha1');
        $fecha2 = $request->get('fecha2');
        $total = 0;
        $proveedor =  Proveedor::where('id_usuario', auth()->user()->id)->first();
        $clientes = Cliente::all();
        $tipos = TipoProducto::all();


        if ($fecha1 == 'default') {
            $entregas = Compra::select()
                ->join('detalle_producto', 'detalle_producto.id', '=', 'historial_envio.id_detalle_producto')
                ->where('historial_envio.estado', 1)
                ->where('detalle_producto.id_proveedor', $proveedor->id)
                ->get();

            foreach ($entregas as $entrega) {
                $total += $entrega->precio_unitario * $entrega->cantidad;
            }
   

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('pdf', compact('entregas', 'tipos', 'clientes','total'));
            return $pdf->download('ganancias.pdf');

            return back();
        } else {
            $entregas = Compra::select()
                ->join('detalle_producto', 'detalle_producto.id', '=', 'historial_envio.id_detalle_producto')
                ->when($fecha1 && $fecha2, function ($query) use ($fecha1, $fecha2) {
                    return $query->whereBetween('historial_envio.fecha_envio', [$fecha1, $fecha2]);
                })
                ->where('historial_envio.estado', 1)
                ->where('detalle_producto.id_proveedor', $proveedor->id)
                ->get();

            foreach ($entregas as $entrega) {
                $total += $entrega->precio_unitario * $entrega->cantidad;
            }


            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('pdf', compact('entregas', 'tipos', 'clientes','total'));
            return $pdf->download('ganancias.pdf');
        }
    }
}
