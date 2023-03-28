<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['libros']= Libro::paginate(3);
        return view('libro.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // $datosLibro = $request->all();

        $campos=[
            'Autor' =>'required|string|max:100',
            'Año'   =>'required|int|max:2100',
            'ISBN'  =>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Idioma'=>'required|string|max:100',
            'Genero'=>'required|string|max:100'
        ];
        $mensaje=[
            'required' =>   'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);




       $datosLibro = request()->except('_token');
       Libro::insert($datosLibro);

        //return response()->json($datosLibro);
        return redirect('libro')->with('mensaje','Libro agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $libro=Libro::findOrFail($id);
        return view('libro.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos=[
            'Autor' =>'required|string|max:100',
            'Año'   =>'required|int|max:2100',
            'ISBN'  =>'required|string|max:100',
            'Nombre'=>'required|string|max:100',
            'Idioma'=>'required|string|max:100',
            'Genero'=>'required|string|max:100'
        ];
        $mensaje=[
            'required' =>   'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosLibro = request()->except(['_token','_method']);
        Libro::where('id','=',$id)->update($datosLibro);

        $libro=Libro::findOrFail($id);
        //return view('libro.edit', compact('libro'));

        
        return redirect('libro')->with('mensaje','Libro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Libro::destroy($id);
        return redirect('libro')->with('mensaje','Libro Borrado');
    }
}
