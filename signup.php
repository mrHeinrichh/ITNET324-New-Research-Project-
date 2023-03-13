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
	
			<?php if(isset($image)): ?>
				<img src="./admin/<?php echo $image ?>" alt="Image" class="img-thumbnail" width="150px">
			<?php endif; ?>

		
		<div class="form-group">
			<label for="" class="control-label">Name</label>
			<input type="text" name="name" required="" class="form-control" value="<?php echo isset($name) ? $name : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Contact</label>
			<input type="text" name="contact" required="" class="form-control" value="<?php echo isset($contact) ? $contact : '' ?>">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Address</label>
			<textarea cols="30" rows="3" name="address" required="" class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
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
		<button class="button btn btn-primary btn-sm">Create</button>
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
