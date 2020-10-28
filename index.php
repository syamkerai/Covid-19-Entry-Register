<?php
include 'backend/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head> 	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
	<script src="ajax/ajax.js"></script>
</head>

<body>
	<style>
				.right-panel {
			position: absolute;
			width: 25%;
			right: 10px;
			top: 10px;
			padding-left: 12px;
		}
	</style>
	<div class="container">
		<p id="success"></p>
		<div class="row" style="margin-bottom: 100px;">
			<?php

				$sql = "SELECT COUNT(`u_id`)FROM entries WHERE `u_outtime` = '00:00:00'";
				if ($result = mysqli_query($conn, $sql));
					if (mysqli_num_rows($result) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
						  $no_people = $row["COUNT(`u_id`)"];
						}
					  } else {
						$no_people = '0';
					  }
					  function function_alert() { 
              
						// Display the alert box; note the Js tags within echo, it performs the magic
						echo "<script>alert('There are more than 10 people inside please Wait for them to exit');</script>"; 
					} 
			?>
			<div class="right-panel" >
				<div class="card border-info mb-3" style="max-width: 25rem;">
					<div class="card-header">
						<b>
							<center>No. Of People In The Prayer Hall</center>
						</b>
						<b>
							<center><?php echo $no_people;?></center>
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
		<div class="table-wrapper">
			<div class="table-title">

				<div class="row">
					<div class="col-sm-6">
						<h2>SSTM <b>COVID 19 VISITOR REGISTER</b></h2>
					</div>
					<div class="col-sm-6">
					<?php if($no_people >= 10){echo '<a onclick="myFunction()" class="btn btn-success"" ><i class="material-icons"></i> <span>Sign In</span></a>';}else{echo '<a href="#addVisitorModal" class="btn btn-success" data-toggle="modal" ><i class="material-icons"></i> <span>Sign In</span></a>';} ?>
						<!--a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a>-->
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>FIRSTNAME</th>
						<th>SURNAME</th>
						<th>NO. OF FAMILY MEMBERS</th>
						<th>SIGN IN DATE</th>
						<th>SIGN IN TIME</th>
						<th>EXIT</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$result = mysqli_query($conn, "SELECT * FROM entries WHERE u_outtime = '00:00:00'");
					$i = 1;
					while ($row = mysqli_fetch_array($result)) {
					?>
						<tr id="<?php echo $row["id"]; ?>">

							<td><?php echo $i; ?></td>
							<td><?php echo $row["u_fname"]; ?></td>
							<td><?php echo $row["u_lname"]; ?></td>
							<td><?php echo $row["u_noofmembers"]; ?></td>
							<td><?php echo $row["u_tdate"]; ?></td>
							<td><?php echo $row["u_intime"]; ?></td>
							<td>
								<a href="#editVisitorModal" class="edit" data-toggle="modal">
									<button class="btn btn-info" data-toggle="tooltip" data-id="<?php echo $row["u_id"]; ?>" data-outtime="<?php echo $row["u_outtime"]; ?>" title="Sign Out">Sign Out</button>
								</a>
								<!--<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>-->
							</td>
						</tr>
						<div id="editVisitorModal" class="modal fade">
							<div class="modal-dialog">
								<div class="modal-content">
									<form method="POST" action="backend/signout.php">
										<div class="modal-header">
											<h4 class="modal-title">Visitor Sign Out</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
										</div>
										<div class="modal-body">

											<input type="hidden" id="id_u" name="id" class="form-control" value="<?php echo $row["u_id"]; ?>" requir	ed>

											<div class="form-group">
												<label>Sign Out Time</label>
												<input type="text" id="outtime" name="outtime" class="form-control" required/>
											</div>

										</div>
										<div class="modal-footer">
											<input type="hidden" value="2" name="type">
											<button type='submit' name="Submit" value="Submit" class="btn btn-primary">Sign Out</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>

		</div>
	</div>
	<!-- Add Modal HTML -->
	<div id="addVisitorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">
						<h4 class="modal-title">Visitor Sign In</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<label>FIRSTNAME</label>
							<input type="text" id="fname" name="fname" class="form-control" required/>
						</div>

						<div class="form-group">
							<label>SURNAME</label>
							<input type="text" id="lname" name="lname" class="form-control" required/>
						</div>

						<div class="form-group">
							<label>MOBILE NUMBER</label>
							<input type="phone" id="mnumber" name="mnumber" class="form-control" required/>
						</div>

						<div class="form-group">
							<label>NUMBER OF FAMILY MEMBERS SIGNING IN</label>
							<input type="number" id="noofmembers" name="noofmembers" max="10" class="form-control" required/>
						</div>

						<div class="form-group">
							<label>SIGN IN DATE</label>
							<input type="date" id="today" name="tdate" class="form-control" required/>
						</div>

						<div class="form-group">
							<label>SIGN IN TIME</label>
							<input type="text" id="intime" name="intime" class="form-control" required/>
						</div>

					</div>
					<div class="modal-footer">
						<input type="hidden" value="1" name="type">
						<button type="submit" class="btn btn-success" data-dismiss="modal" id="btn-add">Sign In</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="editVisitorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="backend/signout.php">
					<div class="modal-header">
						<h4 class="modal-title">Visitor Sign Out</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">

						<input type="hidden" id="id_u" name="id" class="form-control" value="<?php $row["id"]; ?>" required/>

						<div class="form-group">
							<label>Sign Out Time</label>
							<input type="text" id="outtime" name="outtime" class="form-control" required/>
						</div>

					</div>
					<div class="modal-footer">
						<input type="hidden" value="2" name="type">
						<button type='submit' name="Submit" value="Submit" class="btn btn-primary">Sign Out</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteVisitorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>

					<div class="modal-header">
						<h4 class="modal-title">Delete Record</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
function myFunction() {
  alert("There are more than 10 people inside please Wait for them to exit");
}
		//set Sign In time
		setInterval(() => {
			const time = new Date().toLocaleTimeString();
			$('input[name="intime"]').val(time);
		}, 1000);

		//set Sign Out time
		setInterval(() => {
			const time = new Date().toLocaleTimeString();
			$('input[name="outtime"]').val(time);
		}, 1000);

		//set date
		setInterval(() => {
			document.getElementById('today').value = moment().format('YYYY-MM-DD');
		}, 5000);

		// Capitalize Fields
		function forceKeyPressUppercase(e) {
			var charInput = e.keyCode;
			if ((charInput >= 97) && (charInput <= 122)) { // lowercase
				if (!e.ctrlKey && !e.metaKey && !e.altKey) { // no modifier key
					var newChar = charInput - 32;
					var start = e.target.selectionStart;
					var end = e.target.selectionEnd;
					e.target.value = e.target.value.substring(0, start) + String.fromCharCode(newChar) + e.target.value.substring(end);
					e.target.setSelectionRange(start + 1, start + 1);
					e.preventDefault();
				}
			}
		}
	</script>


</body>

</html>