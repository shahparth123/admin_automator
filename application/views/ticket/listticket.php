	
<div class="row">


    <div class="mail-env">
        <ol class="breadcrumb 2">
            <li>
                <a href="<?php echo base_url(); ?>"><i class="entypo-home"></i>Home</a>
            </li>
            <li>

                <a href="#">Ticket</a>
            </li>
            <li class="active">

                <strong>List Ticket</strong>
            </li>
        </ol>
        <!-- Mail Body -->
        <div class="mail-body">

            <div class="mail-header">
                <!-- title -->
                <h3 class="mail-title">
                    Tickets
                    <span class="count">(<?php echo count($content); ?>)</span>
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
                    Subject
                </div>
                </th>
                <th>

                <div class="mail-select-options">Message</div>


                </th>
                <th>
                <div class="mail-select-options">
                    Status
                </div>
                </th>

                <th>
                <div class="mail-select-options">
                    Created At
                </div>
                </th>

                </tr>
                </thead>

                <!-- email list -->
                <tbody>
                    <?php
                    foreach ($content as $contents) {
                        ?>

                        <tr class="unread"><!-- new email class: unread -->
                            <td class="col-name">
                                <a href="<?php echo base_url() . "ticket/viewticket/" . $contents['ticketid']; ?>" class="col-name"><?php echo $contents['subject']; ?></a>
                            </td>
                            <td class="col-subject">
                                <a href="<?php echo base_url() . "ticket/viewticket/" . $contents['ticketid']; ?>">
                                    <?php echo $contents['message']; ?>
                                </a>
                            </td>
                            <td class="col-subject">
                                <a href="<?php echo base_url() . "ticket/viewticket/" . $contents['ticketid']; ?>">  <?php
                                    if ($contents['is_active'] == 1) {
                                        echo "Active";
                                    } else {
                                        echo "Closed";
                                    }
                                    ?></a>
                            </td>
                            <td class="col-time"><?php echo $contents['created_at']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>


                    </tfoot>
            </table>
        </div>

