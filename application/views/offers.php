			<div class = "container">
				<h1><?php echo lang("OFFERS_PAGE_TITLE"); ?></h1>
				<p><?php echo lang("OFFERS_DESCRIPTION"); ?></p>
				<table class="table table-hover table-responsive"> 
					<thead>
						<tr>
							<th class="text-center col-lg-1"><em>Id</em></th>  
							<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_TITLE"); ?></em></th>
							<th class="text-center col-lg-3"><em><?php echo lang("OFFERS_TABLE_DESCRIPTION"); ?></em></th>
							<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_LOCATION"); ?></em></th>
							<th class="text-center col-lg-1"><em><?php echo lang("OFFERS_TABLE_PAY"); ?> (€/h)</em></th>
							<th class="text-center col-lg-2"><em><?php echo lang("OFFERS_TABLE_BEGIN"); ?></em></th>	
							<th class="text-center col-lg-2"><em><?php echo lang("OFFERS_TABLE_END"); ?></em></th>
							<th class="text-center col-lg-1"><em>Lisas</em></th>
						</tr>
					</thead>
				  <tbody>   
					 <?php  
					 foreach ($h->result() as $row)  
					 {  
						?><tr>  
						<td class="text-center"><?php echo $row->Id;?></td>  
						<td class="text-center"><?php echo $row->Title;?></td>  
						<td class="text-center"><?php echo $row->Description;?></td>  
						<td class="text-center"><?php echo $row->Location;?></td>  
						<td class="text-center"><?php echo $row->Hourprice;?></td>  
						<td class="text-center"><?php echo $row->Start;?></td>  
						<td class="text-center"><?php echo $row->Enddatetime;?></td>  
						<td class="text-center"><?php echo $row->Added;?></td> 
						</tr>  
					 <?php }  
					 ?>  
					</tbody>  
				</table>  
			</div>