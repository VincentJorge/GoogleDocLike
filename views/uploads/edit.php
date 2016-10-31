<?php if(isset($error2)){ ?>
<div class="col-md-8 col-md-offset-2 alert alert-danger center"><h4>Erreur, <?php echo $name ?> existe déjà.</h4></div>
<?php } ?>
<?php if ($typ === "text") {?>
<div class="col-md-8 col-md-offset-2" id="modify">
	<hr>
	<div class="col-md-offset-5">
	<form method="POST" action="<?php echo WEBROOT; ?>Uploads/modif_file/<?php echo $id .'/' .$size .'/' .$name ?>">
		<label>Titre : </label>
		<input type="text" value="<?php echo $name ?>" name="title" id="title">

		
		<div contenteditable="true" id="textarea" name="modif" rows="100" COLS="700"  style="width:500px;height:200px;">
			<?php 
			if(isset($fichier)){ 
					echo $fichier;
			}
			else if (isset($content)) {
					echo $content;
			}
			?>
		</div>

		<input type="hidden" name="register" id="register"/>

		<input type="button" value="Aligné à gauche" onclick="document.execCommand('justifyleft')"/>
		<input type="button" value="Aligné à droite" onclick="document.execCommand('justifyright')"/>
		<input type="button" value="Centré" onclick="document.execCommand('justifycenter')"/>
		<input type="button" value="Mettre en gras" onclick="document.execCommand('bold')"/>
		<input type="button" value="Mettre en italic" onclick="document.execCommand('italic')"/>
		<input type="button" value="Souligner un texte" onclick="document.execCommand('underline')"/>
		<input type="button" value="Liste a puce" onclick="document.execCommand('insertunorderedlist')"/>
		<input type="button" value="Liste numérotée" onclick="document.execCommand('insertorderedlist')"/>
		<input type="color" id="panelcolor" value="Couleur" />
		<input type="button" value="Insert Link" onclick="doLink()">
		<input type="file" value="Insert Image"  id="imageLoader">
		<br/><input type="submit" name="boutton" value="Modifier" onclick="insert_file()">


		<!-- <input type="submit" class="col-md-offset-1 btn btn-primary"> -->
	</form>
	<form method="POST" action="<?php echo WEBROOT; ?>Uploads/export">
		<input type="hidden"  name="export" id="export">
		<input type="submit" name="boutton" value="exporté en pdf" onclick="value_pdf()" >
	</form>
<?php } ?>
<?php if ($typ === "image"){ ?>
<div class="col-md-5 col-md-offset-4">
<hr>
	<img class="img bord" src="<?php echo WEBROOT; ?>Assets/Uploads/<?php echo $name ?>"  alt="img" />
</div>
<div class="col-md-offset-4 col-md-5">
<hr>
	<form method="POST" action="<?php echo WEBROOT; ?>Uploads/modif_file/<?php echo $id .'/' .$size .'/' .$name ?>">
		<label>Titre : </label>
		<input type="text" value="<?php echo $name ?>" name="title" id="title">
		<input type="submit" class="btn btn-warning marg" name="boutton" value="Modifier" onclick="insert_file()">
	</form>
</div>
<?php } ?>
<?php if ($typ === "video"){ ?>
<div class="col-md-5 col-md-offset-4">
<hr>
	<video width="420" height="340" controls>
				<source src="<?php echo WEBROOT; ?>Assets/Uploads/<?php echo $name ?>" type="<?php echo $type ?>">
	</video>
</div>
<div class="col-md-offset-4 col-md-5">
<hr>
	<form method="POST" action="<?php echo WEBROOT; ?>Uploads/modif_file/<?php echo $id .'/' .$size .'/' .$name ?>">
		<label>Titre : </label>
		<input type="text" value="<?php echo $name ?>" name="title" id="title">
		<input type="submit" class="btn btn-warning marg" name="boutton" value="Modifier" onclick="insert_file()">
	</form>
</div>
<?php } ?>
<?php if ($typ === "audio"){ ?>
<div class="col-md-5 col-md-offset-4">
<hr>
	<audio controls>
				<source src="<?php echo WEBROOT; ?>Assets/Uploads/<?php echo $name ?>" type="<?php echo $type ?>" type=""<?php echo $type ?>">
	</audio>
</div>
<div class="col-md-offset-4 col-md-5">
<hr>
	<form method="POST" action="<?php echo WEBROOT; ?>Uploads/modif_file/<?php echo $id .'/' .$size .'/' .$name ?>">
		<label>Titre : </label>
		<input type="text" value="<?php echo $name ?>" name="title" id="title">
		<input type="submit" class="btn btn-warning marg" name="boutton" value="Modifier" onclick="insert_file()">
	</form>
</div>
<?php } ?>
</div>