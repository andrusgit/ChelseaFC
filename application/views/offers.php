			<div class = "container">
				<h1><?php echo lang("OFFERS_PAGE_TITLE"); ?></h1>
				<p><?php echo lang("OFFERS_DESCRIPTION"); ?></p>
				<table class="table table-hover table-responsive"> 
					<thead>
						<tr>
							<th class="text-center col-lg-1"><b>Id</b></th>  
							<th class="text-center col-lg-2"><b><?php echo lang("OFFERS_TABLE_TITLE"); ?></b></th>
							<th class="text-center col-lg-3"><b><?php echo lang("OFFERS_TABLE_DESCRIPTION"); ?></b></th>
							<th class="text-center col-lg-1"><b><?php echo lang("OFFERS_TABLE_LOCATION"); ?></b></th>
							<th class="text-center col-lg-1"><b><?php echo lang("OFFERS_TABLE_PAY"); ?> (€/h)</b></th>
							<th class="text-center col-lg-2"><b><?php echo lang("OFFERS_TABLE_BEGIN"); ?></b></th>	
							<th class="text-center col-lg-2"><b><?php echo lang("OFFERS_TABLE_END"); ?></b></th>
<!--							<td>Lisas</td>-->
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
						<!--<td><?php echo $row->name;?></td>-->  
						</tr>  
					 <?php }  
					 ?>  
					</tbody>  
				</table>  
			</div>