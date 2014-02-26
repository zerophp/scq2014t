<h2 class="sub-header">Companies</h2>
<a href="?action=insert">Insert Company</a>
<table class="table table-striped">
 <thead>
                <tr>
                  <th>Id</th>
                  <th>Company</th>
                  <th>CIF/NIF</th>
                  <th>Address</th>
                  <th>Location</th>
                  <th>Action</th>
                </tr>
              </thead>
<?php foreach($filas as $key => $fila):	?>
	<tr>
		<?php 		
		foreach($fila as $column):?>
			<td><?=$column;?></td>
		<?php endforeach; ?>
		<td>
			<a href="?action=update&id=<?=$fila['idcompany'];?>">Update</a>
			<a href="?action=delete&id=<?=$fila['idcompany'];?>">Delete</a>
		</td>
	</tr>
<?php endforeach;?>
</table>