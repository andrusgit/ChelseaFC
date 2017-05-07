<div class="container text-center">
		
	<h2><?php echo lang("ADDOFFERS_HEADING"); ?></h2>
	
	<!-- Printing errors if user forgets to fill required fields -->
	<?php if(validation_errors() != false): ?>
		<div class="alert alert-info">
		<strong>Info!</strong> <?php echo validation_errors();?>
		</div>
	<?php endif; ?>
		
	<!--Form-->
	<?php echo form_open('Offers/add');?>
	
	<div class="col-lg-12 well">
		<div class="row">
			<div class="col-sm-12">
			<div class="row">
				<div class="form-group">
					<label for="pealkiri"><?php echo lang("ADDOFFERS_FORM_HEADING_LABEL"); ?></label>
					<a href = "#" data-toggle = "tooltip" data-placement = "right" title = "<?php echo lang("ADDOFFERS_FORM_HEADING_HELP"); ?>"><img class="img" alt="#" src="<?php echo base_url(); ?>images/help.png"/></a>
					<?php
						$data_textarea = array(
							'name' => 'pealkiri',
							'id' => 'pealkiri',
							'class' => 'form-control',
							'placeholder' => lang('ADDOFFERS_FORM_HEADING_PLACEHOLDER'),
							'rows' => '1',
							'value' => set_value('pealkiri')
						);
						echo form_textarea($data_textarea);
					?>
					
					
				</div>
			</div>
			<div class="row">
				<div class="form-group">
					<label for="sisu"><?php echo lang("ADDOFFERS_FORM_DESCRIPTION_LABEL"); ?></label>
					<a href = "#" data-toggle = "tooltip" data-placement = "right" title = "<?php echo lang("ADDOFFERS_FORM_DESCRIPTION_HELP"); ?>"><img class="img" alt="#" src="<?php echo base_url(); ?>images/help.png"/></a>
					
					<!-- <textarea name="description" id="description" placeholder="Sisesta siia uudise sisu ..." rows="5" 
					class="form-control"></textarea> -->
					
					<?php
						$data_textarea = array(
							'name' => 'sisu',
							'id' => 'sisu',
							'class' => 'form-control',
							'placeholder' => lang('ADDOFFERS_FORM_DESCRIPTION_PLACEHOLDER'),
							'rows' => '5',
							'value' => set_value('sisu')
						);
						echo form_textarea($data_textarea);						
					?>
					
				</div>
			</div>
			<div class="row">
				<div class="form-group form-inline">
					<label for="tunnitasu"><?php echo lang("ADDOFFERS_FORM_PAY_LABEL"); ?></label>
					<a href = "#" data-toggle = "tooltip" data-placement = "right" title = "<?php echo lang("ADDOFFERS_FORM_PAY_HELP"); ?>"><img class="img" alt="#" src="<?php echo base_url(); ?>images/help.png"/></a>
					
					<?php
						$price = array(
							'3'         => '3',
							'4'       => '4',
							'5'         => '5',
							'6'       => '6',
							'7'         => '7',
							'8'       => '8',
							'9'         => '9',
							'10'       => '10',
							'11'         => '11',
							'12'       => '12',
							'13'         => '13',
							'14'       => '14',
							'15'         => '15',
							'16'       => '16',
							'17'        => '17',
							'18'      => '18',
							'19'        => '19',
							'20'		=> '20',
							'40'		=> '40',
							'60'		=> '60',
							'80'		=> '80',
							'100'		=> '100',
						);
						
						echo form_dropdown('tunnitasu', $price, '7');
					
					?>
					
				</div>
			</div>
			<div class="row">
				<div class="form-group form-inline">
					<label for="algus"><strong><?php echo lang("ADDOFFERS_FORM_BEGIN_LABEL");?></strong></label>
					<a href = "#" data-toggle = "tooltip" data-placement = "right" title = "<?php echo lang("ADDOFFERS_FORM_BEGIN_HELP"); ?>"><img class="img" alt="#" src="<?php echo base_url(); ?>images/help.png"/></a>
					
					<div class="input-group date" id="begindate">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type="text" class="form-control" id="begindateinput" name="begindate" placeholder="<?php echo lang("ADDOFFERS_FORM_DATE_FORMAT"); ?>" />
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="form-group form-inline">
					<label for="lõpp"><strong><?php echo lang("ADDOFFERS_FORM_END_LABEL"); ?></strong></label>
					<a href = "#" data-toggle = "tooltip" data-placement = "right" title = "<?php echo lang("ADDOFFERS_FORM_END_HELP"); ?>"><img class="img" alt="#" src="<?php echo base_url(); ?>images/help.png"/></a>
					
					<div class="input-group date" id="enddate">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
						<input type="text" class="form-control" id="enddateinput" name="enddate" placeholder="<?php echo lang("ADDOFFERS_FORM_DATE_FORMAT"); ?>" />
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="form-group form-inline">
					<label for="asukoht"><?php echo lang("ADDOFFERS_FORM_LOCATION_LABEL"); ?></label>
					<a href = "#" data-toggle = "tooltip" data-placement = "right" title = "<?php echo lang("ADDOFFERS_FORM_LOCATION_HELP"); ?>"><img class="img" alt="#" src="<?php echo base_url(); ?>images/help.png"/></a>
					
					<?php
						$locations = array(
							'Tartu'         => 'Tartu',
							'Tallinn'           => 'Talllinn',
							'Pärnu'         => 'Pärnu',
							'Viljandi'        => 'Viljandi',
						);
						
						echo form_dropdown('asukoht', $locations, 'Tartu');
					
					?>
					
				</div>
			</div>
		</div>
		<?php echo form_submit("Submit",lang('ADDOFFERS_FORM_SUBMIT_BUTTON'), 'class="btn btn-primary col-xs-12"');?>
	</div>
	
	<?php echo form_close();?>
</div>