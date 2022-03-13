<?php

namespace App\Http\Controllers;

use App\Models\Inversionista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InversionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosInv['inversionistas']=Inversionista::paginate(5);
        return view('inversionista.index', $datosInv);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inversionista.create');
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
            'Cargo'=>'nullable|string|max:150',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Descripcion'=>'required|string|max:300',
            'Correo'=>'required|string|max:200'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La imagen es requerida',
            'Descripcion.required'=>'La descripcion es requerida',
        ];
        $this->validate($request, $campos,$mensaje);

        $datosInv = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosInv['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Inversionista::insert($datosInv);
        return redirect('inversionista')->with('mensaje','Inversionista agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function show(Inversionista $inversionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inversionista=Inversionista::findOrFail($id);
        return view('inversionista.edit',compact('inversionista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'Cargo'=>'nullable|string|max:150',
            'Descripcion'=>'required|string|max:300',
            'Correo'=>'required|string|max:200'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Descripcion.required'=>'La descripcion es requerida'
        ];
        if($request->hasFile('Imagen'))
        {
            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'La imagen es requerida'];
        }
        $this->validate($request, $campos,$mensaje);

        $datosInv = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosInv['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }
        $this->validate($request, $campos,$mensaje);

        $datosInv = $request->except(['_token', '_method']);

        if($request->hasFile('Imagen'))
        {
            $inversionista=Invesionista::findOrFail($id);
            Storage::delete('public/'.$emprendimiento->Imagen);
            $datosInv['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Inversionista::where('id','=',$id)->update($datosInv);

        $inversionista=Inversionista::findOrFail($id);
        return redirect('inversionista')->with('mensaje','Inversionista modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inversionista  $inversionista
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inversionista=Inversionista::findOrFail($id);
        if(Storage::delete('public/'.$inversionista->Imagen)){
            Inversionista::destroy($id);
        }
        return redirect('inversionista')->with('mensaje','Inversionista eliminado');
    }
}
