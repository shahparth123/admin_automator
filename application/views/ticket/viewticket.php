<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url(); ?>"><i class="entypo-home"></i>Home</a>
    </li>
    <li>

        <a href="#">Ticket</a>
    </li>
    <li class="active">

        <strong>View Ticket</strong>
    </li>
</ol>
<h2>Tickets</h2>
<!-- Comments Area -->
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default panel-shadow" data-collapsed="0"><!-- to apply shadow add class "panel-shadow" -->

            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">Tickit #<?php echo $content[0]['ticket_id'] . " " . $content[0]['subject']; ?></div>
            </div>

            <!-- panel body -->
            <div class="panel-body">

                <p>Message: <?php echo $content[0]['message']; ?></p>
                <p>Created At: <?php echo $content[0]['created_at']; ?></p>
                <p>Status: <?php
                    if ($content[0]['is_active'] == 1) {
                        echo "Active";
                    } else {
                        echo "Closed";
                    }
                    ?>
                </p>
            </div>

        </div>

    </div>
</div>


<section class="comments-env">

    <!-- Comments List Panel -->	
    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-primary">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>
                            Reply: 
                            <?php if ($isreply != 0) { ?><span class="badge badge-danger"><?php echo count($content); ?></span><?php } ?>
                        </h4>
                    </div>
                </div>

                <div class="panel-body no-padding">
                    <?php
                    if ($isreply == 0) {
                        echo "No reply found";
                    } else {
                        ?>
                        <!-- List of Comments -->
                        <ul class="comments-list">

                            <!-- Comment Entry -->
                            <?php
                            foreach ($content as $content) {
                                ?>
                                <li>
                                    <!-- 	<div class="comment-checkbox">
                                            <div class="checkbox checkbox-replace">
                                                    <input type="checkbox">
                                            </div>
                                    </div>
                                    -->
                                    <div class="comment-details">

                                        <div class="comment-head">
                                            <a href="#"><?php echo $content['name']; ?></a> commented on <a href="#">Ticket # <?php echo $content['ticket_id']; ?></a>
                                        </div>

                                        <p class="comment-text">
                                            <?php echo $content['comment']; ?> 
                                        </p>

                                        <div class="comment-footer">

                                            <div class="comment-time">
                                                <?php echo $content['comment_created']; ?>
                                            </div>


                                        </div>

                                    </div>
                                </li>
                                <?php
                            }
                            ?>


                        </ul>
                        <?php
                    }
                    ?>
                </div>

            </div>

        </div>
        <div class="form-group">

            <h2>Reply</h2>

            <div class="col-sm-12">
                <textarea name="message" class="form-control autogrow" id="field-ta" placeholder="I will grow as you type new lines."></textarea>
            </div>

        </div>
        <button type="button" class="btn btn-primary btn-icon">
            Send
            <i class="entypo-mail"></i>
        </button>

    </div>





</section>
