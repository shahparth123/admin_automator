

<ol class="breadcrumb 2">
    <li>
        <a href="<?php echo base_url();?>"><i class="entypo-home"></i>Home</a>
    </li>
    <li>

        <a href="#">Ticket</a>
    </li>
    <li class="active">

        <strong>New Ticket</strong>
    </li>
</ol>
<h2 class="margin-bottom">Add New Ticket</h1>
<br />

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

<?php $attr = array('id' => "form_changepic", 'class' => 'form-horizontal form-groups-bordered');
echo form_open('ticket/newticket', $attr);
?>
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
        <textarea class="form-control wysihtml5" rows="18" data-stylesheet-url="assets/css/wysihtml5-color.css" name="message" id="post_content" required></textarea>
    </div>
</div>
<?php echo form_close(); ?>
<br />


</form>