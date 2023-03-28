    <h1>{{ $modo }} Libro</h1>

    @if(count( $errors )>0)

        <div class="alert alert-danger" role="alert">
            <ul>
            @foreach( $errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        

    @endif

    <div class="form-group">                               
    <label for="Autor">Autor</label>
    <input type="text" class="form-control" name="Autor" value="{{ isset($libro->Autor)?$libro->Autor:old('Autor') }}" id="Autor"><br>
    </div>

    <div class="form-group"> 
    <label for="Año">Año</label>
    <input type="number" class="form-control" name="Año" value="{{ isset($libro->Año)?$libro->Año:old('Año') }}" id="Año"><br>
    </div>

    <div class="form-group"> 
    <label for="ISBN">ISBN</label>
    <input type="text" class="form-control" name="ISBN" value="{{ isset($libro->ISBN)?$libro->ISBN:old('ISBN') }}" id="ISBN"><br>
    </div> 

    <div class="form-group"> 
    <label for="Nombre">Nombre</label>
    <input type="text" class="form-control" name="Nombre" value="{{ isset($libro->Nombre)?$libro->Nombre:old('Nombre') }}" id="Nombre"><br>
    </div>

    <div class="form-group"> 
    <label for="Idioma">Idioma</label>
    <input type="text"class="form-control"  name="Idioma" value="{{ isset($libro->Idioma)?$libro->Idioma:old('Idioma') }}"id="Idioma"><br>
    </div>

    <div class="form-group"> 
    <label for="Genero">Genero</label>
    <input type="text"class="form-control"  name="Genero" value="{{ isset($libro->Genero)?$libro->Genero:old('Genero') }}" id="Genero"><br>
    </div>

    <input class="btn btn-success"type="submit" value="{{ $modo }} Libro" >

    <a class="btn btn-primary"href="{{ url('libro/') }}" >Regresar</a>