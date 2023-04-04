<?php 
include 'admin/db_connect.php'; 
?>
<style>
    #cat-list li{
        cursor: pointer;
    }
       #cat-list li:hover {
        color: black;
        background: #007bff8f;
    }
    .prod-item p{
        margin: unset;
    }
    .bid-tag {
    position: absolute;
    right: .5em;
}
    .fr-wrapper {
        color:black;
        background: #ffffff08;
        padding: 1em 1.5em;
        border-radius:5px;
    }
    .fr-wrapper td,.fr-wrapper th{
        color:white;
    } 
    table.dataTable tbody tr {
      background-color: unset;
    }
    table.dataTable tbody tr:hover {
      background-color: white;
    }
    div#complaint-tbl_wrapper *{
      color: black;
    }
    table.dataTable tbody tr:hover td {
      color: black !important;
    }
    select[name="complaint-tbl_length"], select[name="complaint-tbl_length"] option{
      color: black !important;
    }
    .paginate_button{
      color: black !important;
    }
    div#complaint-tbl_filter input {
      color: black !important;
    }
</style>
<div class="container">
    <div class="col-lg-12 fr-wrapper" id="">
      <table class="table table-bordered table-hover" id="complaint-tbl">
        <thead>
          <tr>
            <th width="20%">Date</th>
            <th width="30%">Report</th>
            <th width="30%">Incident Address</th>
            <th width="10%">Status</th>
            <th width="10%">Remarks</th>

          
   
          </tr>
        </thead>
        <tbody>
          <?php
          $status = array("","Pending","Received","Action Made");
          $qry = $conn->query("SELECT c.*, ca.remarks
          FROM complaints c
          LEFT JOIN complaints_action ca ON c.id = ca.complaint_id
          WHERE c.complainant_id = {$_SESSION['login_id']}
          ORDER BY UNIX_TIMESTAMP(c.date_created) DESC
          ");
          // $qry = $conn->query("SELECT c.message, c.address, c.status, c.date_created, ca.remarks FROM complaints c INNER JOIN ca complaints_action ON (c.id = ca.complaint_id) WHERE ca.complainant_id = {$_SESSION['login_id']} order by unix_timestamp(date_created) desc ");
          while($row = $qry->fetch_array()):
          ?>
          <tr>
            <td><?php echo date('M d, Y h:i A',strtotime($row['date_created'])) ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td><?php echo $status[$row['status']] ?></td>
            <td><?php echo $row['remarks'] ?></td>


          </tr>
        <?php endwhile; ?>

        
        </tbody>
      </table>
    </div>
</div>
       
<script>
    $('#complaint-tbl').dataTable();
</script>