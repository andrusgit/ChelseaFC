<div class="container">
	
	<div class="table-responsive">
		<table id = "offersTable" class="table table-striped table-responsive">
			<thead>
			<tr>
				<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_ADDED"); ?></em></th>
				<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_TITLE"); ?></em></th>
				<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_PAY"); ?> (€/h)</em></th>
				<th class="text-center col-lg-2"><em><?php echo lang("OFFERS_TABLE_BEGIN"); ?></em></th>	
				<th class="text-center col-lg-2"><em><?php echo lang("OFFERS_TABLE_END"); ?></em></th>
				<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_LOCATION"); ?></em></th>
			</tr>
			</thead>
			<tbody>
			<?	$i = 0;
				$hasMoreData = 0;
				
				$kuulutused = json_decode($h);
				foreach($kuulutused as $row): 
				if($i < OFFERSPRESENTED) {?>
				
					<tr>
						<td class = "text-nowrap"><? echo $row->Added ?></td>
						<td>
							<button type="button" class="btn link btn-primary-outline" data-toggle="collapse" data-target="#demo<? echo $i ?>"><? echo $row->Title ?></button>
						</td>
						
						<td class = "text-nowrap"><? echo $row->Hourprice ?></td>
						<td class = "text-nowrap"><? echo $row->Start ?></td>
						<td class = "text-nowrap"><? echo $row->Enddatetime ?></td>
						<td class = "text-nowrap"><? echo $row->Location?></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div id="demo<? echo $i ?>" class="collapse">
								<? echo $row->Description; $i = $i + 1; ?>
							</div>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
			<?} else { 
				$hasMoreData = 1;
			} ?>
			<?endforeach ?>
			</tbody>
		</table>
		
	</div>
	<? if($hasMoreData) {?>
		<button id="loadMoreButton" class="btn btn-primary col-xs-12">Load More</button>
	<? } ?>
	
	
	
</div>

