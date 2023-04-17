<?php
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

<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    top: 0;
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> 
<!DOCTYPE html>
<html>
<head>
	<title>Total Number of Users</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
<body>
<?php
// Set database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'newdb';

// Connect to database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to count the number of users
$sql = "SELECT COUNT(*) AS num_users FROM users";
$result = mysqli_query($conn, $sql);

// Fetch the result
$row = mysqli_fetch_assoc($result);
$num_users = $row['num_users'];

// Query to count the number of verified complainants
$sql_complainants = "SELECT COUNT(id) AS num_complainants_verified FROM complainants WHERE status =1";
$result_complainants_verified = mysqli_query($conn, $sql_complainants);

// Fetch the result
$row_complainants = mysqli_fetch_assoc($result_complainants_verified);
$num_complainants_verified = $row_complainants['num_complainants_verified'];

// Query to count the number of unverified complainants
$sql_complainants = "SELECT COUNT(id) AS num_complainants_unverified FROM complainants WHERE status =0";
$result_complainants_unverified = mysqli_query($conn, $sql_complainants);

// Fetch the result
$row_complainants = mysqli_fetch_assoc($result_complainants_unverified);
$num_complainants_unverified = $row_complainants['num_complainants_unverified'];

// Query to count the number of responders
$sql_responders = "SELECT COUNT(id) AS num_responders FROM responders_team";
$result_num_responders = mysqli_query($conn, $sql_responders);

// Fetch the result
$row_responders = mysqli_fetch_assoc($result_num_responders);
$num_num_responders = $row_responders['num_responders'];

// Query to count the number of outposts
$sql_outposts = "SELECT COUNT(id) AS num_outposts FROM stations";
$result_num_outposts = mysqli_query($conn, $sql_outposts);

// Fetch the result
$row_outposts = mysqli_fetch_assoc($result_num_outposts);
$num_num_outposts= $row_outposts['num_outposts'];

// Query to count the number of complaints
$sql_complaints = "SELECT COUNT(*) AS num_complaints FROM complaints ";
$result_complaints = mysqli_query($conn, $sql_complaints);

// Fetch the result
$row_complaints = mysqli_fetch_assoc($result_complaints);
$num_complaints = $row_complaints['num_complaints'];

// Query to count the number of pending complaints
$sql_complaints = "SELECT COUNT(*) AS num_complaints_pending FROM complaints WHERE status = 1 ";
$result_complaints_pending = mysqli_query($conn, $sql_complaints);

// Fetch the result
$row_complaints = mysqli_fetch_assoc($result_complaints_pending);
$num_complaints_pending = $row_complaints['num_complaints_pending'];

// Query to count the number of received complaints
$sql_complaints = "SELECT COUNT(*) AS num_complaints_received FROM complaints WHERE status = 2 ";
$result_complaints_received = mysqli_query($conn, $sql_complaints);

// Fetch the result
$row_complaints = mysqli_fetch_assoc($result_complaints_received);
$num_complaints_received = $row_complaints['num_complaints_received'];

// Query to count the number of done complaints
$sql_complaints = "SELECT COUNT(*) AS num_complaints_done FROM complaints WHERE status = 3 ";
$result_complaints_done = mysqli_query($conn, $sql_complaints);

// Fetch the result
$row_complaints = mysqli_fetch_assoc($result_complaints_done);
$num_complaints_done = $row_complaints['num_complaints_done'];

// Close the database connection
mysqli_close($conn);
?>


<div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                   <p style="font-size:30px; font-family: impact; "> <?php echo "Welcome back, ". $_SESSION['login_name']."!"  ?></p>
                    <hr>
       
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
		}
		.container {
			display: flex;
			flex-direction: row;
			justify-content: center;
			align-items: center;
			margin-top: 20px;
		}
		.card {
			background-color: #f8f8f8;
			padding: 20px;
			margin: 0 10px;
			border-radius: 10px;
			box-shadow: 0px 2px 6px rgba(0,0,0,0.5);
		}
        .cards {
			background-color: khaki;
			padding: 20px;
			margin: 0 10px;
			border-radius: 20px;
			box-shadow: 1px 4px 6px rgba(0,0,0,1);
            
		}
        .cardss {
			background-color: #999;
			padding: 20px;
			margin: 0 10px;
			border-radius: 20px;
			box-shadow: 1px 4px 6px rgba(0,0,0,1);
            
		}
      
		.card h2 {
			margin-top: 0;
			margin-bottom: 10px;
			font-size: 36px;
			text-align: center;
			color: #333;
		}
        .card h1 {
			margin-top: 0;
			margin-bottom: 10px;
			font-size: 36px;
			text-align: center;
			color: #333;
		}
		.card p {
			margin-top: 0;
			margin-bottom: 10px;
			font-size: 18px;
			text-align: center;
			color: #333;
		}
        .clock, .date {
			text-align: center;
			font-size: 30px;
			color: #888;
		}
		


	</style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css"> 
