<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosEven['eventos']=Evento::paginate(5);
        return view('evento.index', $datosEven);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('evento.create');
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
            'Descripcion'=>'required|string|max:600',
            'Ubicacion'=>'required|string|max:200',
            'Fecha'=>'required|string|max:150',
        ];
        $mensaje=[
            'required'=>'La :attribute es requerida',
            'Nombre.required'=>'El nombre es requerido',
        ];
        $this->validate($request, $campos,$mensaje);

        $datosEven = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosEven['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Evento::insert($datosEven);
        return redirect('evento')->with('mensaje','Evento agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento=Evento::findOrFail($id);
        return view('evento.edit',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'Descripcion'=>'required|string|max:600',
            'Ubicacion'=>'required|string|max:200',
            'Fecha'=>'required|string|max:150'
        ];
        $mensaje=[
            'required'=>'La :attribute es requerida',
            'Nombre.required'=>'El nombre es requerido',
        ];
        if($request->hasFile('Imagen'))
        {
            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'La imagen es requerida'];
        }
        $this->validate($request, $campos,$mensaje);

        $datosEven = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosEven['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }
        $this->validate($request, $campos,$mensaje);

        $datosEven = $request->except(['_token', '_method']);

        if($request->hasFile('Imagen'))
        {
            $evento=Evento::findOrFail($id);
            Storage::delete('public/'.$evento->Imagen);
            $datosEven['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Evento::where('id','=',$id)->update($datosEven);

        $evento=Evento::findOrFail($id);
        return redirect('evento')->with('mensaje','Evento modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento=Evento::findOrFail($id);
        if(Storage::delete('public/'.$evento->Imagen)){
            Evento::destroy($id);
        }
        return redirect('evento')->with('mensaje','Evento eliminado');
    }
}
