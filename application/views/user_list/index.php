	

	<div class="row">

		<h2>User List</h2>

		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th>Name</th>
					<th>Username</th>
					<th>Email id</th>
					<th>Status</th>
					<th>Created</th> 
					<th>Action</th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Email id</th>
					<th>Status</th>
					<th>Created</th> 
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($user_detail as $user): ?>
					<tr class="odd gradeX">
						<td><?php echo $user['name']; ?></td>
						<td><?php echo $user['username']; ?></td>
						<td><?php echo $user['email']; ?></td>
						<td class="center"><?php echo $user['status']; ?></td>
						<td class="center"><?php echo $user['created']; ?></td> 
						<td><a id="deletebut" href="<?php echo base_url();?>user_list/delete?id=<?php echo$user['id']?>" class="btn btn-danger btn-sm btn-icon icon-left">
							<i class="entypo-cancel"></i>
							Delete
						</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Username</th>
					<th>Email id</th>
					<th>Status</th>
					<th>Created</th> 
					<th>Action</th>
				</tr>
			</tfoot>
		</table>

	</div>


<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="<?php echo base_url();?>assets/js/select2/select2.min.js"></script>
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


