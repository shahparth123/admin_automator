<?php

?>
<h2>API Analysis</h2>

<br />

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">API name: <?php echo $apiname?></div>
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

					<?php if($parameters>0) { ?>
					<tr>
						<td class="middle-align">Parameters</td>
						<td>
							<?php 
							for($i=1;$i<=$parameters;$i++)
							{
								echo "??".$i."?? will be replaced with p".$i."<br />";
							}
							?>
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

<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title">Example Request</div>
			</div>
			
			<table class="table table-bordered table-responsive table-stripped">

				<tbody>
					<tr>
						<th>Request URL:
						</th>
						<td>
							<?php echo base_url()."api/index/".$oper."/".$id."/".$auth_key."/".$apiname; ?>
						</td>
					</tr>
					<tr>
						<th>Request Method</th>
						<td>POST</td>
					</tr>
					<tr>
						<th>Request Body</th>
						<td>
							<?php 
							for($i=1;$i<=$parameters;$i++)
							{
								if($i==1)
								{
									echo "p".$i."=value".$i;

								}
								else{
									echo "&p".$i."=value".$i;

								}

							}
							?>
						</td>
					</tr>
					<?php
					if($oper=="SELECT")
					{
						?>
						<tr>
							<th>Response</th>
							<td>JSON object containing values of fields listed above.</td>
						</tr>
						<?php	
					}
					else if($oper=="UPDATE"){
						?>
						<tr>
							<th>Response</th>
							<td>
								<pre>
									{
									"status":0,
									"count":0
								}
							</pre>			
							Here status=1 if success and status=0 if falure<br>
							count will return number of updated rows.

						</td>
					</tr>
					<?php	

				}
				else if($oper== "INSERT" ){
					?>
					<tr>
						<th>Response</th>
						<td>
							<pre>
{
	"status":1,
	"id":1
}							</pre>			
							Here status=1 if success and status=0 if falure<br>
							id returns id of inserted row.

						</td>
					</tr>
					<?php	
				}
				else if($oper=="DELETE"){
					?>
					<tr>
						<th>Response</th>
						<td>
							<pre>
{
	"status":0,
	"count":0
}							</pre>			
							Here status=1 if success and status=0 if falure<br>
							count returns number of deleted row.

						</td>
					</tr>
					<?php	

				}
				?>
			

			</tbody>
		</table>
	</div>
</div>
</div>