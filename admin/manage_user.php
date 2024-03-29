<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>

<div class="container-fluid">
	<div id="msg"></div>
	<form action="" id="manage-user" enctype="multipart/form-data">


		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<?php if (isset($meta['image'])): ?>
        <img src="<?php echo $meta['image']; ?>" alt="User Image" 	
			style=" display: block;
				margin-left: auto;
				margin-right: auto;
				border-radius: 50%;
				width: 60%;">
    <?php endif; ?>

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="" required autocomplete="off">
			<?php if(isset($meta['id'])): ?>
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		<?php endif; ?>
		</div>
		<?php if(isset($meta['type']) && $meta['type'] == 3): ?>
			<input type="hidden" name="type" value="3">
		<?php else: ?>
		<?php if(!isset($_GET['mtype'])): ?>
		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Staff</option>
				<option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
			</select>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		
		<div class="form-group">
			<label for="" class="control-label">Image</label>
			<input type="file" name="image" class="form-control">
		</div>

	</form>
</div>
<script>
	
	$('#manage-user').submit(function(e){
    e.preventDefault();
    start_load()
    var formData = new FormData(this); // create a FormData object from the form
   $.ajax({
    url:'ajax.php?action=save_user',
    method:'POST',
    data:formData,
    contentType:false,
    processData:false,
    success:function(resp){
        console.log(resp);
        if(resp == 1){
            $('#msg').html('<div class="alert alert-success">User saved successfully.</div>');
            setTimeout(function(){
                location.reload()
            },1500)
        }else if(resp == 2){
            $('#msg').html('<div class="alert alert-danger">Username already exists.</div>');
        }else if(resp == 3){
            $('#msg').html('<div class="alert alert-danger">Invalid image format.</div>');
        }
        end_load()
    }
})

})



</script>