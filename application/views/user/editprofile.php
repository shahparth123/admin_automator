
<div class="row">

    <ol class="breadcrumb 2">
        <li>
            <a href="<?php echo base_url(); ?>"><i class="entypo-home"></i>Home</a>
        </li>
        <li>

            <a href="#">Profile Setting</a>
        </li>
        <li class="active">

            <strong>Edit Profile</strong>
        </li>
    </ol>
   
    <div class="col-md-12">
 <h2 class="margin-bottom">Edit Profile</h2>
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
                <?php foreach ($user_detail as $user): ?>
                    <!-- <form role="form" class="form-horizontal form-groups-bordered"> -->
                    <?php $attr = array('id' => "form_updateprofile", 'class' => 'form-horizontal form-groups-bordered');
                    echo form_open('user/updateprofile', $attr);
                    ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="hidden" name="id" class="form-control" id="field-1" value="<?php echo $user['id']; ?>">
                            <input type="text" name="name" class="form-control" id="field-1" value="<?php echo $user['name']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Email id</label>

                        <div class="col-sm-5">
                            <input type="email" name="email" class="form-control" id="field-1" value="<?php echo $user['email']; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Username</label>

                        <div class="col-sm-5">
                            <input type="text" name="username"  readonly="readonly" class="form-control" id="field-1" value="<?php echo $user['username'] ?>">
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






