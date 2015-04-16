

<ol class="breadcrumb 2">
    <li>
        <a href="<?php echo base_url(); ?>"><i class="entypo-home"></i>Home</a>
    </li>
    <li>

        <a href="#">Ticket</a>
    </li>
    <li class="active">

        <strong>New Ticket</strong>
    </li>
</ol>
<h2 class="margin-bottom">Add New Ticket</h1>


<style>
    .ms-container .ms-list {
        width: 135px;
        height: 205px;
    }

    .post-save-changes {
        float: right;
    }

    @media screen and (max-width: 789px)
    {
        .post-save-changes {
            float: none;
            margin-bottom: 20px;
        }
    }
</style>
<?php
$attr = array('id' => "form_changepic", 'class' => 'form-horizontal form-groups-bordered');
echo form_open('ticket/newticket', $attr);
?>
<?php $user_data = $this->session->all_userdata(); ?>
<?php if ($permission == 2) { ?>
    <div class="panel-body">	


        <div class="form-group">

            <div class="col-sm-4">

                <select name="uid" class="selectboxit" data-first-option="false">
                    <option>Select User</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['id']; ?>"><?php echo $user['username']; ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
        </div>
    </div
<?php } ?>


<!-- Title and Publish Buttons -->	<div class="row">
    <div class="col-sm-2 post-save-changes">
        <button type="submit" class="btn btn-green btn-lg btn-block btn-icon">
            Submit
            <i class="entypo-check"></i>
        </button>
    </div>

    <div class="col-sm-10">
        <input type="text" class="form-control input-lg" name="subject" placeholder="Subject" required/>
    </div>
</div>

<br />

<!-- WYSIWYG - Content Editor -->	<div class="row">
    <div class="col-sm-12">
        <textarea class="form-control wysihtml5" rows="18" data-stylesheet-url="assets/css/wysihtml5-color.css" placeholder="Message" name="message" id="post_content" required></textarea>
    </div>
</div>
<?php echo form_close(); ?>

<!-- Bottom Scripts -->



<script src="<?php echo base_url(); ?>/assets/js/neon-mail.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/select2/select2.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/selectboxit/jquery.selectBoxIt.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/daterangepicker/daterangepicker-bs3.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/icheck/skins/minimal/_all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/icheck/skins/square/_all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/icheck/skins/flat/_all.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/icheck/skins/futurico/futurico.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/js/icheck/skins/polaris/polaris.css">

<!-- Bottom Scripts -->
<script src="<?php echo base_url(); ?>/assets/js/gsap/main-gsap.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/joinable.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/resizeable.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/neon-api.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/typeahead.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/daterangepicker/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/icheck/icheck.min.js"></script>
