<?php
	require_once('config.php');
	
	$updateCycles 	= Client::getUpdateCycles(); 
	$richListData 	= Client::getRichListData(); 
	$notes			= Client::getNotes();
	$processInfo 	= Client::getProcessingInfo();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=ucfirst(CRYPTONAME)?> - Distribution</title>

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/jquery.balloon.min.js" type="text/javascript"></script>
<script src="js/jquery.tablesorter.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>

<!--<link rel="stylesheet" type="text/css" href="css/main.css">-->
</head>

<body>
<div style="width:950px; margin:0 auto;">
	<table cellpadding="0" cellspacing="0" border="0" width="1000">
		<tbody>
		<tr>
			<td>
				<center>
					<h1><?=strtoupper(CRYPTONAME)?> - Distribution list</h1>
				</center>
			</td>
		</tr>
		</tbody>
	</table>
		
	<table cellpadding="0" cellspacing="0" border="0" width="1000" id="distribution">
	<thead>
	<tr>
		<th>Position</th>
		<th>Wallet address</th>
		<th><?=ucfirst(CRYPTONAME)?></th>
        <th></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach($richListData as $richList)
	{
		if($richList["address"] != ""){
			?>
				<tr>
					<td><?=$richList['position']?></td>
					<td>
						<a href='search.php?id=<?=$richList['address']?>' target="_blank">
							<?=$richList['address']?>
						</a>
					</td>
					<td><?=$richList['amount']?></td>
					<td>
					<?php
						if(isset($notes[$richList['address']]) && !empty($notes[$richList['address']])) 
						{
							?>
								<img src="images/<?=$notes[$richList['address']]['icon']?>.png" class="info" title="<?=$notes[$richList['address']]['description']?>" />
							<?php
						}
					?></td>
				</tr>
			<?php
		}
	}
?>
	</tbody>
	</table>
</div>
</body>
</html>
<?
close();
?>