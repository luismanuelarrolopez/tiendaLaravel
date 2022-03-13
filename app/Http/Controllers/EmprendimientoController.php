<?php

namespace App\Http\Controllers;

use App\Models\Emprendimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmprendimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosEmp['emprendimientos']=Emprendimiento::paginate(5);
        return view('emprendimiento.index', $datosEmp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emprendimiento.create');
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
            'Abreviatura'=>'nullable|string|max:150',
            'Imagen'=>'required|max:10000|mimes:jpeg,png,jpg',
            'Ubicacion'=>'required|string|max:200',
            'Telefono'=>'required|string|max:15',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Imagen.required'=>'La imagen es requerida',
            'Ubicacion.required'=>'La ubicacion es requerida',
        ];
        $this->validate($request, $campos,$mensaje);

        $datosEmprendimiento = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosEmprendimiento['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Emprendimiento::insert($datosEmprendimiento);
        return redirect('emprendimiento')->with('mensaje','Emprendimiento agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Emprendimiento $emprendimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emprendimiento=Emprendimiento::findOrFail($id);
        return view('emprendimiento.edit',compact('emprendimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Nombre'=>'required|string|max:150',
            'Abreviatura'=>'nullable|string|max:150',
            'Ubicacion'=>'required|string|max:200',
            'Telefono'=>'required|string|max:15',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Ubicacion.required'=>'La ubicacion es requerida'
        ];
        if($request->hasFile('Imagen'))
        {
            $campos=['Imagen'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Imagen.required'=>'La imagen es requerida'];
        }
        $this->validate($request, $campos,$mensaje);

        $datosEmprendimiento = $request->except('_token');

        if($request->hasFile('Imagen'))
        {
            $datosEmprendimiento['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }
        $this->validate($request, $campos,$mensaje);

        $datosEmprendimiento = $request->except(['_token', '_method']);

        if($request->hasFile('Imagen'))
        {
            $emprendimiento=Emprendimiento::findOrFail($id);
            Storage::delete('public/'.$emprendimiento->Imagen);
            $datosEmprendimiento['Imagen']=$request->file('Imagen')->store('uploads', 'public');
        }

        Emprendimiento::where('id','=',$id)->update($datosEmprendimiento);

        $emprendimiento=Emprendimiento::findOrFail($id);
        return redirect('emprendimiento')->with('mensaje','Emprendimiento modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emprendimiento  $emprendimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprendimiento=Emprendimiento::findOrFail($id);
        if(Storage::delete('public/'.$emprendimiento->Imagen)){
            Emprendimiento::destroy($id);
        }
        return redirect('emprendimiento')->with('mensaje','Emprendimiento eliminado');
    }
}
