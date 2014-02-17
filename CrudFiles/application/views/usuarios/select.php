<a href="usuarios.php?action=insert">Insert Usuario</a>
<table border=1>
<?php foreach($filas as $key => $fila):	?>
	<tr>
		<?php 
		$columns=explode(',',$fila);
		$image=array_pop($columns);
		foreach($columns as $column):?>
			<td><?=$column;?></td>
		<?php endforeach; ?>
		<td><img src="<?=$image;?>" width="100px" /></td>
		
		<td>
			<a href="usuarios.php?action=update&id=<?=$key;?>">Update</a>
			<a href="usuarios.php?action=delete&id=<?=$key;?>">Delete</a>
		</td>
	</tr>
<?php endforeach;?>
</table>