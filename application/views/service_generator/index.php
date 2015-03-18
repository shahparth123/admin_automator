
<div class="row">
    <div class="col-sm-8">

	<div class="panel panel-primary" id="charts_env">

	    <div class="panel-heading">
		<div class="panel-title">Site Stats</div>
	    </div>

	    <div class="panel-body">

		<div class="tab-content">

		    <div class="tab-pane" id="area-chart">              
			<div id="area-chart-demo" class="morrischart" style="height: 300px"></div>
		    </div>

		    <div class="tab-pane active" id="line-chart">
			<div id="line-chart-demo" class="morrischart" style="height: 300px"></div>
		    </div>

		    <div class="tab-pane" id="pie-chart">
			<div id="donut-chart-demo" class="morrischart" style="height: 300px;"></div>
		    </div>

		</div>

	    </div>

      <!-- <table class="table table-bordered table-responsive">

        <thead>
          <tr>
            <th width="50%" class="col-padding-1">
              <div class="pull-left">
                <div class="h4 no-margin">Pageviews</div>
                <small>54,127</small>
              </div>
              <span class="pull-right pageviews">4,3,5,4,5,6,5</span>
	      
            </th>
            <th width="50%" class="col-padding-1">
              <div class="pull-left">
                <div class="h4 no-margin">Unique Visitors</div>
                <small>25,127</small>
              </div>
              <span class="pull-right uniquevisitors">2,3,5,4,3,4,5</span>
            </th>
          </tr>
        </thead>
	
      </table> -->

	</div>  

    </div>

    <div class="col-sm-4">

	<div class="panel panel-primary">
	    <div class="panel-heading">
		<div class="panel-title">
		    <h4>
			Real Time Stats
			<br />
			<small>current server uptime</small>
		    </h4>
		</div>

		<div class="panel-options">
		    <a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
		    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
		    <a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
		    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
		</div>
	    </div>
	    <div class="panel-body no-padding">
		
		<select id='callbacks' multiple='multiple' >

		</select>

	    </div>

	</div>
    </div>

</div>
<script src="<?php echo base_url(); ?>/assets/js/switch/jquery.multi-select.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/js/switch/jquery.quicksearch.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/multi-select.css">
<script>
        $(document).ready(function () {
            var url1 = '<?php echo base_url(); ?>api/tables';
            $.ajax({
                url: url1,
		//async: false,
                dataType: "json",
                success: function (data) {
                    var html1 = "";
                    jQuery.each(data, function () {
                        //alert(JSON.stringify(this));
                        var msg = this.Tables_in_admin_automator;
                        //console.log(msg);
                        html1 += "<option value='" + msg + "'>" + msg + "</option>";
			
                    });
			$('#callbacks').html(html1);
			
                    
                    $('#callbacks').multiSelect({
                        selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search'>",
                        selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search'>",
                        afterInit: function (ms) {
                            var that = this,
                                    $selectableSearch = that.$selectableUl.prev(),
                                    $selectionSearch = that.$selectionUl.prev(),
                                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                                    .on('keydown', function (e) {
                                        if (e.which === 40) {
                                            that.$selectableUl.focus();
                                            return false;
                                        }
                                    });

                            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                                    .on('keydown', function (e) {
                                        if (e.which == 40) {
                                            that.$selectionUl.focus();
                                            return false;
                                        }
                                    });
                        },
                        afterSelect: function (values) {
                            alert("Select value: " + values);
                            this.qs1.cache();
                            this.qs2.cache();
                        },
                        afterDeselect: function (values) {
                            alert("Deselect value: " + values);
                            this.qs1.cache();
                            this.qs2.cache();
                        }
                    });

                }
            });
        });


</script>