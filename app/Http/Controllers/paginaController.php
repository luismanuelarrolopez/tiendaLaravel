<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Inversionista;
use App\Models\Evento;
use App\Models\Emprendimiento;
use Illuminate\Support\Facades\DB;
class paginaController extends Controller
{
    public function inicio()
    {
        return view('pagina.inicio');
    }
    public function contacto()
    {
        return view('pagina.contacto');
    }

    public function obtenerProducto()
    {
        $datos['productos']=DB::table('productos')->where('Descuento','=',0)->paginate(8);
        return view('pagina.canastaAgricola', $datos);
    }
    public function obtenerEmprendimiento()
    {
        $datos['emprendimientos']=Emprendimiento::paginate();
        return view('pagina.emprendimientos', $datos);
    }
   
    
    public function obtenerProdCategoria($categoria)
    {
        $datos['productos']=DB::table('productos')->where('Categoria','=',$categoria)->paginate(8);
        return view('pagina.canastaAgricola', $datos);
    }
    public function obtenerProdSale()
    {
        $datos['productos']=Producto::paginate();
        return view('pagina.agroOferta', $datos);
    }
    public function obtenerInversionista()
    {
        $datos['inversionistas']=Inversionista::paginate();
        return view('pagina.inversionistas', $datos);
    }
    public function obtenerEvento()
    {
        $datos['eventos']=Evento::paginate();
        return view('pagina.eventos', $datos);
    }
    public function showProducto($id)
    {
        $producto=Producto::findOrFail($id);
        return view('pagina.showProducto',compact('producto'));
    }
}
