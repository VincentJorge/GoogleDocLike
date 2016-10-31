<?php if(isset($success)){ ?>
  <div class="col-md-8 col-md-offset-2 alert alert-success center"><h4>Fichier <?php echo $name ?> modifié</h4></div>
<?php } ?>
<div class="col-md-6 col-md-offset-3">
	<hr>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Mime</th>
				<th>Extension originale</th>
				<th>Taille</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($create as $key => $value) {?>
			<tr>
				<td><a href="<?php echo WEBROOT; ?>Uploads/download/<?php echo $value['name']?>"><span class="glyphicon glyphicon-cloud-download"></span></a><?php echo $value['name'] ?></td>
				<td><?php echo $value['type']?></td>
				<td><?php echo $value['ext']?></td>
				<td><?php echo $value['size']?></td>
				<td><a class="btn btn-warning" href="<?php echo WEBROOT; ?>Uploads/edit_create/<?php echo $value['id'] ?>" role="button">Modifier</a></td>
				<td><a class="form-control btn btn-danger" href="<?php echo WEBROOT; ?>Uploads/delete_create/<?php echo $value['id'] .'/' .$value['name'] ?>" role="button">Supprimé</a></td>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>