 <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gatepass.js"></script>

<!--<link href="<?php echo base_url(); ?>assets/Styles/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script> -->
<style type="">
	.zoom {
	  padding: 0px;
	  transition: transform .2s;
	  width:20px;
	  height: 20px;
	  margin: 0 auto;
	  right: 0; 
	}

	.zoom:hover {
	  -ms-transform: scale(25); /* IE 9 */
	  -webkit-transform: scale(25); /* Safari 3-8 */
	  transform: scale(25);
	  margin-right: 0px;
	}

	.popover__title {
	  font-size: 12px;
	  text-decoration: none;
	  color: rgb(228, 68, 68);
	  text-align: center;
	}

	.popover__wrapper {
	  position: relative;
	  display: inline-block;
	}
	.popover__content {
	  opacity: 0;
	  visibility: hidden;
	  position: absolute;
	  right: 55px;
      top: -150px;
	  transform: translate(0, 10px);
	  background-color: #dbdbdb;
	  padding: 1.5rem;
	  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
	  width: auto;
	}
	.popover__content:before {
		position: absolute;
	    z-index: -1;
	    content: "";
	    right: calc(-1% - 10px);
	    top: 35%;
	    transform: rotate(90deg);
	    border-style: solid;
	    border-width: 0 10px 10px 10px;
	    border-color: transparent transparent #dbdbdb transparent;
	    transition-duration: 0.3s;
	    transition-property: transform;
	}
	.popover__wrapper:hover .popover__content {
	  z-index: 10;
	  opacity: 1;
	  visibility: visible;
	  transform: translate(0, -20px);
	  transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
	}
	.popover__message {
	  text-align: center;
	}
</style>
<!--<div class="modal fade" id="datereturn" tabindex="-1" role="dialog" aria-labelledby="datereturn">
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
						<td width="30%"><label>Date Returned:</label></td>							
					</tr>
					<tr>
						<td><input type = "date" name = "date_returned" class = "form-control" style="margin:4px"></td>
					</tr>
				</table>
				<div class="modal-footer">
					<input type='hidden' name='gatepassid' value='<?php echo $id; ?>'>
					<input type='hidden' name='gd_id' id="gd_id">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary btn-block" value="Add Date Return">							
				</div>
			</div>
		</div>
	</div>
