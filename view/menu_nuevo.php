<?php include "./models/head.php" ;
      include "./config/conectdb.php" ?>
<div class="container is-fluid mb-6">
	<h1 class="title">Menu</h1>
	<h2 class="subtitle">Menu Nuevo</h2>
</div>

<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<form action="./models/menu_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
		
		  	<div class="column">
		    	<div class="control">
					<label>Menu</label>
				  	<input class="input" type="number" name="Menu" min="1" max="99999" required >
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Seco</label>
				  	<input class="input" type="text" name="Seco" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" required >
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Salado</label>
				  	<input class="input" type="text" name="Salado" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" required >
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Acompañante</label>
				  	<input class="input" type="text" name="Acompañante" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" required >
				</div>
		  	</div>
		  	<div class="column">
		    	<div class="control">
					<label>Bebida</label>
				  	<input class="input" type="text" name="Bebida" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="150" >
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Cantidad</label>
                    <input class="input" type="number" name="Cantidad" min="1" max="99999" required>
				</div>
		  	</div>
              <div class="column">
		    	<div class="control">
					<label>Disponible</label>
				  	<input class="input" type="number" name="Disponible" min="1" max="99999" required>
				</div>
		  	</div>
		
		<p class="has-text-centered">
			<button type="submit" class="button  is-rounded" background="rgba(38, 45, 136, 255)">Guardar</button>
		</p>
	</form>
</div>