<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Usuario;
use App\Proveedor;
use Spatie\Geocoder\Facades\Geocoder;
use Illuminate\Http\Request;
use maxh\Nominatim\Nominatim;
use App\Compra;
use App\Producto;
use App\TipoProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
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
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'rut' => 'required',
            'email' => 'required',
            'contrasenya' => 'required',
            'rep_contrasenya' => 'required'
        ]);


        if ($request->contrasenya == $request->rep_contrasenya) {
            if (Cliente::where('rut', '=', $request->rut)->exists()) {
                return Redirect::back()->withErrors(['El rut ingresado ya esta en uso'])->withInput(Input::all());
            } else {
                if (Usuario::where('email', '=', $request->email)->exists()) {
                    return Redirect::back()->withErrors(['El email ingresado ya esta en uso'])->withInput(Input::all());
                } else {
                    $usuario = new Usuario;
                    $usuario->email = $request->email;
                    $usuario->contrasenya = sha1($request->contrasenya);
                    $usuario->activo = 1;
                    $usuario->id_rol = 2;

                    $usuario->save();
                }
            }
        } else {
            return Redirect::back()->withErrors(['Las contraseñas deben ser iguales'])->withInput(Input::all());
        }


        $id_usuario = $usuario->id;

        $cliente = new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->direccion = $request->direccion;
        $cliente->rut = $request->rut;
        $cliente->id_usuario = $id_usuario;

        $cliente->save();


        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
        ]);

        $cliente = Cliente::find($id);

        $cliente->nombre = $request->get('nombre');
        $cliente->apellido = $request->get('apellido');
        $cliente->direccion = $request->get('direccion');

        $cliente->save();


        return redirect()->route('paginaCliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function mapaProveedor()
    {

        $usuarios = Usuario::all();
        $proveedores = Proveedor::select()
            ->join('usuario', 'usuario.id', '=', 'proveedor.id_usuario')
            ->where('usuario.activo', 1)
            ->get();

        return view('mapaProveedor')->with(['proveedores' => $proveedores, 'usuarios' => $usuarios]);
    }

    public function misCompras()
    {
        $cliente =  Cliente::where('id_usuario', auth()->user()->id)->first();

        $productos = Producto::all();

        $compras = DB::table('historial_envio')->select('*', 'historial_envio.id as he_id')
        ->join('detalle_producto', 'detalle_producto.id','=','historial_envio.id_detalle_producto')
        ->where('historial_envio.id_cliente',$cliente->id)
        ->paginate(6);


        
        $tipos = TipoProducto::all();

        return view('misCompras')->with(['compras' => $compras, 'productos' => $productos,'tipos' => $tipos]);
    }
}
