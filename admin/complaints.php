<?php
include 'db_connect.php';
// start session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// check if user is not logged in or is not an admin
if(!isset($_SESSION['login_type']) || $_SESSION['login_type'] != '1' & '2'){
   echo "No access to this";
   echo "<script>window.location.href = 'error.html';</script>";
    exit();
  }
?>
<div class="container-fluid">
	<div class="col-lg-12">
	<div class="row mb-4 mt-4">
			<div class="col-md-12">
			
			</div>
		</div>
		<div class="card">
			<div class="card-header" style="text-align: center; font-size: 30px;">
				<b>List of Reports of Complaints</b>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover" id="complaint-tbl">
			        <thead style="text-align: center; font-size: 15px;">
			          <tr>
			            <th width="15%">Date</th>
						<th width="10%">Report Description</th>
			            <th width="20%">Incident Address</th>
						<th width="10%">Street</th>
			            <th width="20%">Message</th>

			            <th width="10%">Status</th>
			      

			            <th width="10%">Action</th>
			          </tr>
			        </thead>
			        <tbody>
			          <?php
			          $status = array("","Pending","Received","Action Made");
			          $qry = $conn->query("SELECT * FROM complaints order by unix_timestamp(date_created) desc ");
					 
			          while($row = $qry->fetch_array()):
			          ?>
			          <tr class="<?php echo $row['status'] == 1 ? 'border-alert' : '' ?>">
			            <td><?php echo date('M d, Y h:i A',strtotime($row['date_created'])) ?></td>
						<td><?php echo $row['reports'] ?></td>
			            <td><?php echo $row['address'] ?></td>
						<td><?php echo $row['street'] ?></td>
						<td><?php echo $row['message'] ?></td>

			            <td><?php echo $status[$row['status']] ?></td>
	


			  

			            <td class="text-center">
			            	<button class="btn btn-danger btn-sm m-0 view_btn" type="button" data-id="<?php echo $row['id'] ?>">View</button>
			            </td>
			          </tr>
			        <?php endwhile; ?>
			        </tbody>
			  </table>
			</div>
		</div>
	</div>
</div>
<style>
	
	.border-gradien-alert{
		border-image: linear-gradient(to right, red , yellow) !important;
	}
	.border-alert th, 
	.border-alert td {
	  animation: blink 200ms infinite alternate;
	}

	@keyframes blink {
	  from {
	    border-color: white;
	  }
	  to {
	    border-color: red;
		background: #ff00002b;
	  }
	}
</style>
<script>
	$('#complaint-tbl').dataTable();
	$('.view_btn').click(function(){
		uni_modal("View Details","manage_complaint.php?id="+$(this).attr('data-id'),"mid-large")
	})
</script>