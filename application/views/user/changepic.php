
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-primary" data-collapsed="0">
				
				<div class="panel-heading">
					<div class="panel-title">
						Change Your Profile Picture
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
					<?php $attr = array('id'=> "form_changepic",'class'=>'form-horizontal form-groups-bordered');
					echo form_open_multipart('user/changepic',$attr); ?>
					<?php 
                                            if(isset($error_content)== TRUE){
                                        echo $error_content;
                                        }
                                        ?>
									<div class="form-group">
						<label class="col-sm-3 control-label">Upload Image</label>
						
						<div class="col-sm-5">
							
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x150" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="userfile" accept="image/jpg">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" name="submit" class="btn btn-default">Submit</button>
						</div>
					</div>
					<?php echo form_close(); ?>
				<!--</form>-->
				
			</div>
			
		</div>
		
	</div>
</div>