</div>-->

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

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">
				<em class="fa fa-home"></em>
			</a></li>
			<li class=""><a href="javascript:history.back()">Gatepass </a></li>
			<li class="active"> View Details</li>
		</ol>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-lg-12">
			<br>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default shadow">
				<div class="panel-heading" style="height:20px">
				</div>
				<div class="panel-body">
					<form id='gatepassfrm' method = "POST">
						<div class="canvas-wrapper">
							<?php 
							foreach($head AS $h){
								$saved=$h->saved;
							}
							foreach($pass as $p){ ?>
							<table width="100%" >
								<tr>
									<td style="vertical-align: top;"><p class="nomarg">To Company:</p></td>
									<td colspan="3"><label class="labelStyle"><?php echo $p['company'];?></label></td>
									<?php if($saved=='0'){ ?>
									<td width="5%" ><a href="<?php echo base_url(); ?>index.php/gatepass/add_gatepass/<?php echo $p['gatepassid'];?>" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span></a></td>
									<?php } ?>
									<td width="5%" ><a href="<?php echo base_url();?>index.php/gatepass/gatepass_print/<?php echo $p['gatepassid'];?>" class="btn btn-warning btn-sm"><span class="fa fa-print"></span> Print</a></td>
								</tr>
								<tr>
									<td width="10%"><p class="nomarg">Destination: </p></td>
									<td width="30%"><h5 class="nomarg"><?php echo $p['destination'];?></h5></td>
									<td width="13%"><p class="nomarg">Date Issued:</p></td>
									<td width="42%" colspan="3"><h5 class="nomarg"><?php echo date('F d, Y', strtotime($p['date_issued'])); ?></h5></td>
									
								</tr>
								<tr>
									<td><p class="nomarg">Vehicle No:</p></td>
									<td><h5 class="nomarg"><?php echo $p['vehicle_no'];?></h5></td>
									<td><p class="nomarg">MGP No.:</p></td>
									<td><h5 class="nomarg"><?php echo $p['mgp_no'];?></h5></td>
								</tr>
								
								<?php } ?>
							</table>
							<br>
							<!--<div class="row">
								<div class="col-lg-4">							
									<p>
									<select name="item" id='item' class="form-control select2">
										<option value = ""></option>
										<?php foreach($item_list AS $itm){ ?>
										<option value = "<?php echo $itm->item_id;?>"><?php echo $itm->item_name;?></option>
										<?php } ?>
									</select>
									</p>
								</div>
								<div class="col-lg-2">
									<p>				
										<input placeholder="Quantity" type="text" name="quantity" id="quantity" class="form-control" >
									</p>
								</div>
								<div class="col-lg-2">
									<p>				
									<select name="unit" id='unit' class="form-control select2">
										<option value = ""></option>
										<?php foreach($unit AS $unit){ ?>
										<option value = "<?php echo $unit->unit_id;?>"><?php echo $unit->unit_name;?></option>
										<?php } ?>
									</select>
									</p>
								</div>
								<div class="col-lg-3">
									<p>				
										<textarea placeholder="Remarks" type="text" name="borrowfrom" id="borrowfrom" class="form-control" rows="1" ></textarea> 
									</p>
								</div>
								<div class="col-lg-1">
									<div id='alrt' style="font-weight:bold"></div>
									<p>				
										<a type="button" onclick='add_item()' class="btn btn-warning btn-md" id = "submit"><span class="fa fa-plus"></span></a>
									</p>
								</div>
								<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
							</div>-->
							<div style="box-shadow: -1px 2px 10px 3px #eeeff5; padding:10px;border-radius:5px">
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-bordered table-hover">
											<tr>
												<th width="2%" style='text-align: center;'>#</th>
												<th width="33%">Item Description</th>
												<th width="5%" style='text-align: center;'>Qty</th>
												<th width="5%" style='text-align: center;'>Returned Qty</th>
												<th width="5%" style='text-align: center;'>Remaining Qty</th>
												<th width="10%" style='text-align: center;'>UOM</th>
												<th width="25%" style='text-align: center;'>Remarks</th>
												<th width="15%" style='text-align: center;'>Type</th>
												<th width="25%" style='text-align: center;'>Returned History</th>
												<th width="25%" style='text-align: center;'>Image</th>
												<!--<th width="5%" style='text-align: center;' width="1%">Action</th>-->
											</tr>
										<tbody id="item_body">
											<?php 
											 $x=1; if(!empty($gatepass_itm)){
												foreach($gatepass_itm as $gp){  ?>
												<tr>
													<td><center><?php echo $x; ?></center></td>
													<td><?php echo $gp['item'];?></td>
													<td><center><?php echo $gp['quantity'];?></center></td>
													<td><center><?php echo number_format($gp['remaining_qty'],2);?></center></td>
													<td><center><?php echo number_format($gp['total_returned'],2);?></center></td>
													<td><center><?php echo $gp['unit'];?></center></td>
													<td><center><?php echo $gp['remarks'];?></center></td>
													<td><center><?php echo $gp['type'];?></center></td>
													<?php if($gp['type']=='Non-Returnable'){ ?>
													<td><center><?php echo $gp['type'];?></center></td>
													<?php } ?>
													<?php if($gp['type']=='Returnable'){ ?>
													<!--<td><center><a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#returnhistory" id="clickHistory" data-id="<?php echo $gp['gd_id']; ?>" title="View History" alt='View History'><span class="fa fa-eye"></span></a></center></td>-->
													<td><center><a class="btn btn-warning btn-xs" onclick="history('<?php echo $gp['gd_id'];?>','<?php echo base_url();?>')" title="View History" alt='View History'><span class="fa fa-eye"></span></a></center></td>
													<?php } ?>
													<!--<?php if($gp['type']=='Non-Returnable'){ ?>
													<td><center><?php echo $gp['type'];?></center></td>
													<?php } ?>
													<?php if($gp['type']=='Returnable'){ ?>
													<td><center><?php echo $gp['date_returned'];?> &nbsp; <?php if($gp['date_returned']==''){ ?><a class="btn-xs btn-warning btn"  data-toggle="modal" data-target="#datereturn" id="clickDate" data-id="<?php echo $gp['gd_id']; ?>"><span class="fa fa-plus"></span></a><?php } ?></center></td>
													<?php } ?>-->
													<td>
														<div class="popover__wrapper">
															<img src="<?php if(!empty($gp['image'])) { 
														echo base_url(); ?>uploads/<?php echo $gp['image']; 
														 } else { echo base_url(); ?>assets/default/default-img.jpg<?php } ?>" width="100%" height="100%" />
														  	<div class="popover__content">
														    	<img style="width: 500px" src="<?php if(!empty($gp['image'])) { echo base_url(); ?>uploads/<?php echo $gp['image']; 
										 						} else { echo base_url(); ?>assets/default/default-img.jpg<?php } ?>">
														  	</div>
														</div>															
													</td>
													<!--<td><center><a href="" class="btn btn-danger btn-xs"><span class="fa fa-times"></span></a></center></td>-->
												</tr>
											<?php $x++; } } else { ?>
											<tr>
												<td align="center" colspan='9'><center>No Data Available.</center></td>
											</tr>
											<?php } ?>
										</table>
									</div>
								</div>
							</div>
							<br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
			$(document).on("click", "#clickHistory", function () {
		    var gd_id = $(this).attr("data-id");
		  
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
</script>
	<!--<script type="text/javascript">
		$(document).on("click", "#clickDate", function () {
		    var gd_id = $(this).attr("data-id");
		    $("#gd_id").val(gd_id);
		  
		});

	</script>-->
