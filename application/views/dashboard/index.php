	
<?php if ($permission == 2) { ?>		



    <div class="row">
        <div class="col-sm-3">

            <div class="tile-stats tile-red" onclick="location.href = '<?php echo base_url(); ?>user_list/index';">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $num_results; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>

                <h3>Registered users</a></h3>
                <p>Total user in Database</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-green" onclick="location.href = '<?php echo base_url(); ?>api_list/index';">
                <div class="icon"><i class="entypo-chart-bar"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $num_results_api; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>

                <h3>APIs</a></h3>
                <p>Generated till now</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-mail"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $num_results_message; ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>

                <h3>New Tickets</h3>
                <p>Unread Tickets</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-rss"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $results_comment_admin; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>

                <h3>New Message</h3>
                <p>Unread Messages</p>
            </div>

        </div>
    </div>

    
    <div class="mail-env">
       
        <!-- Mail Body -->
        <div class="mail-body">

            <div class="mail-header">
                <!-- title -->
                <h3 class="mail-title">
                  Recent Logins
                    <span class="count"></span>
                </h3>

                <!-- search -->

            </div>


            <!-- mail table -->
            <table class="table mail-table">
                <!-- mail table header -->
                <thead>
                    <tr>
                        <th>
                <div class="mail-select-options">
                    IP Address
                </div>
                </th>
                <th>

                <div class="mail-select-options">Time</div>


                </th>
                <th>
                <div class="mail-select-options">
                  User Agent
                </div>
                </th>

               
                </tr>
                </thead>

                <!-- email list -->
                <tbody>
                   
 <?php foreach ($query as $login): ?>
                    <tr>
                            <td class="col-name">
                             <?php echo $login['ip'];?>
                            </td>
                            <td class="col-subject">
                               <?php echo $login['login_time'];?>  
                               
                            </td>
                            <td class="col-subject">
                                <?php echo $login['useragent'];?>
                            </td>
                            
                        </tr>
                        
<?php endforeach; ?>

                    </tfoot>
            </table>
        </div>

    </div>




<?php } else { ?>


    <div class="row">
        <div class="col-sm-3">

            <div class="tile-stats tile-red" onclick="location.href = '<?php echo base_url(); ?>dataviewer/index';">
                <div class="icon"><i class="entypo-users"></i></div>
                <div class="num" data-start="" data-end="" data-postfix="" data-duration="1500" data-delay="0">&nbsp;</div>

                <h3>Data Viewer</a></h3>
                <p>Generate Data in Table</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-green" onclick="location.href = '<?php echo base_url(); ?>api_list/index';">
                <div class="icon"><i class="entypo-chart-bar"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $num_results_api; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>

                <h3>APIs</a></h3>
                <p>Generated till now</p>
            </div>

        </div>

        <div class="col-sm-3">

            <div class="tile-stats tile-aqua">
                <div class="icon"><i class="entypo-mail"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $num_results_user_message; ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>

                <h3>New Tickets</h3>
                <p>Unread Tickets</p>
            </div>

        </div>
        <div class="col-sm-3">

            <div class="tile-stats tile-blue">
                <div class="icon"><i class="entypo-rss"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $results_comment_user['count(read_status)']; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>

                <h3>New Message</h3>
                <p>Unread Messages</p>
            </div>

        </div>
        
         
    <div class="mail-env">
       
        <!-- Mail Body -->
        <div class="mail-body">

            <div class="mail-header">
                <!-- title -->
                <h3 class="mail-title">
                  Recent Logins
                    <span class="count"></span>
                </h3>

                <!-- search -->

            </div>


            <!-- mail table -->
            <table class="table mail-table">
                <!-- mail table header -->
                <thead>
                    <tr>
                        <th>
                <div class="mail-select-options">
                    IP Address
                </div>
                </th>
                <th>

                <div class="mail-select-options">Time</div>


                </th>
                <th>
                <div class="mail-select-options">
                  User Agent
                </div>
                </th>

               
                </tr>
                </thead>

                <!-- email list -->
                <tbody>
                   
 <?php foreach ($query as $login): ?>
                    <tr>
                            <td class="col-name">
                             <?php echo $login['ip'];?>
                            </td>
                            <td class="col-subject">
                               <?php echo $login['login_time'];?>  
                               
                            </td>
                            <td class="col-subject">
                                <?php echo $login['useragent'];?>
                            </td>
                            
                        </tr>
                        
<?php endforeach; ?>

                    </tfoot>
            </table>
        </div>  
    </div>

    <br />

<?php
}?>