

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    Description of new ticket
                </div>

                <div class="panel-options">
                    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>

            <div class="panel-body">

                <?php $attr = array('id'=> "form_newticket",'class'=>'form-horizontal form-groups-bordered');
					echo form_open('ticket/newticket',$attr); ?>
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label">Description</label>

                        <div class="col-sm-5">
                            <textarea class="form-control autogrow" id="field-ta" placeholder="Ticket in Detail"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>

                <?php echo form_close(); ?>

            </div>

        </div>

    </div>
</div>