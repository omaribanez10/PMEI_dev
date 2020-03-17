@extends('layout')
@section('title','Equipo | '.$equipo_det[0]->nombre_equipo)
@section('content')
<div class="col-md-8 container mx-auto my-auto rounded py-3 px-3">

<form id="equipos_form" class="needs-validation shadow rounded py-3 px-4" action="{{ route('equipos.update', $equipo_det[0]->id)}}" enctype="multipart/form-data"
	method="POST">
	<div class="form-group">
		<fieldset>
			<legend align="center">Actualizar equipo</legend>
			@include('equipos._form')
		</fieldset>
	</div>
</form>
</div>
@endsection
@section('scripts')
<script>
	jQuery(document).ready(function() {

		$('#equipos_form').validate({
			debug: true,
			ignore: '*:not([name])',
			rules: {
				consecutivo: {
					required: true,
				},
				nombre_equipo: {
					required: true,
				},
				marca: {
					required: true,
				},
				id_empresa: {
					required: true,
				},
				id_sede: {
					required: true,
				},
				id_ubicacion: {
					required: true,
				},
				id_tipo_equipo: {
					required: true,
				},
				id_proveedor: {
					required: true,
				},
				id_estado_equipo: {
					required: true,
				},
				id_riesgo: {
					required: true,
				},
				foto: {
					required: false,
					extension: "jpeg|png|jpg|gif|bmp"
				},
			},
			messages: {

				consecutivo: '',
				nombre_equipo: '',
				marca: '',
				id_empresa: '',
				id_sede: '',
				id_ubicacion: '',
				id_tipo_equipo: '',
				id_proveedor: '',
				id_estado_equipo: '',
				id_riesgo: '',
				foto: "La extensión, de la imagen no es correcta"

			},
			highlight: function(element) {
				$(element).removeClass('success').addClass('error');
			},
			unhighlight: function(element) {
				$(element).removeClass('error').addClass('success');
			}
		});

		$('#guardar_equipo').click(function(e) {
			e.preventDefault();
			$("#equipos_form").valid();

			var consecutivo = $('#consecutivo').val().trim();
			var nombre_equipo = $('#nombre_equipo').val().trim();
			var serie = $('#serie').val().trim();
			var descripcion = $('#descripcion').val().trim();
			var marca = $('#marca').val().trim();
			var modelo = $('#modelo').val().trim();
			var empresa = $('#id_empresa').val();
			var sede = $('#id_sede').val();
			var ubicacion = $('#id_ubicacion').val();
			var tipo_equipo = $('#id_tipo_equipo').val();
			var proveedor = $('#id_proveedor').val();
			var estado_equipo = $('#id_estado_equipo').val();
			var registro_invima = $('#registro_invima').val();
			var id_equipo = $('#id_equipo').val();	

			if ($("#foto")[0].files[0] == undefined) {
				var foto = null;
			} else {
				var foto = $("#foto")[0].files[0].name;
			}
			var riesgo = $('#id_riesgo').val();
			var id_usuario_crea = $('#id_usuario_crea').val();
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			if (consecutivo != '' && nombre_equipo != '' && marca != '' && empresa != '' &&
				sede != '' && ubicacion != '' && tipo_equipo != '' && proveedor != '' &&
				estado_equipo != '' && riesgo != '') {
				
					window.swal({
						title: "Actualizando...",
						text: "",
						imageUrl: "{{asset('images/ajax_loader.gif')}}",
						showConfirmButton: false,
						allowOutsideClick: false
					});
				var form = $("#equipos_form")[0];
				var formData = new FormData(form);
				url = $("#equipos_form").attr('action');
					
				/**@generator implementación del AJAX que envía los datos al controller mencionado anteriormente*/
				jQuery.ajax({
					url: url,
                	type: 'post',
					data: formData,
					processData: false,
					contentType: false,
					dataType: 'json',
					success: function(result) {			
						swal({
							title: "",
							text: result.success,
							icon: "success",
							button: "Aceptar",
							type: "success",
						});
						
						window.location.replace(result.view);
					
		
					},
					fail: function(result) {

						sweetAlert("", result.fail, "error");
					},
					error: function(xhr, ajaxOptions, thrownError) {
						console.log(xhr.statusCode);
						console.log(ajaxOptions);
						console.log(thrownError);
					},
					statusCode: {
						500: function() {
							sweetAlert("Falla interna del servidor", "Al parecer el fallo podría ser causado por el tamaño del archivo que se intenta cargar", "error");
						}
					}
				});
			}
		});
	});

</script>	


<style>
	.error {
		border: 1px solid red;
		background-color: white;
		color: red;
		font-style: red;
		font-size: 16px;
	}

	.success {
		border: 1px solid green;
		background-color: white;
		color: green;
		font-style: green;
		font-size: 16px;
	}
</style>
@endsection
