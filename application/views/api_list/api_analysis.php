<?php

?>
<h2>API Analysis</h2>

<br />

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">API name:<?php echo $apiname?></div>
			</div>
			
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="30%">Title</th>
						<th>Details</th>
					</tr>
				</thead>
				<tbody>
                                    
                                        <?php if(isset($operation)==true) { ?>
					<tr>
						<td class="middle-align">Operation</td>
						<td>
							<?php echo $operation?>
						</td>
					</tr>
                                    <?php } ?>
                                    
                                            <?php if(isset($primary_table)==true) { ?>    
					<tr>
						<td class="middle-align">Primary Table</td>
						<td>
							<?php echo $primary_table?>
						</td>
					</tr>
                                            <?php } ?>
					
                                        <?php if(isset($fields)==true) { ?>
					<tr>
						<td class="middle-align">Fields [table.field]</td>
						<td>
							
                                                    <?php foreach($fields as $fields)
                                                        {
                                                                echo $fields."<br>";
                                                        }?>
						</td>
					</tr>
                                        <?php } ?>
                                        
                                        <?php if(isset($conditions)==true) { ?>
					<tr>
						<td class="middle-align">Conditions</td>
						<td>
                                                        <?php foreach($conditions as $conditions)
                                                        {
                                                                echo $conditions."<br>";
                                                        } ?>
						</td>
					</tr>
                                        <?php } ?>
                                        
                                        <?php if(isset($groupby)==true) { ?>
                                        <tr>
						<td class="middle-align">GROUP BY</td>
						<td>
                                                        <?php echo $groupby ?>
						</td>
					</tr>
                                        <?php } ?>
                                        
                                        <?php if(isset($orderby)==true) { ?>
                                        <tr>
						<td class="middle-align">ORDER BY</td>
						<td>
                                                        <?php echo $orderby ?>
						</td>
					</tr>
                                        <?php } ?>
                                        
                                        <?php if(isset($join)==true) { ?>
                                        <tr>
						<td class="middle-align">Joins</td>
						<td>
                                                        <?php foreach($join as $join)
                                                        {
                                                                echo $join."<br>";
                                                        }?>
                                                </td>
					</tr>
                                         <?php } ?>
                                        
                                        <?php if(isset($customquery)==true) { ?>
                                        <tr>
						<td class="middle-align">Custom Query</td>
						<td>
							<?php echo $customquery?>
						</td>
					</tr>
                                        <?php } ?>
                                        
                                        <?php if(isset($parameters)==true) { ?>
					<tr>
						<td class="middle-align">Parameters</td>
						<td>
							
						</td>
					</tr>
                                        <?php } ?>
                                        
					<?php if(isset($comment)==true) { ?>
					<tr>
						<td class="middle-align">Description</td>
						<td>
							<?php echo $comment?>
						</td>
					</tr>
                                        <?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>