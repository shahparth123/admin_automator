<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    Add User Profile
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
                    <?php
                    $attr = array('id' => "form_adduser", 'class' => 'form-horizontal form-groups-bordered');
                    echo form_open('user_list/adduser', $attr);
                    ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            
                            <input type="text" name="name" class="form-control" id="field-1" value="" required autocomplete="off">
                        </div>
                    </div>

                   
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" id="field-1" value="" required autocomplete="off">
                        </div>
                    </div>
                    
                    
                    
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email id</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" value="" required autocomplete="off">
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Password</label>

                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" id="field-1" value="" required autocomplete="off">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </div>
                    <?php  echo form_close(); ?>
                
                </form>

            </div>

        </div>

    </div>
</div>
