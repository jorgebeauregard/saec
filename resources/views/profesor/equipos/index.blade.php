<div id="equipos">
    @foreach($actividad->equipos as $equipo)
        <div class="col-md-4">
	            <div class="card">
	                <div class="card-header" data-background-color="blue">
	                    <h4 class="title"><a href="/actividades/{{$actividad->id}}/equipos/{{$equipo->id}}">Equipo {{ $equipo->numero_equipo }}</a></h4>
	                     <p class="category">Contraseña: {{$equipo->contrasena}}</p>
						 <select class="form-control" name="equipo{{$equipo->id}}">
								@if($equipo->profesor_id == NULL || $equipo->profesor_id == 0)
									<option value="0" selected>Sin asignar</option>
								@else
									<option value="0">Sin asignar</option>
								@endif
						 	@foreach($profesores as $profesor)
								@if($profesor->id == $equipo->profesor_id)
									<option style='color: #ffffff' value="{{$profesor->id}}" selected>{{$profesor->nombre}} {{$profesor->apellido}}</option>
								@else
									<option style='color: #ffffff' value="{{$profesor->id}}">{{$profesor->nombre}} {{$profesor->apellido}}</option>
								@endif
							@endforeach
						</select>
	                </div>
	                <div class="card-content table-responsive">
					@if(count($equipo->alumnos) > 0)
	                    <table class="table">
	                        <thead class="text-primary">
	                            <th>Matrícula</th>
	                            <th>Nombre</th>
	                            <th>Evaluar</th>
	                        </thead>
	                        <tbody>
	                        @foreach($equipo->alumnos as $alumno)
	                            <tr>
	                            	<td>{{$alumno->matricula}}</td>
                                    <td>{{$alumno->nombre.' '.$alumno->apellido_paterno}}</td></td>
                                    @if($actividad->profesor_respuestas->where('evaluado_id', $alumno->id)->count() > 0)
										<td><button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a></td>
									@else
										<td><a href="/actividades/{{$actividad->id}}/alumnos/{{$alumno->id}}" type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
									@endif
									
	                            </tr>
	                        @endforeach
	                        </tbody>
	                    </table>
					@else
						<div class="col-md-12">
							<h5>Aún no hay alumnos en este equipo</h5>
						</div>
					@endif

	                </div>
	            </div>
			</div>
    @endforeach
</div>