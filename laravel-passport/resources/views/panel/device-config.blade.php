@extends("layouts.app")

@section("content")

	<h1>Lista de Dispositivos</h1>

	<div class="container">

		<table class="table table-hover table-condensed table-bordered">
			<tr>
				<td>Direcci&oacute;n IP</td>
				<td>Nombre Dispositivo</td>
				<td>Seleccionar</td>
				<td>Acciones</td>
			</tr>


				<tr>
					<td></td>
					<td></td>
					<td><span class="btn btn-primary btn-sm" id="select">Select</span></td>
					<td>
						<span class="btn btn-warning btn-sm" id="edit">Edit</span>
						<span class="btn btn-danger btn-sm" id="delete">Delete</span>
					</td>
				</tr>	

			

		</table>

	</div>
@endsection