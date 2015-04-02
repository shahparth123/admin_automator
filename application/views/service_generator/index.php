<?php $attr=array('id'=>'query_maker'); 
echo form_open('api/generate',$attr); ?>
<div class="row">
	<div class="col-sm-8">

		<div class="panel panel-primary" id="charts_env">

			<div class="panel-heading">
				<div class="panel-title">Select fields from here</div>
			</div>

			<div class="panel-body" id="tables">


			</div>

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
	<div class="col-sm-11">

		<div class="panel panel-primary" id="charts_env">

			<div class="panel-heading">
				<div class="panel-title">Query Generator</div>
			</div>

			<div class="panel-body" id="tables">
				<h4>Operation</h4>
				<div class="radio-inline">
				<label><input type="radio" ng-model="opertation" name="opertation" id="optionsRadios" value="SELECT">SELECT</label>	
				</div>
				<div class="radio-inline">
					<label><input type="radio" ng-model="opertation" name="opertation" id="optionsRadios" value="INSERT">INSERT</label>	
				</div>
				<div class="radio-inline">
					<label><input type="radio" ng-model="opertation" name="opertation" id="optionsRadios" value="UPDATE">UPDATE</label>	
				</div>
				<div class="radio-inline">
					<label><input type="radio" ng-model="opertation" name="opertation" id="optionsRadios" value="DELETE">DELETE</label>	
				</div>
				<div class="radio-inline">
					<label><input type="radio" ng-model="opertation" name="opertation" id="optionsRadios" value="CUSTOM">CUSTOM</label>	
				</div>
				<div class="radio-inline" class="col-sm-3">
				    <label>PRIMARY TABLE:</label><select class="form-control pri_tab" name="pri_tab" id="pri_tab">
				    
				    
				    </select>
					
				</div>
				<div class="col-sm-12" ng-show="opertation=='SELECT'">
					<h4>Conditions 			    
						<button id="add" type="button" class="btn btn-info">
							<i class="entypo-plus"></i>
						</button>
					</h4>
					<div id="addconditions">
					</div>
				
					<h4>Joins 			    
						<button id="jadd" type="button" class="btn btn-info">
							<i class="entypo-plus"></i>
						</button>
					</h4>
					<div id="addjoin">
					</div>
				    <div class="col-sm-8 form-group">
					    <div class="col-sm-4"><input type="text" class="form-control" name="groupby" id="group" placeholder="GROUP BY"></div>					  
					    <div class="col-sm-4"><input type="text" class="form-control" name="orderby" id="order" placeholder="ORDER BY"></div>
					</div>

				</div>
				<div class="col-sm-10" ng-show="opertation=='CUSTOM'">

				
					<div class="col-sm-10">
					    <textarea class="form-control autogrow" name="custom_query" id="field-ta" placeholder="Build your Custom Query here" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 72px;"></textarea>
					</div>
		</div>

			</div>


		</div>
		

	</div>

