<form method="post" action="<?php echo WEBROOT; ?>Homes/send_file">
		<input type="file" name="content_area" class="btn btn-info">
		<input type="submit" name="envoyer" value="Envoyer le fichier" class="btn btn-success">
	</form>

	<?php
    // $fichier= $_POST['content_area']; // Nom du fichier à modifier
    // var_dump($_POST);
    ?>
    <form method="post" action="<?php echo WEBROOT; ?>Homes/modif_file/<?php if(isset($name)){ echo $name; } ?>" > <!-- j'ai modifié action pour qu'il soit compatible peut importe le nom de la page-->
    <div contenteditable="true" onclick()=salut>
    <?php 
        // foreach ($name as $key => $value) {
        if(isset($fichier)){ 
            echo $fichier;
        } 
     // fait attention de bien collé les déclaration php au balises html sinon ca ecria les espace dans ton fichier
    	// if(is_file($fichier)) echo file_get_contents($fichier); 
    	?> This text can be edited by the user.</input></div>


    	<br/><input type="submit" name="boutton" value="Modifier">
    </form>
    <form class="form-horizontal" method="POST" action="<?php echo WEBROOT; ?>Homes/create_file">
<fieldset>

<!-- Form Name -->
<legend>Nouveau Document</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="doctitle">Titre</label>  
  <div class="col-md-5">
  <input id="nameDoc" name="doctitle" type="text" placeholder="Titre du document" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Contentdoc">Texte :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="Contentdoc" name="Contentdoc" ></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="validdoc"></label>
  <div class="col-md-4">
    <button id="validdoc" name="validdoc" class="btn btn-success">Envoyé</button>
  </div>
</div>

</fieldset>
</form>

</div>