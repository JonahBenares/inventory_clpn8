<!-- <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/item.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gatepass.js"></script>
<style type="text/css">
	.label-info {
    background-color: #5bc0de;
		}


		
	#gatepass_datatable_2{
		display: none;
	}


	@media print{
		#gatepass_datatable{
	    	display: none;
	    }
	    #btn-print{
    		display: none;
    	}	    
	    #gatepass_datatable_2{
	    	display: block;
	    }
	}
	   

	.gatepassdate{
		margin-bottom: 0px;
		margin-top: 5px
		}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#">
			<em class="fa fa-home"></em>
		</a></li>
		<li class="active">Overall Gatepass Items</li>
	</ol>
</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<br>
	</div>
</div><!--/.row-->
<!-- Modal -->		
<div id="loader">
  	<figure class="one"></figure>
  	<figure class="two">loading</figure>
</div>
<di id="itemslist" style="display: none">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default shadow">
				<div class="panel-heading">
					Overall Gatepass Items
					<div  id="btn-print" class="pull-right">
						<?php if($from!='' || $to!=''){ ?>
						<a href="<?php echo base_url(); ?>index.php/gatepass/export_all_gatepass/<?php echo $from;?>/<?php echo $to;?>" data-toggle="modal" class="btn btn-primary btn-md">Export Items</a>
						<?php } else { ?>
						<a href="<?php echo base_url(); ?>index.php/gatepass/export_all_gatepass" data-toggle="modal" class="btn btn-primary btn-md">Export Items</a>
						<?php } ?>
						<button class="btn btn-success" data-toggle="modal" data-target="#GatepassFilter" ><span class="fa fa-filter"> </span> Filter</button>
						<button id="printReport" class="btn btn-info " onclick="printDiv('printableArea')">
							<span  class="fa fa-print"></span>
						</button>	
						<a class="clickable panel-toggle panel-button-tab-right shadow"  data-toggle="modal" data-target="#gatepassModal">
							<span class="fa fa-plus"></span></span>
						</a>
					</div>
				</div>
				<div class="panel-body">
					<div id="" class="canvas-wrapper">
						<div class="row" style="padding:0px 10px 0px 10px">
						</div>
						<div style="overflow-x: scroll;">
						<table class="tabledate table-bordered table-hover" id="gatepass_datatable" width="100%" style="font-size: 15px">
							<thead>
								<tr>
									<!--<td width="1%" align="center">#</td>-->
									<td width="15%" align="center"><strong>Date Issued</strong></td>
									<td width="10%" align="center"><strong>Item Description</strong></td>
									<td width="29%" align="center"><strong>U/M</strong></td>
									<td width="15%" align="center"><strong>Quantity</strong></td>
									<td width="15%" align="center"><strong>Remarks</strong></td>
									<td width="15%" align="center"><strong>Type</strong></td>
									<td width="15%" align="center"><strong>MGP No</strong></td>
									<td width="15%" align="center"><strong>Destination</strong></td>
									<td width="15%" align="center"><strong>Status</strong></td>
								</tr>
							
							</thead>
							<tbody>
								<?php
								 	if(!empty($all_items)){
								 	foreach($all_items as $gp_itms){ ?>
								<tr>
									<td align="center"><?php echo date("F d, Y",strtotime($gp_itms['date_issued']));?></td>
									<td align="center"><?php echo $gp_itms['item_name'];?></td>
									<td align="center"><?php echo $gp_itms['unit'];?></td>
									<td align="center"><?php echo $gp_itms['quantity'];?></td>
									<td align="center"><?php echo $gp_itms['remarks'];?></td>
									<td align="center"><?php echo $gp_itms['type'];?></td>
									<td align="center"><?php echo $gp_itms['mgp_no'];?></td>
									<td align="center"><?php echo $gp_itms['destination'];?></td>
									<td align="center"><?php echo $gp_itms['status'];?></td>
								</tr>
								<?php } } else { ?>
								<tr>
									<td align="center" colspan='9'><center>No Data Available.</center></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>


						<!-- ----------------------- table for Printing ------------------------ -->

						<div id="printableArea" class="canvas-wrapper">
							<table class="table-bordered table-hover" id="gatepass_datatable_2" width="100%" style="font-size: 15px">
								<thead>
									<tr>
									<td width="10%" align="center"><strong>Date Issued</strong></td>
									<td width="15%" align="center"><strong>Item Description</strong></td>
									<td width="5%" align="center"><strong>U/M</strong></td>
									<td width="5%" align="center"><strong>Quantity</strong></td>
									<td width="15%" align="center"><strong>Remarks</strong></td>
									<td width="20%" align="center"><strong>Type</strong></td>
									<td width="20%" align="center"><strong>MGP No</strong></td>
									<td width="15%" align="center"><strong>Destination</strong></td>
									<td width="20%" align="center"><strong>Status</strong></td>
									</tr>
								
								</thead>
								<tbody>
									<?php 
										if(!empty($all_items)){
										foreach($all_items as $gp_itms){ ?>
									<tr>
									<?php 
                                	?>
									<td align="center"><?php echo date("F d, Y",strtotime($gp_itms['date_issued']));?></td>
									<td align="center"><?php echo $gp_itms['item_name'];?></td>
									<td align="center"><?php echo $gp_itms['unit'];?></td>
									<td align="center"><?php echo $gp_itms['quantity'];?></td>
									<td align="center"><?php echo $gp_itms['remarks'];?></td>
									<td align="center"><?php echo $gp_itms['type'];?></td>
									<td align="center"><?php echo $gp_itms['mgp_no'];?></td>
									<td align="center"><?php echo $gp_itms['destination'];?></td>
									<td><center><?php echo $gp_itms['status']; ?></center></td>
									</tr>
									<?php } } else { ?>
								<tr>
									<td align="center" colspan='9'><center>No Data Available.</center></td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="returnhistory" tabindex="-1" role="dialog" aria-labelledby="returnhistory">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header modal-headback">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Date Returned History</h4>
				</div>
				<div class="modal-body" style="padding:30px 20px 30px 20px">
					<div id="view_det"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="datereturn" tabindex="-1" role="dialog" aria-labelledby="datereturn">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header modal-headback">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Date Returned</h4>
				</div>
				<form method="POST" action="<?php echo base_url(); ?>index.php/gatepass/add_date_returned">
					<div class="modal-body" style="padding:30px 20px 30px 20px">
						<table width="100%">
							<tr>
								<td width="23%"><label>Date Returned:</label></td>							
								<td width="77%"><input type="date" class="form-control" name="date_returned" required="true"></td>							
							</tr>
							<tr>
								<td colspan="2"><br></td>
							</tr>
							<tr>
								<td><label>Qty:</label></td>							
								<td><input type="number" id="returned_qty" class="form-control" name="qty" required="true"></td>							
							</tr>
							<tr>
								<td colspan="2"><br></td>
							</tr>
							<tr>
								<td><label>Remarks:</label></td>							
								<td><input type="text" id="remarks" class="form-control" name="remarks" required="true"></td>							
							</tr>
						</table>
					</div>
					<div class="modal-footer">
						<input type='hidden' name='gp_rh_id' value='<?php echo $id; ?>'>
						<input type='hidden' name='gd_id' id="gd_id">
						<input type='hidden' name='gatepass_id' id="gatepass_id">
						<input type='hidden' name='balance' id="balance">
						<button type="submit" id="save_btn" class="btn btn-info btn-block">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="GatepassFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header modal-headback">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Filter</h4>
				</div>
				<form method="POST" action = "<?php echo base_url();?>index.php/gatepass/filter_all_gatepass_items">
					<div class="modal-body">
						<div class = "row">
							<div class = "col-lg-6">
								<p class="gatepassdate">From:</p>
								<input type = "date" name = "from" class = "form-control bor-radius">
							</div>
							<div class = "col-lg-6">
								<p class="gatepassdate">To:</p>
								<input type = "date" name = "to" class = "form-control bor-radius">
							</div>
						</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info btn-block"><span class="fa fa-filter"></span> Filter</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_delete_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="alert alert-danger">
				<center>
				  	<h2 class="alert-link"><strong><span class="fa fa-exclamation-triangle" aria-hidden="true"></span> DANGER!</strong></h2>
				  	<hr>
				  	Are you sure you want to delete this?
				  	<br>
				  	<br>					  	
				  	<a href="#" class="btn btn-default " data-dismiss="modal">NO</a>&nbsp<a href="#" class="btn btn-danger">YES</a>.
			  	</center>
			</div>
		</div>
	</div>
<script type="text/javascript">
		$(document).on("click", "#clickDate", function () {
		    var gd_id = $(this).attr("data-id");
		    var gatepass_id = $(this).attr("data-gp-id");
		    var returned_qty = $(this).attr("data-issued");
		    //var sum_returned = $(this).attr("data-sum");
		    var balance = $(this).attr("data-balance");
		    $("#gd_id").val(gd_id);
		    $("#gatepass_id").val(gatepass_id);
		    $("#balance").val(balance);
		    //$("#sum_returned").val(returned_qty);
		});

		$(document).on("click", "#clickHistory", function () {
		    var gd_id = $(this).attr("data-id");
		    var returned_date = $(this).attr("data-date");
		    var returned_qty = $(this).attr("data-qty");
		    var loc= document.getElementById("baseurl").value;
   	 		var redirect = loc+'index.php/gatepass/view_history';
		    $.ajax({
	            type: "POST",
	            url: redirect,
	            data: "gd_id="+gd_id,
	            beforeSend:function(){
	                $("#view_det").html('Please wait ..');
	            },
	            success:function(data){
	               $("#view_det").html(data);
	            },
	      	});
		});
		
	    $(document).on("blur", "#returned_qty", function () {
	    	var returned_qty=document.getElementById('returned_qty').value;
	    	var balance=document.getElementById('balance').value;
	        if(parseFloat(returned_qty) > parseFloat(balance)){
	          alert("Returned quantity is greater than issued/remaining quantity!");
	          $('#save_btn').attr('disabled','disabled');
	        }else{
	        	$('#save_btn').removeAttr('disabled');
	        }
	    });


</script>