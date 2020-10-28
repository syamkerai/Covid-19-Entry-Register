<?php include("includes/config.php"); ?>
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
				<form method="POST" action="includes/insert.php">
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
	<script type="text/javascript">
		setInterval(() => {
			const time = new Date().toLocaleTimeString();
			$('input[name="intime"]').val(time);
			$('input[name="outtime"]').val(time);
		}, 1000);
		//set date
		setInterval(() => {
			getField("Today").value = util.printd("YYYY/MM/DD", new Date());
		}, 5000);

		//count refresh
		setInterval(() => {
			$('#tbl_count').load('count.php');
		}, 3000);
	</script>

	<?php

	$counter = 1;
	$sql = "SELECT * FROM entries";
	$result = mysqli_query($con, $sql);

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		echo '<table class="table" style="vertical-align: middle; text-align: center;">';
		echo '<thead class="thead-dark">';
		echo '<tr>';
		echo '<th scope="col">#</th>';
		echo '<th scope="col">First Name</th>';
		echo '<th scope="col">Last Name</th>';
		echo '<th scope="col">Sign In Date</th>';
		echo '<th scope="col">Sign In Time</th>';
		echo '<th scope="col">Action</th>';
		echo '</tr>';
		echo '</thead>';
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tbody>';
			echo '<tr>';
			echo '<th scope="row">' . $counter . '</th>';
			echo '<td>' . $row['u_fname'] . '</td>';
			echo '<td>' . $row['u_lname'] . '</td>';
			echo '<td>' . $row['u_tdate'] . '</td>';
			echo '<td>' . $row['u_intime'] . '</td>';
			echo '<td>';
			echo '<button type="button" class="btn btn-primary editdata" data-dataid="' . $row['u_id'] . ' " data-toggle="modal" data-target="#updateModalCenter">Sign Out</button>';
			echo '</td>';
			echo '</tr>';
			echo '</tbody>';




echo '<div class="modal fade" id="updateModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
echo '<div class="modal-dialog modal-dialog-centered" role="document">';
echo '<div class="modal-content">';
echo '<div class="modal-header">';
echo '<h5 class="modal-title" id="updateModalCenterTitle">SSTM | COVID-19 Visitor Sign Out</h5>';
echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
echo '<span aria-hidden="true">&times;</span>';
echo '</button>';
echo '</div>';
echo '<form method="POST" action="includes/update.php">';
echo '<div class="modal-body">';
echo '<div class="form-group">';
echo '<label><b>Sign Out Time</b></label>';
echo '<input type="text" class="form-control" name="outtime" readonly>';
echo '<span class="error-msg" id="umsg_5"></span>';
echo '</div>';
echo '<div class="form-group">';
echo '<input type="hidden" name="dataval" value="' . $row['u_id'] . '">';
echo '<span class="success-msg" id="umsg_6"></span>';
echo '</div>';
echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-secondary" data-dismiss="modal" id="up_cancel">Cancel</button>';
echo '<button type="submit" class="btn btn-primary">Sign Out</button>';
echo '</div>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</div>';



			$counter = $counter + 1;
		}
		echo '</table>';
	} else {
		echo "0 results";
	}
	?>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
</body>

</html>