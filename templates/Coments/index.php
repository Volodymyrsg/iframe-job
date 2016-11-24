<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Soft</title>

<link rel="stylesheet" type="text/css" href="/webroot/css/main.css">

<script src="/webroot/js/coments.js"></script>

</head>
<body>
	<div id="url" data-url="<?= (isset($url)) ? $url : '' ;?>" class="coments">
		<?php if(!empty($coments)) : ?>
			<?php foreach($coments as $coment) : ?>
				<table>
					<tr><th><?= $coment['user_name']?></th></tr>
					<tr>
						<td><?= $coment['coment']?></td>
						<td class="coment_rating" data-id="<?= $coment['id']?>"><?= $coment['rating']?></td>
						<td><a class="delete_coment" data-delete="<?= $coment['id']?>" href="">delete coment</a></td>
					</tr>
				</table>
			<?php endforeach; ?>
		<?php endif; ?>
		
		<textarea id="coment" placeholder="leave your coment"></textarea>
		<a id="send_coment" href="">Send Coment</a>
	</div>
</body>