</div>
<button type="submit" class="btn btn-blue">Generate</button>
<?php echo form_close(); ?>
<script src="<?php echo base_url(); ?>/assets/js/switch/jquery.multi-select.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/js/switch/jquery.quicksearch.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/multi-select.css">
<script>
	function hide_table(tablename){
		$('#'+tablename).remove();
	}
	function show_table(tablename){
		var url2 = '<?php echo base_url(); ?>api/column_table/'+tablename;
		$.ajax({
			url: url2,
			dataType: "json",
			success: function (data) {
				var html1 = '<div class="col-md-4 tablename" id = "'+tablename+'"><div class="sorted"><div class="panel panel-info" data-collapsed="0"><!-- panel head --><div class="panel-heading"><div class="panel-title">'+tablename+'</div></div><!-- panel body --><div class="panel-body">';

				jQuery.each(data, function (k,v) {
					html1 += '<div class="form-group">';
					html1 += '<div class="col-sm-12">';
					html1 += '<div class="checkbox">';
					html1 += '<label>';
					html1 += '<input name="fields[]" value="'+tablename+'.'+v.Field+'" type="checkbox">'+ v.Field +" " +v.Type+'';
					html1 += '</label>';
					html1 += '</div>';

					html1 += '</div>';
					html1 += '</div>';

				});
				html1 +='</div></div></div></div>';
				$('#tables').append(html1);
			}
		});                              
	}
	
	$(document).ready(function () {
	
		function add_table(tablename){
		//jQuery("#tableforjoin").append('<option value="'+tablename+'">'+tablename+'</option>');
		jQuery(".pri_tab").append('<option value="'+tablename+'">'+tablename+'</option>');
		jQuery('.tableforjoin').append(jQuery('.pri_tab').html());
		
		}
		
		function remove_table(tablename){
		$("#tableforjoin option[value="+tablename+"]").remove();
		$("#pri_tab option[value="+tablename+"]").remove();
		}

		var counter = 0;

		jQuery('#add').click(function (e) {
			
			jQuery("#addconditions").append('<div id="condition'+counter+'">'+
				'<div class="col-sm-2">'+
				'<select class="form-control" name="opcode[]">'+
				'<option value="where">WHERE</option>'+
				'<option value="or_where">WHERE(OR)</option>'+
				'<option value="having">HAVING</option>'+
				'</select>'+
				'</div>'+
				'<div class="col-sm-2">'+
				'<input type="text" name="f1[]" class="form-control" id="field-1" placeholder="field-1">'+
				'</div>'+
				'<div class="col-sm-2">'+
				'<select class="form-control" name="op[]">'+
				'<option value="=">=</option>'+
				'<option value=">">&gt;</option>'+
				'<option value=">=">&gt;=</option>'+
				'<option value="<">&lt;</option>'+
				'<option value="<=">&lt;=</option>'+
				'<option value="!=">!=</option>'+
				'<option value="LIKE">LIKE</option>'+
				'</select>'+
				'</div>'+

				'<div class="col-sm-2">'+
				'<input type="text" name="f2[]" class="form-control" id="field-1" placeholder="field-2/value">'+
				'</div>'+
				'<button type="button" id="removecon'+counter+'" class="btn btn-danger" onclick="jQuery(\'#condition'+counter+'\').remove()">'+
				'<i class="entypo-cancel"></i>'+
				'</button>'+

				'</div>');
counter++;
});
var count = 0;
jQuery('#jadd').click(function (e) {
	jQuery('#addjoin').append('<div id="join'+count+'">'+
		'<div class="col-sm-2">'+
		'<select class="form-control" name = "jtype[]">'+
		'<option value="LEFT">LEFT</option>'+
		'<option value="RIGHT">RIGHT</option>'+
		'<option value="INNER">INNER</option>'+
		'<option value="OUTER">OUTER</option>'+
		'</select>'+
		'</div>'+
		'<div class="col-sm-2">'+
		'<select id="tableforjoin"class="form-control tableforjoin">'+

		'</select>'+
		'</div>'+
		'<div class="col-sm-2">'+
		'<select class="form-control" name="jopcode[]">'+
		'<option value="ON">ON</option>'+
		'<option value="AND">AND</option>'+
		'<option value="OR">OR</option>'+
		'<option value="WHERE">WHERE</option>'+
		'<option value="HAVING">HAVING</option>'+
		'</select>'+
		'</div>'+
		'<div class="col-sm-2">'+
		'<input type="text" name="jf1[]" class="form-control" id="field-1" placeholder="field-1">'+
		'</div>'+
		'<div class="col-sm-2">'+
		'<select class="form-control" name="jop[]">'+
		'<option value="=">=</option>'+
		'<option value=">">&gt;</option>'+
		'<option value=">=">&gt;=</option>'+
		'<option value="<">&lt;</option>'+
		'<option value="<=">&lt;=</option>'+
		'<option value="!=">!=</option>'+
		'<option value="LIKE">LIKE</option>'+
		'</select>'+
		'</div>'+

		'<div class="col-sm-2">'+
		'<input type="text" name="jf2[]" class="form-control" id="field-1" placeholder="field-2/value">'+
		'</div>'+
		'<button  id="removejoin'+count+'" type="button" class="btn btn-danger" onclick="jQuery(\'#join'+count+'\').remove()">'+
		'<i class="entypo-cancel"></i>'+
		'</button>'+
		'</div>');
count++;
});

var url1 = '<?php echo base_url(); ?>api/tables';

$.ajax({
	url: url1,
		//async: false,
		dataType: "json",
		success: function (data) {
			var html1 = "";
			jQuery.each(data, function (k,v) {


				var tblnam = Object.keys(v).map(function(k) { return v[k] });

				html1 += "<option value='" +tblnam[0] + "'>" + tblnam[0] + "</option>";


			});
			$('#callbacks').html(html1);
			$(".tablename" ).draggable();

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
					show_table(values);
					add_table(values);
					
				},
				afterDeselect: function (values) {
					alert("Deselect value: " + values);
					this.qs1.cache();
					this.qs2.cache();
					hide_table(values);
					remove_table(values);
				}
			});

}
});
});


</script>