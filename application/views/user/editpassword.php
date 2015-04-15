
	
	<div class="row">
            <ol class="breadcrumb 2">
						<li>
				<a href="<?php echo base_url();?>"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="#">Profile Setting</a>
					</li>
				<li class="active">
			
							<strong>Change Password</strong>
					</li>
				</ol>
            <h2>Change Password</h2>
		<div class="col-md-12">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				
				<div class="panel-body">
					
					<!-- <form role="form" class="form-horizontal form-groups-bordered"> -->
					<?php $attr = array('id'=> "form_editpassword",'class'=>'form-horizontal form-groups-bordered');
					echo form_open('user/editpassword',$attr); ?>
					<!-- <div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Old Password</label>
						
						<div class="col-sm-5">
							<input type="password" name="oldpassword" class="form-control" id="field-3" required>
						</div>
					</div> -->
					
					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">New Password</label>
						
						<div class="col-sm-5">
							<input type="password" name="newpassword" class="form-control" id="field-3" required>
						</div>
					</div>

					<div class="form-group">
						<label for="field-3" class="col-sm-3 control-label">Confirm Password</label>
						
						<div class="col-sm-5">
							<input type="password" name="confirmpassword" class="form-control" id="field-3" required>
						</div>
					</div>
					
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				</form>
				
			</div>
			
		</div>
		
	</div>
</div>




