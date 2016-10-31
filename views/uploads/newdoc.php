<?php if(isset($error2)){ ?>
  <div class="col-md-8 col-md-offset-2 alert alert-danger center"><h4>Erreur, <?php echo $name ?> existe déjà.</h4></div>
<?php } ?>
<div class="col-md-6 col-md-offset-3">
	<form class="form-horizontal" method="POST" action="newdoc">
<fieldset>

<!-- Form Name -->
<legend>Nouveau Document</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="doctitle">Titre</label>  
  <div class="col-md-5">
  <input id="nameDoc" name="doctitle" type="text" placeholder="Titre du document" value="<?php if(isset($name)){echo $name;}?>" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Contentdoc">Texte :</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="Contentdoc" name="Contentdoc"><?php if(isset($content)){echo $content;}?></textarea>
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