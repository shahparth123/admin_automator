<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    Change User Profile
                </div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>

            <div class="panel-body">
                <?php foreach ($user_detail as $user): ?>
                    <!-- <form role="form" class="form-horizontal form-groups-bordered"> -->
                    <?php
                    $attr = array('id' => "form_updateuser", 'class' => 'form-horizontal form-groups-bordered');
                    echo form_open('user_list/updateuser', $attr);
                    ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="hidden" name="id" class="form-control" id="field-1" value="<?php echo $user['id']; ?>">
                            <input type="text" name="name" class="form-control" id="field-1" value="<?php echo $user['name']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email id</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $user['email']; ?>" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" id="field-1" value="<?php echo $user['username'] ?>" required>
                        </div>
                    </div>
                    
                      <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Priviledges</label>
                    <div class="col-sm-5">
                        <div class="radio">
                            <label>
                                <input type="radio" name="priviledges" id="optionsRadios1" value="0" <?php if($user['permission'] == 0){ ?> checked="checked" <?php } ?>>Developer
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="priviledges" id="optionsRadios2" value="1" <?php if($user['permission'] == 1){ ?> checked="checked" <?php } ?>>Moderator
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="priviledges" id="optionsRadios3" value="2" <?php if($user['permission'] == 2){ ?> checked="checked" <?php } ?>>Admin
                            </label>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                <?php endforeach; ?>
                </form>

            </div>

        </div>

    </div>
</div>
