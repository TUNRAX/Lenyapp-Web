<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Geocoder\Facades\Geocoder;
use App\Proveedor;
use App\Cliente;
use App\Usuario;
use FarhanWazir\GoogleMaps\GMaps;
use App\Reporte;
use App\TipoPago;
use App\TipoProducto;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('registroProveedor', 'registroCliente', 'index');
        $this->middleware('roles:1,2,3')->except('registroProveedor', 'registroCliente', 'index', 'paginaCliente', 'paginaProveedor', 'administrarProveedor', 'administrarCliente', 'administrarReportes', 'administrarProductos','administrarPagos'); //poner las rutas que no estan restringidas
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function registroCliente()
    {

        return view('registroCliente');
    }

    public function registroProveedor()
    {

        return view('registroProveedor');
    }

    public function index()
    {

        return view('index');
    }

    public function paginaCliente()
    {
        $cliente = Cliente::where('id_usuario', auth()->user()->id)->first();
        return view('paginaCliente')->with(['cliente' => $cliente]);
    }

    public function paginaProveedor()
    {
        $proveedor = Proveedor::where('id_usuario', auth()->user()->id)->first();
        return view('paginaProveedor')->with(['proveedor' => $proveedor]);
    }

    public function administrarProveedor()
    {
        $usuarios = Usuario::where('id_rol', 3)->get();
        $proveedores = DB::table('proveedor')->paginate(6);
        return view('administrarProveedor')->with(['proveedores' => $proveedores, 'usuarios' => $usuarios]);
    }

    public function administrarCliente()
    {
		$usuarios = Usuario::where('id_rol', 2)->get();
		$clientes = DB::table('cliente')->paginate(6);


        return view('administrarCliente')->with(['clientes' => $clientes, 'usuarios' => $usuarios]);
    }

    public function administrarReportes()
    {
        $reportes = Reporte::paginate(8);
        return view('administrarReportes')->with(['reportes' => $reportes]);
    }

    public function administrarProductos(){
        $tipos = TipoProducto::paginate(8);
        return view('administrarProductos')->with(['tipos' => $tipos]);
    }

    public function administrarPagos(){
        $pagos = TipoPago::paginate(8);
        return view('administrarPagos')->with(['pagos' => $pagos]);
    }

    public function home()
    {
        return view('home');
    }
}
