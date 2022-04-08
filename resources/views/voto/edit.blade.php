@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar voto
    </div>
    <div class="card-body">
        @if ($errors->any())<div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="POST" action="{{ route('voto.update', $voto->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                @csrf
                <label for="id">ID:</label>
                <input type="text" class="form-control" readonly="true" value="{{$voto->id}}" name="id" />
            </div>
            <div class="form-group">
                @csrf
                <label for="ubicacion">Casilla:</label>
                <input type="text" value="{{$voto->casilla->ubicacion}}" readonly="true"  class="form-control" name="ubicacion" />
            </div>
            <label >Candidatos y Votos:</label>
            <table>
                @foreach($voto->candidatos as $candidato)
                <tr>                      
                        <td>{{$candidato->nombrecompleto}} </td>
                        <td><input type="text"  
                        value="{{$candidato->pivot->votos}}"
                        name="candidato_{{$candidato->id}}"  > </td>   
                    </tr>
                @endforeach
                </table>

                <div class="form-group">
                <label for="evidencia">Evidencia:</label>
                <input type="file" id="evidencia" accept="application/pdf"
                 class="form-control" name="evidencia" />
            </div>
            
            
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</div>
@endsection

