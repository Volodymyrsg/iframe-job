<?php if(!empty($coments)) : ?>
		<?php foreach($coments as $coment) : ?>
			<table>
				<tr><th><?= $coment['user_name']?></th></tr>
				<tr>
					<td><?= $coment['coment']?></td>
					<td style="cursor: pointer; padding-right: 20px;" class="coment_rating" data-id="<?= $coment['id']?>"><?= $coment['rating']?></td>
					<td><a class="delete_coment" data-delete="<?= $coment['id']?>" href="">delete coment</a></td>
				</tr>
			</table>
		<?php endforeach; ?>
	<?php endif; ?>
	
	<textarea id="coment" placeholder="leave your coment"></textarea>
	<a id="send_coment" href="">Send Coment</a>