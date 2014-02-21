<h2 class="sub-header">Usuarios</h2>
<a href="?action=insert">Insert Usuario</a>
<table class="table table-striped">
 <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Gender</th>
                  <th>Pets</th>
                  <th>Languages</th>                  
                  <th>Photo</th>
                </tr>
              </thead>
<?php foreach($filas as $key => $fila):	?>
	<tr>
		<?php 		
		$image=$fila['photo'];
		unset($fila['photo']);
		foreach($fila as $column):?>
			<td><?=$column;?></td>
		<?php endforeach; ?>
		<td><img src="<?=$image;?>" width="100px" /></td>
		
		<td>
			<a href="?action=update&id=<?=$fila['iduser'];?>">Update</a>
			<a href="?action=delete&id=<?=$fila['iduser'];?>">Delete</a>
		</td>
	</tr>
<?php endforeach;?>
</table>