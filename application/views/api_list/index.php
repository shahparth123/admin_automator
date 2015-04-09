<?php if($permission == 2){ ?>
<div class="row">

		<h2>API List</h2>



		<h3></span> List of Already Created API</h3>

                <table class="table table-bordered datatable" id="table-3">
			<thead>

				<tr class="replace-inputs">
					<th>ID</th>
                                        <th>auth_key</th>
                                        <th>Operation</th>
                                        <th>API_URL</th>
                                        <th>API Name</th>
                                        <th>Description</th>
                                        <th>Username</th>
                                         <th>Parameters</th>
                                         <th>Created At</th>
					<th>Action</th>                                       
				</tr>
				<tr>
					<th>ID</th>
                                        <th>auth_key</th>
                                        <th>Operation</th>
                                        <th>API_URL</th>
                                        <th>API Name</th>
                                        <th>Description</th>
                                        <th>Username</th>
                                         <th>Parameters</th>
                                         <th>Created At</th>
					<th>Action</th>         

				</tr>
			</thead>
			<tbody>
				<?php foreach ($api_list as $api): ?>
					<tr class="odd gradeX">
						<td><?php echo $api['id']; ?></td>
                                                <td><?php echo $api['auth_key']; ?></td>
                                                <td><?php echo "select" ?></td>
                                                <td><a href="<?php echo base_url()."api/index/".$api['id']."/".$api['auth_key'] ?>"><?php echo base_url()."api/index/".$api['id']."/".$api['auth_key'] ?></a></td>
						<td><?php echo "apiname" ?></td>
                                                <td><?php echo $api['comment']; ?></td>
                                                <td class="center"><?php echo $api['username']; ?></td>
                                                <td><?php echo $api['perameter_count']; ?></td>
						
						
						<td class="center"><?php echo $api['created_at']; ?></td>
						
						
						<td><a id="deletebut" href="<?php echo base_url();?>api_list/delete?id=<?php echo$api['id']?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a></td>
					</tr>
				<?php endforeach; ?>



			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
                                        <th>auth_key</th>
                                        <th>Operation</th>
                                        <th>API_URL</th>
                                        <th>API Name</th>
                                        <th>Description</th>
                                        <th>Username</th>
                                         <th>Parameters</th>
                                         <th>Created At</th>
					<th>Action</th>     
					
				</tr>
			</tfoot>
		</table>

	</div>
<?php } else{?>


<div class="row">

		<h2>API List</h2>



		<h3></span> List of Already Created API</h3>
		<br />




		<table class="table table-bordered datatable" id="table-3">
			<thead>

				<tr class="replace-inputs">
					<th>ID</th>
					<th>perameter_count</th>
					<th>auth_key</th>
					<th>user_id</th>
					<th>created_at</th> 
					<th>Comment</th>
					<th>API_URL</th>
					
				</tr>
				<tr>
					<th>ID</th>
					<th>perameter_count</th>
					<th>auth_key</th>
					<th>user_id</th>
					<th>created_at</th> 
					<th>Comment</th>
					<th>API_URL</th>
					

				</tr>
			</thead>
			<tbody>
				<?php foreach ($api_list as $api): ?>
					<tr class="odd gradeX">
						<td><?php echo $api['id']; ?></td>
						<td><?php echo $api['perameter_count']; ?></td>
						<td><?php echo $api['auth_key']; ?></td>
						<td class="center"><?php echo $api['user_id']; ?></td>
						<td class="center"><?php echo $api['created_at']; ?></td>
						<td><?php echo $api['comment']; ?></td>
						<td><a href="<?php echo base_url()."api/index/".$api['id']."/".$api['auth_key'] ?>"><?php echo base_url()."api/index/".$api['id']."/".$api['auth_key'] ?></a></td>
						
					</tr>
				<?php endforeach; ?>



			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>perameter_count</th>
					<th>auth_key</th>
					<th>user_id</th>
					<th>created_at</th> 
					<th>Comment</th>
					<th>API_URL</th>
					
					
				</tr>
			</tfoot>
		</table>

	</div>
<?php }?>

<script src="<?php echo base_url();?>assets/js/gsap/main-gsap.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/joinable.js"></script>
<script src="<?php echo base_url();?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-api.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="<?php echo base_url();?>assets/js/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-chat.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-custom.js"></script>
<script src="<?php echo base_url();?>assets/js/neon-demo.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		var table = $("#table-3").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		table.columnFilter({
			"sPlaceHolder" : "head:after"
		});
	});
</script>