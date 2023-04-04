<?php session_start(); ?>
<?php include('admin/db_connect.php'); ?>

<?php 
if(isset($_SESSION['login_id'])){
	$qry = $conn->query("SELECT * from complainants where id = {$_SESSION['login_id']} ");
	foreach($qry->fetch_array() as $k => $v){
		$$k = $v;
	}
	$image_path = isset($image) ? $image : '';
}
?>


<div class="container-fluid">
	<form action="" id="signup-frm" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
	
		<!-- image -->
		<?php if(isset($image)): ?>
			<img src="./admin/<?php echo $image ?>" alt="Image" class="img-thumbnail" 
				style=" display: block;
				margin-left: auto;
				margin-right: auto;
				width: 60%;">
		<?php endif; ?>

		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" class="form-control" value="<?php echo isset($name) ? $name : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact Number</label>
			<input type="text" name="contact" required="" class="form-control" value="<?php echo isset($contact) ? $contact : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address (House #, Lot #, Purok #)</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
		</div>

		<div class="form-group">
 		   <label for="street" class="control-label">Street</label>
    	   <select name="street" id="street" class="form-control" required=""><?php echo isset($street) ? $street : '' ?>
				<option value="A. Bonifacio">A. Bonifacio</option>
				<option value="Air Force Road">Air Force Road</option>
				<option value="Army Road">Army Road</option>
				<option value="Atis Street">Atis Street</option>
				<option value="Avocado Road">Avocado Road</option>
				<option value="Ballecer Extension">Ballecer Extension</option>
				<option value="Ballecer Street">Ballecer Street</option>
				<option value="Banaba Street">Banaba Street</option>
				<option value="Camia Street">Camia Street</option>
				<option value="Colonel Ballecer Street">Colonel Ballecer Street</option>
				<option value="Colonel Caliao Street">Colonel Caliao Street</option>
				<option value="Colonel Gervacio Street">Colonel Gervacio Street</option>
				<option value="Cucumber Road">Cucumber Road</option>
				<option value="Daisy Street">Daisy Street</option>
				<option value="Del Pilar">Del Pilar</option>
				<option value="Friendship Street">Friendship Street</option>
				<option value="General Espino Street">General Espino Street</option>
				<option value="General Licuanan Street">General Licuanan Street</option>
				<option value="Governor I. Rodriguez">Governor I. Rodriguez</option>
				<option value="Langka Road">Langka Road</option>
				<option value="Luzon">Luzon</option>
				<option value="Macapagal Extension">Macapagal Extension</option>
				<option value="Magsaysay Extension">Magsaysay Extension</option>
				<option value="Magsaysay Road">Magsaysay Road</option>
				<option value="Manggahan Street">Manggahan Street</option>
				<option value="Mango Road">Mango Road</option>
				<option value="Mayor Tanyag">Mayor Tanyag</option>
				<option value="Mindanao">Mindanao</option>
				<option value="Navy Road">Navy Road</option>
				<option value="PC Road">PC Road</option>
				<option value="PNP Road">PNP Road</option>
				<option value="President Garcia">President Garcia</option>
				<option value="President Laurel">President Laurel</option>
				<option value="President Macapagal">President Macapagal</option>
				<option value="President Osmeña">President Osmeña</option>
				<option value="President Quezon">President Quezon</option>
				<option value="President Quirino">President Quirino</option>
				<option value="Santo Niño Street">Santo Niño Street</option>
				<option value="Visayas">Visayas</option>
				<!-- Add more options as needed -->
			</select>
		</div>













		<div class="form-group">
			<label for="" class="control-label">Email</label>
			<input type="email" name="email" required="" class="form-control" value="<?php echo isset($email) ? $email : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" class="form-control" <?php echo isset($email) ? '' : "required" ?>>
			<?php if(isset($id)): ?>
				<small><i>Leave this field blank if you dont want to change your password.</i></small>
			<?php endif; ?>
		</div>
		<div class="form-group">
			<label for="" class="control-label">Image</label>
			<input type="file" name="image" class="form-control">
		</div>
		<button class="button btn btn-danger btn-sm">Create</button>
		<button class="button btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
	</form>
</div>

<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#signup-frm').submit(function(e){
		e.preventDefault();
		start_load();
		if($(this).find('.alert-danger').length > 0 ){
			$(this).find('.alert-danger').remove();
		}
		var formData = new FormData(this);
		$.ajax({
			url:'admin/ajax.php?action=signup',
			method:'POST',
			data:formData,
			cache:false,
			contentType:false,
			processData:false,
			error:err=>{
				console.log(err);
				$('#signup-frm button[type="submit"]').removeAttr('disabled').html('Create');
			},
			success:function(resp){
				console.log(resp);
				if(resp == 1){
					location.reload();
				} else if (resp == 2) { 
					// handle the new return value
					$('#signup-frm').prepend('<div class="alert alert-danger">Email already exists.</div>')
					end_load();
				} else {
					$('#signup-frm').prepend('<div class="alert alert-danger">Failed to create account.</div>')
					end_load();
				}
			}
		})
	})
</script>
