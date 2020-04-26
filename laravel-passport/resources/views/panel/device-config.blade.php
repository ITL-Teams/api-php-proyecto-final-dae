@extends("layouts.app")

@section("content")

	<div class="container">
		<div class="content">
			<div class="title2 m-b-md">
				Lista de Dispositivos
			</div>
		</div>

		<div class="table-responsive">
		<div class="scroll">
			<table class="table table-hover table-bordered table-sm">
				<thead class="thead-dark">
					<tr>
						<th>Direcci&oacute;n IP</th>
						<th>Nombre Dispositivo</th>
						<th>Seleccionar</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<tbody>
					<?php for($i = 0; $i < 15; $i++){ ?>
					<tr>
						<td></td>
						<td></td>
						<td><span class="btn btn-secondary btn-sm" id="select">Seleccionar</span></td>
						<td>
							<span class="btn btn-warning btn-sm" id="edit">Editar</span>
							<span class="btn btn-danger btn-sm" id="delete">Eliminar</span>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
@endsection