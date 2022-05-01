@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Candidato
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('candidato.store') }} " 
        enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nombrecompleto">Nombre completo:</label>
                <input type="text" id="nombrecompleto"
                 class="form-control" name="nombrecompleto" />
            </div>
            <div class="form-group">
                <label for="sexo">Sexo:</label>
                <select name="sexo">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>


            <div class="form-group"> 
                <label for="foto">Foto:</label>
                <input type="file" id="foto" accept="image/png, image/jpeg"  
                 class="form-control" name="foto" onchange="vista_preliminar(event)"  />
            </div>
            <div ><img src="" alt="" id="img"></div>

            
            <div class="form-group"> 
                <label for="perfil">Perfil:</label>
                <input type="file" id="perfil" accept="application/pdf"
                 class="form-control" name="perfil" onchange="vista_previa(event)" />
            </div>
            <div > <embed src="" type="" id="pdf" width="250" height="250" > </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
       
    </div>
</div>

<script>
let vista_preliminar = (event)=>{

    let leer_img = new FileReader();
    let id_img = document.getElementById('img'); 

    leer_img.onload = ()=>{
        if(leer_img.readyState == 2 ){
            id_img.src = leer_img.result

        }
    }

    leer_img.readAsDataURL(event.target.files[0])
}
</script>

<script>
let vista_previa = (event)=>{

    let leer_file = new FileReader();
    let id_file = document.getElementById('pdf'); 

    leer_file.onload = ()=>{
        if(leer_file.readyState == 2 ){
            id_file.src = leer_file.result

        }
    }

    leer_file.readAsDataURL(event.target.files[0])
}
</script>

@endsection