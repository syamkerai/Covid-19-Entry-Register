<?php include("includes/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SSTM | COVID-19 DARSHAN REGISTER</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		.box-title {
			border-radius: 5px;
			box-shadow: 0px 0px 3px 1px gray;
			padding: 10px 0px;
		}

		.error-msg {
			color: #dc3545;
			font-weight: 600;
		}

		.success-msg {
			color: green;
			font-weight: 600;
		}

		.left-panel {
			width: 75%;
		}

		.right-panel {
			position: absolute;
			width: 25%;
			right: 10px;
			top: 10px;
			padding-left: 12px;
		}
	</style>
</head>

<body>
<!-- <?php
phpinfo();
?> -->
	<div class="container-fluid">
		<div class="left-panel">
			<div class="container">
				<div class="row m-2 text-center">
					<div class="col-3">
						<button type="button" class="btn btn-lg btn-success btn-block" data-toggle="modal" data-target="#exampleModalCenter">Sign In</button>
					</div>
					<div class="col-9">
						<div class="alert alert-primary" role="alert">
							<h4 class="alert-heading">SSTM | COVID-19 DARSHAN REGISTER</h4>
						</div>
					</div>
				</div>
				<div class="row mt-5" id="tbl_rec">
				</div>
			</div>
		</div>

		<div class="right-panel">
			<div class="card border-info mb-3" style="max-width: 25rem;">
				<div class="card-header">
					<b>
						<center>No. Of People In The Prayer Hall</center>
					</b>
					<b style="color:#FF0000" ;>
						<center>A maximum of 10 people allowed only.</center>
					</b>

				</div>
				<h1 class="display-3">
					<div class="text-info" id="tbl_count">
						<div>
				</h1>
			</div>
		</div>
	</div>

	<!-- Insert Design Modal -->

	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">SSTM | COVID-19 Visitor Sign In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="includes/insert.php" method="POST">
					<div class="modal-body">
						<div class="alert alert-warning" role="alert">
							<strong>IMPORTANT!</strong>
							<br> Please register for each individual person.
						</div>
						<div class="form-group">
							<label><b>First Name</b></label>
							<input type="text" name="fname" id="fname" class="form-control" placeholder="Firstname" autocomplete="on" pattern="[A-Z]{3,15}" title="No numeric, spaces or special characters allowed. A minimum of 3 and a maximum of 15 characters allowed." required>
							<span class="error-msg" id="msg_1"></span>
						</div>
						<div class="form-group">
							<label><b>Surname</b></label>
							<input type="text" name="lname" id="lname" class="form-control" placeholder="Surname" autocomplete="on" pattern="[A-Z]{3,15}" title="No numeric, spaces or special characters allowed. A minimum of 3 and a maximum of 15 characters allowed." required>
							<span class="error-msg" id="msg_2"></span>
						</div>
						<div class="form-group">
							<label><b>Mobile Number</b></label>
							<input type="text" name="mnumber" class="form-control" placeholder="0410333555" pattern="^\d{10}$" title="Please input a valid mobile number" autocomplete="off" minlength="10" maxlength="10" required>
							<span class="error-msg" id="msg_3"></span>
						</div>
						<div class="form-group">
							<label><b>Sign In Date</b></label>
							<input type="date" name="tdate" id="today" class="form-control" readonly>
							<span class="error-msg" id="msg_4"></span>
						</div>
						<div class="form-group">
							<label><b>Sign In Time</b></label>
							<input type="text" name="intime" class="form-control" readonly>
							<span class="error-msg" id="msg_5"></span>
						</div>

						<div class="form-group">
							<span class="success-msg" id="sc_msg"></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" id="close_click" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Sign In</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- End Insert Modal -->

	<!-- Update Design Modal -->

	<div class="modal fade" id="updateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="updateModalCenterTitle">SSTM | COVID-19 Visitor Sign Out</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" id="updata">
					<div class="modal-body">
						<div class="form-group">
							<label><b>Sign Out Time</b></label>
							<input type="text" class="form-control" name="outtime" readonly>
							<span class="error-msg" id="umsg_5"></span>
						</div>
						<div class="form-group">
							<input type="hidden" name="dataval" id="upd_7">
							<span class="success-msg" id="umsg_6"></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancel">Cancel</button>
						<button type="submit" class="btn btn-primary">Sign Out</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<table class="table" style="vertical-align: middle; text-align: center;">
				  <thead class="thead-dark">
					<tr>
					  	<th scope="col">#</th>
					  	<th scope="col">First Name</th>
					  	<th scope="col">Last Name</th>
						<th scope="col">Sign In Date</th>
					  	<th scope="col">Sign In Time</th>
						<th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
				  	<?php if($select){ foreach($select as $se_data){ ?>
					<tr>
					  <th scope="row"><?php echo $counter; $counter++; ?></th>
					  	<td><?php echo $se_data['u_fname']; ?></td>
					  	<td><?php echo $se_data['u_lname']; ?></td>
					  	<td><?php echo $se_data['u_tdate']; ?></td>
						<td><?php echo $se_data['u_intime']; ?></td>
						<td>
							<button type="button" class="btn btn-primary editdata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#updateModalCenter">Sign Out</button>
							<!--<button type="button" class="btn btn-danger deletedata" data-dataid="<?php echo $se_data['u_id']; ?>" data-toggle="modal" data-target="#deleteModalCenter">Delete</button>-->
						</td>
					</tr>
					<?php }}else{ echo "<tr><td colspan='7'><h2>No Results Found</h2></td></tr>"; } ?>
				  </tbody>
				</table>	
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
</body>
</html>