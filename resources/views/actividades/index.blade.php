@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= ""></i> Materias
    </div>
@endsection

@section('description', 'Has ingresado exitosamente')

@section('content')

<div class="content">
	<div class="container-fluid">

		<div class="row">
			<?php for($i=1; $i<4; $i++){ ?>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="card card-stats">
						<div class="card-header" data-background-color="blue">
							<i class="material-icons">insert_chart</i>
						</div>
						<div class="card-content">
							<p class="category">Actividad</p>
							<br>
							<br>
							<h3 class="title"> <?php echo($actividades[sizeof($actividades)-$i]->nombre) ?></h3>
						</div>
						<div class="card-footer">
							<div class="stats">
							@if($actividades[sizeof($actividades)-$i]->finalizada==0)
								<i class="material-icons text-danger">warning</i> <a href="{{ route('actividades.index') }}">Coevaluaci&oacuten pendiente</a>
							@else
								<i class="material-icons text-success">check_circle</i> Coevaluaciones completas
							@endif
							</div>
						</div>
					</div>
				</div>
			<?php } ?>

		</div> <!--end row -->

		<div class="row">
			<div class="col-md-6">

				<div class="card">
					<div class="card-content" data-background-color="blue">
						<h3 class="title">Coevaluaciones completadas</h4>
					</div>
				</div>

				@foreach($actividades as $actividad)
					@if($actividad->finalizada==1)
						<div class="col-md-12">
							<div class="card">
								<div class="card-content">
									<h4 class="title">{{$actividad->nombre}}</h4>
										<p class="category"><span class="text-success"><i class="fa fa-check"></i>   </span> Actividad completada.</p>
								</div>
								<div class="card-footer">
									<div class="stats">
										
									</div>
								</div>
							</div>
						</div> <!--end col md 12 -->
					@endif
				@endforeach

			</div><!--end col md 6 -->

			
			<div class="col-md-6">

				<div class="card">
					<div class="card-content" data-background-color="tecorange">
						<h3 class="title">Coevaluaciones pendientes</h4>
					</div>
				</div>

				@foreach($actividades as $actividad)
					@if($actividad->finalizada==0)
					<div class="col-md-12">
						<div class="card">
							<div class="card-content">
								<h4 class="title">{{$actividad->nombre}}</h4>
								<p class="category"><span class="text-danger"><i class="fa fa-times"></i></span><a href="/actividades/{{$actividad->id}}"> Por completar.</a></p>
							</div>
							<div class="card-footer">
								<div class="stats">
									<i class="material-icons">access_time</i> Acaba en 2 d&iacute;as
								</div>
							</div>
						</div>
					</div> <!--end col md 12 -->
					 @endif
				@endforeach


			</div><!--end col md 6 -->

		</div> <!--end row -->

			

		

	</div><!--end contaner fluid -->
</div><!--end content-->

@endsection