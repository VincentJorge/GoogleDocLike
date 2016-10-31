<?php if(isset($success)){ ?>
  <div class="col-md-8 col-md-offset-2 alert alert-success center"><h4>Fichier <?php echo $name ?> uploadé</h4></div>
<?php } ?>
<?php if(isset($error)){ ?>
  <div class="col-md-8 col-md-offset-2 alert alert-danger center"><h4>Erreur, l'upload à échoué.</h4></div>
<?php } ?>
<?php if(isset($error2)){ ?>
  <div class="col-md-8 col-md-offset-2 alert alert-danger center"><h4>Erreur, <?php echo $name ?> existe déjà.</h4></div>
<?php } ?>
<div class="col-md-offset-5 col-md-9 upload">

	<form method="POST" action="<?php echo WEBROOT; ?>Homes/upload_file" enctype="multipart/form-data">
		<input type="file" name="avatar" class="btn btn-info">
    <input type="submit" name="envoyer" value="Upload" class="col-md-offset-1 btn btn-success submit">
	</form>