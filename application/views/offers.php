			<div class = "container">
				<h1>Pakkumised</h1>
				<p>Siin on praegusel momendil näha kõik pakkumised: nii need kus otsitakse töötegijat kui ka need kus pakutakse enda teenuseid välja.</p>
				<table class="table table-hover table-responsive"> 
					<thead>
						<tr>
							<th class="text-center col-lg-1"><b>Id</b></th>  
							<th class="text-center col-lg-2"><b>Pealkiri</b></th>
							<th class="text-center col-lg-3"><b>Kirjeldus</b></th>
							<th class="text-center col-lg-1"><b>Asukoht</b></th>
							<th class="text-center col-lg-1"><b>Tunnitasu (€/h)</b></th>
							<th class="text-center col-lg-2"><b>Algus</b></th>	
							<th class="text-center col-lg-2"><b>Lõpp</b></th>
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