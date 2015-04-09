
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-heading">
					<div class="panel-title">
						Change Your Password
					</div>
					
					<div class="panel-options">
						<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
						<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
						<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
						<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
					</div>
				</div>
				
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




