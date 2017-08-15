<div id="equipos">
    @foreach($actividad->equipos as $equipo)
        <div class="col-md-4">
	            <div class="card">
	                <div class="card-header" data-background-color="blue">
	                    <h4 class="title">Equipo {{ $equipo->numero_equipo }}</h4>
	                     <p class="category">Contraseña: {{$equipo->contrasena}}</p>
	                </div>
	                <div class="card-content table-responsive">
					@if(count($equipo->alumnos) > 0)
	                    <table class="table">
	                        <thead class="text-primary">
	                            <th>Matrícula</th>
	                            <th>Nombre</th>
	                        </thead>
	                        <tbody>
	                        @foreach($equipo->alumnos as $alumno)
	                            <tr>
	                            	<td>{{$alumno->matricula}}</td>
                                    <td>{{$alumno->nombre.' '.$alumno->apellido_paterno}}</td></td>
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