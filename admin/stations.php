<?php include('db_connect.php');

// start session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// check if user is not logged in or is not an admin
if(!isset($_SESSION['login_type']) || $_SESSION['login_type'] != '1' & '2'){
   echo "No access to this";
   echo "<script>window.location.href = 'error.html';</script>";
    exit();
  }?>
<style>
	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.3); /* IE */
  -moz-transform: scale(1.3); /* FF */
  -webkit-transform: scale(1.3); /* Safari and Chrome */
  -o-transform: scale(1.3); /* Opera */
  transform: scale(1.3);
  padding: 10px;
  cursor:pointer;
}
</style>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header" style="text-align: center; font-size: 30px;">
						<b>List of Outposts</b>
					</div>
					<div class="card-body">
					<span class="float:right">
			<a class="btn btn-danger btn-block btn-sm col-sm-2 float-right" href="javascript:void(0)" id="new_station" style="padding: 10px 20px; margin-top: 10px;">
				<i class="fa fa-plus"></i> Add New Outpost
			</a>
		</span>

						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="">Name</th>
									<th class="">Address</th>
									<th class="text-center">Contact Number</th>
									<th class="text-center">Action</th>

								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$station = $conn->query("SELECT * FROM stations  order by name asc ");
								while($row=$station->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									<td class="">
										 <p><small><i><b><?php echo $row['address'] ?></i></small></p>
									</td>
									<!-- for contact number  -->
									<td class="">
										 <p><small><i><b><?php echo $row['contact'] ?></i></small></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary edit_station" type="button" data-id="<?php echo $row['id'] ?>" >Edit</button>
										<button class="btn btn-sm btn-outline-danger delete_station" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_station').click(function(){
		uni_modal("New Outpost","manage_station.php","")
		
	})

	$('.edit_station').click(function(){
		uni_modal("Manage Station Details","manage_station.php?id="+$(this).attr('data-id'))
		
	})
	$('.delete_station').click(function(){
		_conf("Are you sure to delete this station?","delete_station",[$(this).attr('data-id')])
	})
	
	$('#check_all').click(function(){
		if($(this).prop('checked') == true)
			$('[name="checked[]"]').prop('checked',true)
		else
			$('[name="checked[]"]').prop('checked',false)
	})
	$('[name="checked[]"]').click(function(){
		var count = $('[name="checked[]"]').length
		var checked = $('[name="checked[]"]:checked').length
		if(count == checked)
			$('#check_all').prop('checked',true)
		else
			$('#check_all').prop('checked',false)
	})
	$('#print_selected').click(function(){
		start_load()
		if($('[name="checked[]"]:checked').length <= 0){
			alert_toast("Select atleast one student first.",'warning')
			end_load()
			return false;
		}
		var chk = [];
		$('[name="checked[]"]:checked').each(function(){
			chk.push($(this).val())
		})
		chk = chk.join(',')
		$.ajax({
			url:'print_barcode.php',
			method:'POST',
			data:{tbl:'stations',ids:chk},
			success:function(resp){
				if(resp){
					var nw = window.open("","_blank","height=800,width=900")
					nw.document.write(resp)
					nw.document.close()
					nw.print()

					setTimeout(function(){
						nw.close()
						end_load()
					},500)

				}
			}
		})
	})
	function delete_station($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_station',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>