
<div class="row">
    <div class="col-sm-8">

     <div class="panel panel-primary" id="charts_env">

         <div class="panel-heading">
          <div class="panel-title">Site Stats</div>
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

</div>
<script src="<?php echo base_url(); ?>/assets/js/switch/jquery.multi-select.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/assets/js/switch/jquery.quicksearch.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/multi-select.css">
<script>
    function remove_table(tablename){
       $('#'+tablename).remove();
   }
   function add_table(tablename){
    var url2 = '<?php echo base_url(); ?>api/column_table/'+tablename;
    $.ajax({
        url: url2,
        dataType: "json",
        success: function (data) {
            var html1 = '<div class="col-md-4 tablename" id = "'+tablename+'"><div class="sorted"><div class="panel panel-info" data-collapsed="0"><!-- panel head --><div class="panel-heading"><div class="panel-title">Draggable Portlet 3</div></div><!-- panel body --><div class="panel-body">';

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
                $('#tables').append(html1);//console.log(html1);
            }
        });                              
}
$(document).ready(function () {
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
                    add_table(values);
                },
                afterDeselect: function (values) {
                    alert("Deselect value: " + values);
                    this.qs1.cache();
                    this.qs2.cache();
                    remove_table(values);
                }
            });

}
});
});


</script>