@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= "">{{$actividad->nombre}}</i> 

    </div>
@endsection

@section('description', 'Has ingresado exitosamente')

@section('content')

<div class="content">
    <form method="POST" action="/actividades/{{$actividad->id}}">
        {{ csrf_field() }}
        @foreach($competencias as $competencia)
            @foreach($competencia->comportamientos as $comportamiento)
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="blue">
                            <h4 class="title">{{$comportamiento->pregunta}}</h4>
                            <p class="category">{{$comportamiento->descripcion}}</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>Name</th>
                                    <th>Calidad</th>
                                    <th>Frecuencia</th>
                                    <th>No puedo responder</th>
                                </thead>
                                <tbody>
                                    @foreach($alumnos as $alumno)
                                    <tr>
                                        <td>{{$alumno->nombre}}</td>
                                        
                                        <td><input type="range" name="points" min="0" max="10"></td>
                                        <td><input type="range" name="points" min="0" max="10"></td>
                                        <td><input type="radio" name="{{$comportamiento->id}}_{{$alumno->id}}" value=1></td>
                                    </tr>
                                    @endforeach                                       
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection