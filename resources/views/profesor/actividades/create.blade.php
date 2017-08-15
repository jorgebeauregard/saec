@extends('layouts.sidebar')

@section('title')
    <div>
        <i class= ""></i> Actividades
    </div>
@endsection

@section('description', 'Has ingresado exitosamente')

@section('content')
<div class="content">
	<div class="container-fluid">
	<form method="POST" action="/crear/actividad">
        {{ csrf_field() }}
		<div class="row">
			<div class="col-md-12">
				<div class = "card">
					<div class="card-header" data-background-color="green">
						<h4 class="title">Crear actividad</h4>
					</div>
					<div class = "card-content">
						<form>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Nombre de la actividad</label>
										<input type="text" class="form-control" name="nombre">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Descripción</label>
										<input type="text" class="form-control" name="descripcion" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Fecha de finalización</label>
										<input type="date" class="form-control" name="fecha_limite">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Grupo para la actividad</label>
										
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group label-floating">
										<label class="control-label">Número de equipos</label>
										<input type="number" name="num_equipos" min="1" max="15">
									</div>
								</div>
							</div>

							
					</div>
				</div>
			</div>
		</div><!--end row -->

		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Crear actividad</button>
				</form>
			</div>
		</div>
		</form>
    </div><!--end container-fluid -->
</div><!--end content -->




@endsection