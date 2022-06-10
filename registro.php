<?php
include_once("repositorios/scripts.php");

function registro($titulo, $imagen, $descripcion, $pagina)
{	
	echo " <script>
    $(document).ready(function(){
      $('#success-modal').modal('show'); });
      </script>";
	
	echo "
		<div class='modal fade' id='success-modal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
			<div class='modal-dialog modal-dialog-centered' role='document'>
				<div class='modal-content'>
					<div class='modal-body text-center font-18'>
						<h3 class='mb-20'>$titulo</h3>
						<div class='mb-30 text-center'><img src='vendors/images/$imagen'></div>
						$descripcion
					</div>
					<div class='modal-footer justify-content-center'>
						<button type='button' class='btn btn-secondary' data-dismiss='modal' onClick='pagina()'>Aceptar</button>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			function pagina(){
			  window.open('".$pagina."','_self');
			}
		</script>
	";
}

?>