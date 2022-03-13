<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(5);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categoriaCant =[ 'Bulto','Libra','Arroba','Kilo'];
        $categoriaProd = ['Granos','Frutas','Tuberculos'];
        return view('producto.create',compact('categoriaCant','categoriaProd'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Cantidad'=> 'in:Bulto,Libra,Arroba,Kilo',
            'Categoria'=> 'in:Granos,Frutas,Tuberculos',
            'Descripcion'=>'required|string|max:600',
            'Precio'=>'required|numeric|min:0',
            'Descuento'=>'required|numeric|min:0|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La imagen es requerida',
            'Cantidad.in' => 'Se debe seleccionar una opcion de cantidad',
            'Categoria.in' => 'Se debe seleccionar una opcion de categoria',
            'Descripcion.required'=>'La descripcion es requerida'
        ];
        $this->validate($request, $campos,$mensaje);

        $datosProducto = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Producto::insert($datosProducto);
        return redirect('producto')->with('mensaje','Producto agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $categoriaCant =[ 'Bulto','Libra','Arroba','Kilo'];
        $categoriaProd = ['Granos','Frutas','Tuberculos'];
        return view('producto.edit',compact('producto','categoriaCant','categoriaProd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'Cantidad'=> 'in:Bulto,Libra,Arroba,Kilo',
            'Categoria'=> 'in:Granos,Frutas,Tuberculos',
            'Descripcion'=>'required|string|max:600',
            'Precio'=>'required|numeric|min:0',
            'Descuento'=>'required|numeric|min:0|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Cantidad.in' => 'Se debe seleccionar una opcion de cantidad',
            'Categoria.in' => 'Se debe seleccionar una opcion de categoria',
            'Descripcion.required'=>'La descripcion es requerida'
        ];
        if($request->hasFile('Imagen'))
        {
            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'La imagen es requerida'];
        }

        $this->validate($request, $campos,$mensaje);

        $datosProducto = $request->except(['_token', '_method']);

        if($request->hasFile('Imagen'))
        {
            $producto=Producto::findOrFail($id);
            Storage::delete('public/'.$producto->Imagen);
            $datosProducto['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Producto::where('id','=',$id)->update($datosProducto);

        $producto=Producto::findOrFail($id);
        return redirect('producto')->with('mensaje','Producto modificado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);
        if(Storage::delete('public/'.$producto->Imagen)){
            Producto::destroy($id);
        }
        return redirect('producto')->with('mensaje','Producto eliminado');
    }
}
