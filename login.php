<?php session_start() ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-25 col-md-10 col-sm-10">
    
       
    
          <form action="" id="login-frm">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
              <!-- <a href="#" class="float-end">Forgot password?</a> -->
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-lg btn-primary" type="submit">Log in</button>
			  <button class="btn btn-lg btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </form>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <p  href="#" id="new_account"class="card-text text-center">Don't have an account yet? <a href="#" id="new_account">Sign up</a></p>
        </div>
      </div>
    
  </div>
</div>


<style>
	#uni_modal .modal-footer{
		display:none;
	}
</style>

<script>
	$('#new_account').click(function(){
		uni_modal("Create an Account",'signup.php?redirect=index.php?page=checkout')
	})
	$('#login-frm').submit(function(e){
		e.preventDefault()
		start_load()
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'admin/ajax.php?action=login2',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		end_load()

			},
			success:function(resp){
				if(resp == 1){
					$('#login-form').prepend('<div class="alert alert-success">Login successfully!</div>')

					location.href ='<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
					$('#login-form').prepend('<div class="alert alert-success">Login successful!</div>')

				}else{
					$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
		end_load()
				}
			}
		})
	})
</script>