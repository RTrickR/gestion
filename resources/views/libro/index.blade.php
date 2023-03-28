@extends('layouts.app')
@section('content')
<div class="container">


    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
    @endif

    





<a href="{{ url('libro/create') }}" class="btn btn-success" >Registrar Libro</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Autor</th>
            <th>Año</th>
            <th>ISBN</th>
            <th>Nombre</th>
            <th>Idioma</th>
            <th>Genero</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $libros as $libro)
        <tr>
            <td>{{ $libro->id}}</td>
            <td>{{ $libro->Autor}}</td>
            <td>{{ $libro->Año}}</td>
            <td>{{ $libro->ISBN}}</td>
            <td>{{ $libro->Nombre}}</td>
            <td>{{ $libro->Idioma}}</td>
            <td>{{ $libro->Genero}}</td>
            <td>
            
            <a href="{{ url('/libro/'.$libro->id.'/edit') }}" class="btn btn-warning">
                
            Editar

            </a>
             | 
                
            <form action="{{ url('/libro/'.$libro->id ) }}" class="d-inline" method="post">
            @csrf 
            {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Confirmar Borrado?')" value="Borrar" class="btn btn-danger">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $libros->links() !!}
</div>
@endsection