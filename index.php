<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

    ?>
    <style>
      .bg-dark {
          background-color: #ffff !important;
      }
      #main-field{
        margin-top: 5rem!important;
      }
      body * {
        /* font-size: 30px ; */
      }
      .modal-body  {
        color:black;
      }
      .fr-wrapper {
          color:black;
          background: #FFFFFF;
          padding: 1em 1.5em;
          border-radius:10px;
      }

      .masthead{
        background: url('admin/assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>') !important;
       
        background-size: cover !important;
      }
    </style>
    <body id="page-top" class="bg-dark">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="padding: 20px;">
    <div class="container" style="padding: 0 50px;">
        <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['system']['name'] ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0" style="margin-right: 50px;">
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li> -->
                <?php if(isset($_SESSION['login_id'])): ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=complaint_list">My Complaint List</a></li>
                <?php echo "".$_SESSION['login_name'] ?>
                <div class=" dropdown mr-4">
                    <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
                      <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                        <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                        
                        <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                      </div>
                </div>
              <?php else: ?>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" id="report_crime" href="javascript:void(0)">Report Incident</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:void(0)" id="login_now">Resident Login</a>
                        <a class="dropdown-item" href="admin/login.php">Admin Login</a>
                    </div>
                </li>
              <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


  <header class="masthead">
      <div class="container-fluid h-100">
          <div class="row h-100 align-items-center justify-content-center text-center">
              <div class="col-lg-8 align-self-end mb-4 page-title">
            
           
       
              
              
          </div>
      </div>
  </header>
  
  <!-- SAMPLE CONTENT MODULAR HOME -->
  <main id="main-field" class="bg-black">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include $page.'.php';
        ?>
  </main>

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>


  
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>




  <div id="preloader"></div>
        <footer class=" py-5 bg-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0 text-black">Contact us</h2>
                     
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div class="text-danger"><?php echo $_SESSION['system']['contact'] ?></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block text-danger" href="mailto:<?php echo $_SESSION['system']['email'] ?>"><?php echo $_SESSION['system']['email'] ?></a>
                    </div>
                </div>
            </div>
            <br>
            <!-- <div class="container"><div class="small text-center text-muted">Copyright © 2020 - <?php echo $_SESSION['system']['name'] ?> | <a href="https://www.sourcecodester.com/" target="_blank">Sourcecodester</a></div></div> -->
            <div class="container"><div class="small text-center text-muted">Copyright © 2023 - <?php echo $_SESSION['system']['name'] ?></div></div>
           <!-- <br> -->
            <!-- <div class="container"><div class="small text-center text-muted"><a href="admin/login.php" target="_blank">Admin Login</a></div></div> -->

          </footer>
        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#find-car').submit(function(e){
        e.preventDefault()
        location.href = 'index.php?page=search&'+$(this).serialize()
      })
      $('#report_crime').click(function(){
        if('<?php echo !isset($_SESSION['login_id']) ? 1 : 0 ?>'==1){
          uni_modal("Login",'login.php');
          return false;
        }
          uni_modal("Report",'manage_report.php');
      })
      $('#manage_my_account').click(function(){
          uni_modal("Manage Account",'signup.php');
      })
    </script>
    <?php $conn->close() ?>

</html>
