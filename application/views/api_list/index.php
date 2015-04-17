
<?php if ($permission == 2) { ?>
    <div class="row">
        <ol class="breadcrumb 2">
            <li>
                <a href="<?php echo base_url(); ?>"><i class="entypo-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>API List</strong>
            </li>
        </ol>
        <div class="col-md-12">
            <h2 class="margin-bottom">API List</h2>
        <font color="green"><strong>
            <?php echo $this->session->flashdata('msg'); ?>
        </strong></font>
        



        <h3></span> List of Already Created API</h3>

        <table class="table table-bordered datatable table-responsive col-md-8" id="table-3">
            <thead>

                <tr class="replace-inputs">
                    <th>ID</th>
                    <!--<th>auth_key</th>-->
                    <th>Operation</th>
                    <th>API_URL</th>
                    <th>API Name</th>
                    <th>Description</th>
                    <!--<th>Created By</th>-->
                    <th>Details</th>
                    <th>Created At</th>
                    <th>Action</th>                                       
                </tr>
                <tr>
                    <th>ID</th>
                    <!--<th>auth_key</th>-->
                    <th>Operation</th>
                    <th>API_URL</th>
                    <th>API Name</th>
                    <th>Description</th>
                    <!--<th>Created By</th>-->
                    <th>Details</th>
                    <th>Created At</th>
                    <th>Action</th>         

                </tr>
            </thead>

            <tbody>
                <?php foreach ($api_list as $api): ?>
                    <tr class="odd gradeX">
                        <td><?php echo $api['id']; ?></td>
                        <!--<td><?php echo $api['auth_key']; ?></td>-->
                        <td><?php echo $api['opertation']; ?></td>
                        <td><a href="<?php echo base_url() . "api/index/" . $api['opertation'] . "/" . $api['id'] . "/" . $api['auth_key'] . "/" . $api['name'] ?>" target="_blank"><?php echo base_url() . "api/index/" . $api['opertation'] . "/" . $api['id'] . "/" . $api['auth_key'] . "/" . $api['name'] ?></a></td>
                        <td><?php echo $api['name']; ?></td>
                        <td><?php echo $api['comment']; ?></td>
                        <!--<td class="center"><?php //echo $api['username']; ?></td>-->
                        <td><a href="<?php echo base_url() . "api/detail/" . $api['opertation'] . "/" . $api['id'] . "/" . $api['auth_key'] . "/" . $api['name'] ?>" target="_blank">Details</a></td>


                        <td class="center"><?php echo $api['created_at']; ?></td>


                        <td><a id="deletebut" href="<?php echo base_url(); ?>api_list/delete?id=<?php echo$api['id'] ?>" class="btn btn-danger btn-sm btn-icon icon-left">
                                <i class="entypo-cancel"></i>
                                Delete
                            </a></td>
                    </tr>
                <?php endforeach; ?>



            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <!--<th>auth_key</th>-->
                    <th>Operation</th>
                    <th>API_URL</th>
                    <th>API Name</th>
                    <th>Description</th>
                    <!--<th>Created By</th>-->
                    <th>Details</th>
                    <th>Created At</th>
                    <th>Action</th>     

                </tr>
            </tfoot>
        </table>

    </div>
<?php } else { ?>


    <div class="row">
        <ol class="breadcrumb 2">
            <li>
                <a href="<?php echo base_url(); ?>"><i class="entypo-home"></i>Home</a>
            </li>

            <li class="active">

                <strong>API List</strong>
            </li>
        </ol>
        <h2>API List</h2>



        <h3></span> List of Already Created API</h3>
        <br />



        <table class="table table-bordered datatable" id="table-3">
            <thead>

                <tr class="replace-inputs">
                    <th>ID</th>
                    <!--<th>auth_key</th>-->
                    <th>Operation</th>
                    <th>API_URL</th>
                    <th>API Name</th>
                    <th>Description</th>
                    <!--<th>Created By</th>-->
                    <th>Details</th>
                    <th>Created At</th>

                </tr>
                <tr>
                    <th>ID</th>
                    <!--<th>auth_key</th>-->
                    <th>Operation</th>
                    <th>API_URL</th>
                    <th>API Name</th>
                    <th>Description</th>
                    <!--<th>Created By</th>-->
                    <th>Details</th>
                    <th>Created At</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($api_list as $api): ?>

                    <tr class="odd gradeX">
                        <td><?php echo $api['id']; ?></td>
                        <!--<td><?php echo $api['auth_key']; ?></td>-->
                        <td><?php echo $api['opertation']; ?></td>
                        <td><a href="<?php echo base_url() . "api/index/" . $api['opertation'] . "/" . $api['id'] . "/" . $api['auth_key'] . "/" . $api['name'] ?>" target="_blank"><?php echo base_url() . "api/index/" . $api['opertation'] . "/" . $api['id'] . "/" . $api['auth_key'] . "/" . $api['name'] ?></a></td>
                        <td><?php echo $api['name']; ?></td>
                        <td><?php echo $api['comment']; ?></td>
                        <!--<td class="center"><?php echo $api['username']; ?></td>-->
                        <td><a href="<?php echo base_url() . "api/detail/" . $api['opertation'] . "/" . $api['id'] . "/" . $api['auth_key'] . "/" . $api['name'] ?>" target="_blank">Details</a></td>


                        <td class="center"><?php echo $api['created_at']; ?></td>


                    </tr>
                <?php endforeach; ?>



            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <!--<th>auth_key</th>-->
                    <th>Operation</th>
                    <th>API_URL</th>
                    <th>API Name</th>
                    <th>Description</th>
                    <!--<th>Created By</th>-->
                    <th>Details</th>
                    <th>Created At</th>


                </tr>
            </tfoot>
        </table>

    </div>
<?php } ?>

<script src="<?php echo base_url(); ?>assets/js/gsap/main-gsap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/joinable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/resizeable.js"></script>
<script src="<?php echo base_url(); ?>assets/js/neon-api.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        var table = $("#table-3").dataTable({
            "sPaginationType": "bootstrap",
            "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "bStateSave": true
        });

        table.columnFilter({
            "sPlaceHolder": "head:after"
        });
    });
</script>