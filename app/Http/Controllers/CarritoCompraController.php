<?php

namespace App\Http\Controllers;

use App\Models\carritoCompra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarritoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos'] = Producto::select('productos.Id','productos.Nombre','productos.Imagen','productos.Precio',
                                                'productos.Descuento','productos.Cantidad','carritocompras.cantidad')
                ->from('productos')
                ->join('carritocompras', function($query){
                    $query->on('productos.id','=','carritocompras.id_producto');
                })->get();
        return view('pagina.carrito',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $producto = DB::insert('insert into carritocompras (username,id_producto, cantidad) values (?, ?,?)', ['none',$id,1]);
        return redirect('/carrito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function existe($id)
    {
        $producto = DB::table('carritocompras')
        ->where('id_producto', '=', $id)->get();

        
        if(count($producto)>0){
            $this->update($id,"+");
            
        }else{
            $this->create($id);
            
        }

        return redirect('/carrito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function show(carritoCompra $carritoCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(carritoCompra $carritoCompra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function update($id, $operacion)
    {
        if(strcmp($operacion,'+')==0){
            $datosCarrito = DB::update('update carritocompras set cantidad = cantidad+1 where id_producto = ?', [$id]);
        }else{
            
            $datosCarrito = DB::update('update carritocompras set cantidad = cantidad-1 where id_producto = ? and cantidad > 1', [$id]);
        }
        
        return redirect('/carrito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carritoCompra  $carritoCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB :: delete('DELETE FROM carritocompras WHERE id_producto = ?',[$id]);   
        return redirect('/carrito');
    }
    public function vaciar()
    {
        DB :: delete('DELETE FROM carritocompras');   
        return redirect('/carrito');
    }

 
}
