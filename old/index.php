<?php include "header.php"; ?>
          
    <div class="col-sm-8">
    <div class="well">
	<h4>Latest blocks</h4>
	<table class=" table table-bordered table-responsive" id="distribution">
	<thead>
	<tr>
		<td class="text-center">Height</td>
		<td class="text-center">Transactions</td>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach($blockData as $block)
	{
		?>
			<tr>
				<td class="text-center"><a href="search.php?id=<?=$block['block']?>"><?=$block['block']?></a></td>
				<td class="text-center"><?=$block['transactions']?></td>
			</tr>
		<?php
	}
?>
	</tbody>
	</table>
      </div>
      </div>
      
    <!--- session 02 ---->  
	
	<div class="col-sm-4">
    <div class="well">
	<h4>Latest transactions</h4>
	<table class=" table table-bordered table-responsive" id="distribution">
	<thead>
	<tr>
		<td>Block</td>
		<td>Transaction ID</td>
		<td><?=ucfirst(CRYPTOSHORTNAME)?></td>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach($txData as $tx)
	{
		?>
			<tr>
				<td><a href="search.php?id=<?=$tx['block']?>"><?=$tx['block']?></a></td>
				<td><a href="search.php?id=<?=$tx['txid']?>"><?=$tx['txid']?></a></td>
				<td><?=$tx['amount']?></td>
			</tr>
		<?php
	}
?>
	</tbody>
	</table>
      </div>
        </div>
          
          
</div>
      </div>
    </div>
    </div>
    </div>
<?php include "footer.php"; ?>
   