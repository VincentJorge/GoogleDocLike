<?php if(isset($error2)){ ?>
  <div class="col-md-8 col-md-offset-2 alert alert-danger center"><h4>Erreur, <?php echo $name ?> existe déjà.</h4></div>
<?php } ?>
<div class="col-md-6 col-md-offset-5" id="modify">
	<hr>
	<form method="POST" action="<?php echo WEBROOT; ?>Uploads/modif_create/<?php echo $id .'/' .$size .'/' .$name ?>">
		<label>Titre : </label>
		<input type="text" value="<?php echo $name ?>" name="title" id="title">


		<div contenteditable="true" id="textarea" name="modif" rows="100" COLS="700"  style="width:500px;height:200px;"><?php 

			if(isset($fichier)){ 
				echo $fichier;
			}
			else if (isset($content)) {
				echo $content;
			}

			?></div>

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
		 <form method="POST" action="<?php echo WEBROOT; ?>Uploads/html">
           <input type="hidden" value="<?php echo $name ?>" name="hud" id="hud">
           <input type="hidden"  name="html" id="html">
           <input type="submit" name="boutton" value="exporté en html" onclick="value_html()" >
       </form>
	</div>