</head>
<body onload="showTime(); showDate()">
	<div class="clock" id="clock"></div>
    <div class="date" id="date"></div>
	<div class="container">
		<div class="cards">
			<h1> <i class="fa-solid fa-dinosaur"><?php echo $num_users; ?></i></h1>
			<p>Number of Users</p>
		</div>
		<div class="cards">
			<h1><?php echo $num_complainants_verified; ?></h1>
			<p>Verified Complainants</p>
		</div>
        <div class="cards">
			<h1><?php echo $num_complainants_unverified; ?></h1>
			<p>Unverified Complainants</p>
		</div>
        <div class="cards">
			<h1><?php echo $num_num_responders; ?></h1>
			<p>Responders</p>
		</div>
        <div class="cards">
			<h1><?php echo $num_num_outposts ?></h1>
			<p>Outposts</p>
		</div>
	</div>
    <hr>
    <div class="container">
	<div class="cards"  style = "background-color: lightblue;">
			<h2><?php echo $num_complaints; ?></h2>
			<p>Number of Complaints</p>
		</div>
        <div class="cards" style = "background-color: red;">
			<h2><?php echo $num_complaints_pending; ?></h2>
			<p>Pending</p>
		</div>
        <div class="cards"  style = "background-color: yellow;">
			<h2><?php echo $num_complaints_received; ?></h2>
			<p>Received</p>
		</div>
        <div class="cards"  style = "background-color: lightgreen;">
			<h2><?php echo $num_complaints_done; ?></h2>
			<p>Action Done</p>
		</div>
	</div>
    <hr>


    <div class="container" height=500px;>
    <div class="cardss"> 
    <?php
//connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'newdb';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
//query the database to get the number of streets grouped by city
$sql = "SELECT street, COUNT(street) as total_streets FROM complaints GROUP BY street";
$result = mysqli_query($conn, $sql);

//create the pie chart data
$data = "['City', 'Number of Streets'],";
while($row = mysqli_fetch_assoc($result)) {
  $data .= "['".$row['street']."', ".$row['total_streets']."],";
}
$data = rtrim($data, ",");

//create the pie chart using Google Charts API
echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
echo "<script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ".$data."
        ]);
        var options = {
          title: 'Frequently Reported Streets',
          pieHole: 0.2,
          is3D: true,
          titleFontSize:20,
          legendFontSize:14,
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>";

echo "<div id='chart_div' style='width: 500px; height: 320px;'></div>";

?>
</div>

<div class="cardss"> 
<?php
//connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'newdb';

//query the database to get the number of reports
$sql2 = "SELECT reports, COUNT(reports) as total_reports FROM complaints GROUP BY reports";
$result = mysqli_query($conn, $sql2);

//create the pie chart data
$datas = "['Reports', 'Number of Reports'],";
while($row = mysqli_fetch_assoc($result)) {
  $datas .= "['".$row['reports']."', ".$row['total_reports']."],";
}
$datas = rtrim($datas, ",");

//create the pie chart using Google Charts API
echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
echo "<script type='text/javascript'>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ".$datas."
        ]);
        var options = {
          title: 'Frequently Reported Concerns',
          pieHole: 0.1,
          is3D: true,
          titleFontSize:20,
          legendFontSize:14,
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart_divs'));
        chart.draw(data, options);
      }
</script>";
echo "<div id='chart_divs' style='width: 500px; height: 320px;' ></div>";

?>
</div>
</div>

</body>
</html>
                </div>
            </div>     	
        </div>
    </div>









</div>
<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }

    function showTime() {
			var date = new Date();
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var seconds = date.getSeconds();
			var ampm = hours >= 12 ? 'PM' : 'AM';
			hours = hours % 12;
			hours = hours ? hours : 12;
			minutes = minutes < 10 ? '0' + minutes : minutes;
			seconds = seconds < 10 ? '0' + seconds : seconds;
			var time = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
			document.getElementById('clock').innerHTML = time;
			setTimeout(showTime, 1000);
		}
        function showDate() {
			var date = new Date();
			var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
			var day = days[date.getDay()];
			var month = date.getMonth() + 1;
			var dayOfMonth = date.getDate();
			var year = date.getFullYear();
			var dateString = day + ', ' + month + '/' + dayOfMonth + '/' + year;
			document.getElementById('date').innerHTML = dateString;
		}
</script>