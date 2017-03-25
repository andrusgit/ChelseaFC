			<div class = "container">
				<h1>Pakkumised</h1>
				<p>Siin on praegusel momendil näha kõik pakkumised: nii need kus otsitakse töötegijat kui ka need kus pakutakse enda teenuseid välja.</p>
				<table class="table table-striped"> 
					<thead>
						<tr>
							<td>Id</td>  
							<td>Pealkiri</td>
							<td>Kirjeldus</td>
							<td>Asukoht</td>
							<td>Tasu tunnis</td>
							<td>Algus</td>	
							<td>Lõpp</td>
							<td>Lisas</td>
						</tr>
					</thead>
				  <tbody>   
					 <?php  
					 foreach ($h->result() as $row)  
					 {  
						?><tr>  
						<td><?php echo $row->Id;?></td>  
						<td><?php echo $row->Title;?></td>  
						<td><?php echo $row->Description;?></td>  
						<td><?php echo $row->Location;?></td>  
						<td><?php echo $row->Hourprice;?></td>  
						<td><?php echo $row->Start;?></td>  
						<td><?php echo $row->Enddatetime;?></td>  
						<td><?php echo $row->name;?></td>  
						</tr>  
					 <?php }  
					 ?>  
					</tbody>  
				</table>  
			</div>