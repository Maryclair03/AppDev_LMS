<?php
date_default_timezone_set("Etc/GMT+8");
    require_once'session2.php';
	require_once'class.php';
	$db=new db_class(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Borrowers Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/all.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">


    

</head>

<body style="background-image: url('image/back2.png'); background-color:rgba(4, 4, 10, 0.493);
; background-blend-mode: multiply;">
<!-- <body style="background: url('image/mainbg.jpg')"> -->


<!-- <nav class="navbar bg-body-tertiary">
  <div class="container-md">
    <a class="navbar-brand">
        <img src="image/logo2.png" alt="logo"  height="50rem">
    </a>
    <form class="d-flex" role="search">
      
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav> -->

                <nav class="navbar bg-body-tertiary navbar-expand mb-4 fixed-top shadow" style="background-color: #ffffff;">
                    <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="image/logo2.png" alt="Logo" height="50rem"> <!-- Logo image -->
                    </a>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
	
                   
					<!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $db->user_account($_SESSION['borrower_id'])?></span>
                                <img class="img-profile rounded-circle"
                                    src="image/admin_profile.svg" height="30rem">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    </div>

                </nav>

                 <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-danger">
                                <h5 class="modal-title text-white">System Information</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Are you sure you want to logout?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="container-md" style="margin-block: 7rem;">
                <div class="card">
                    <div class="card-header text-bg-primary h4 p-4 text-center">
                        Borrower's Personal Info
                    </div>
                    <div class="card-body bg-light text-dark px-3">
                        <div class="row mb-5">
                            <div class="col-lg-6 col-md-12">
                             <h5 class="card-title fw-bold list-group-item text-bg-secondary rounded-2">Profile</h5>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-11">
                                    <?php
											$tbl_loan=$db->display_loan();
											$i=1;
											while($fetch=$tbl_loan->fetch_array()){
										?>
										
                                    <p class="card-text">Name: <strong><?php echo $fetch['lastname'].", ".$fetch['firstname']." ".substr($fetch['middlename'], 0, 1)."."?></strong></small></p>
                                    <p class="card-text">Contact: <strong><?php echo $fetch['contact_no']?></strong></small></p>
                                    <p class="card-text">Address: <strong><?php echo $fetch['address']?></strong></small></p>

                                    
                                         
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                             <h5 class="card-title fw-bold list-group-item text-bg-secondary rounded-2">Loan Detail</h5>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-11">
                                        <p class="card-text">Referrence no: <strong><?php echo $fetch['ref_no']?></strong></small></p>
                                        <p class="card-text">Loan Type: <strong><?php echo $fetch['ltype_name']?></strong></small></p>
                                        <p class="card-text">Loan Plan: <strong><?php echo $fetch['lplan_month']." months[".$fetch['lplan_interest']."%, ".$fetch['lplan_penalty']."%]"?></strong> interest, penalty</small></p>
												<?php
													$monthly =($fetch['amount'] + ($fetch['amount'] * ($fetch['lplan_interest']/100))) / $fetch['lplan_month'];
													$penalty=$monthly * ($fetch['lplan_penalty']/100);
													$totalAmount=$fetch['amount']+$monthly;
												?>
                                        <p class="card-text">Amount: <strong><?php echo "&#8369; ".number_format($fetch['amount'], 2)?></strong></small></p>   
                                        <p class="card-text">Total Payable Amount: <strong><?php echo "&#8369; ".number_format($totalAmount, 2)?></strong></small></p>   
                                        <p class="card-text">Monthly Payable Amount: <strong><?php echo "&#8369; ".number_format($monthly, 2)?></strong></small></p> 
                                        <p class="card-text">Overdue Payable Amount: <strong><?php echo "&#8369; ".number_format($penalty, 2)?></strong></small></p>
												<?php
													if (preg_match('/[1-9]/', $fetch['date_released'])){ 
														echo '<p><small>Date Released: <strong>'.date("M d, Y", strtotime($fetch['date_released'])).'</strong></small></p>';
													}
												?>
                                                
                                    </div>
                                </div>
                                   
                            </div>
                            
                        </div>
                        <div class="row">
                            

                            <div class="col-lg-6 col-md-12">
                                <h5 class="card-title fw-bold list-group-item text-bg-secondary rounded-2">Payment Detail</h5>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-11">
                                        <?php
													$payment=$db->conn->query("SELECT * FROM `payment` WHERE `loan_id`='$fetch[loan_id]'") or die($this->conn->error);
													$paid = $payment->num_rows;
													$offset = $paid > 0 ? " offset $paid ": "";
													
													
													if($fetch['status'] == 2){
														$next = $db->conn->query("SELECT * FROM `loan_schedule` WHERE `loan_id`='$fetch[loan_id]' ORDER BY date(due_date) ASC limit 1 $offset ")->fetch_assoc()['due_date'];
														$add = (date('Ymd',strtotime($next)) < date("Ymd") ) ?  $penalty : 0;
														echo "<p><small>Next Payment Date: <br /><strong>".date('F d, Y',strtotime($next))."</strong></small></p>";
														echo "<p><small>Montly Amount: <br /><strong>&#8369; ".number_format($monthly, 2)."</strong></small></p>";
														echo "<p><small>Penalty: <br /><strong>&#8369; ".$add."</strong></small></p>";
														echo "<p><small>Payable Amount: <br /><strong>&#8369; ".number_format($monthly+$add, 2)."</strong></small></p>";
													}
												?>
                                        </div>
                                    </div>
                             
                            </div>
                            
                            <div class="col-lg-6 col-md-12">
                                <h5 class="card-title fw-bold list-group-item text-bg-secondary rounded-2">Status</h5>
                                    
                                    <div class="row d-flex justify-content-center">
                                    <div class="col-sm-11">
                                        
                                        <?php 
													if($fetch['status']==0){
														echo '<span class="card-text text-primary text-uppercase fw-bold">For Approval</span>';
													}else if($fetch['status']==1){
														echo '<span class="card-text text-primary text-uppercase fw-bold">Approved</span>';
													}else if($fetch['status']==2){
														echo '<span class="card-text text-primary text-uppercase fw-bold">Released</span>';
													}else if($fetch['status']==3){
														echo '<span class="card-text text-primary text-uppercase fw-bold">Completed</span>';
													}else if($fetch['status']==4){
														echo '<span class="card-text text-primary text-uppercase fw-bold">Denied</span>';
													}
													
												?>
                                                
                                    </div>
                                </div>
                                     
                            </div>

                        </div>
                        <?php
											}
										?>
                        
                        
                        
                    </div>
                    <tbody>
<div class="card-footer py-4 d-flex justify-content-end">
    <?php
        $tbl_loan = $db->display_loan();
        $i = 1;
        while ($fetch = $tbl_loan->fetch_array()) {
    ?>
    <?php 
        if ($fetch['status'] == 2) {
    ?>
        <button class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#viewSchedule<?php echo $fetch['loan_id']?>">View Payment Schedule and History</button>
    <?php
        } else if ($fetch['status'] == 3) {
    ?>
        <button class="btn btn-lg btn-success" readonly="readonly">COMPLETED</button>
    <?php
        }
    ?>
</div>
</tbody>
<nav class="navbar fixed-bottom navbar-dark" style="background-color: #244edb;">
    <div class="container">
        <span class="navbar-text" style="color:#ffffff;">
        </span>
    </div>
</nav>
<div class="modal fade" id="viewSchedule<?php echo $fetch['loan_id']?>" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog" style="background-color: #244edb;">
        <div class="modal-content" >
            <div class="modal-header" style="background-color: #244edb;" >
                <h5 class="modal-title text-white" >Payment Schedule and History</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 col-xl-5">
                        <p>Reference No:</p>
                        <p><strong><?php echo $fetch['ref_no']?></strong></p>
                    </div>
                    <div class="col-md-7 col-xl-7">
                        <p>Name:</p>
                        <p><strong><?php echo $fetch['firstname']." ".substr($fetch['middlename'], 0, 1).". ".$fetch['lastname']?></strong></p>
                    </div>
                </div>
                <hr />
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"><center>Months</center></div>
                        <div class="col-sm-4"><center>Monthly Payment</center></div>
                        <div class="col-sm-4"><center>Payment Status</center></div>
                    </div>
                    <hr />
                    <?php 
                        $tbl_schedule = $db->conn->query("SELECT * FROM loan_schedule WHERE loan_id='" . $fetch['loan_id'] . "'");
                        
                        while ($row = $tbl_schedule->fetch_array()) {
                            //$payment_status = $row['payment_status'] == 1 ? "Paid" : "Not Paid";
                            $payment_status = isset($row['payment_status']) && $row['payment_status'] == 1 ? "Paid" : "Not Paid";
                    ?>
                    <div class="row">
                        <div class="col-sm-4 p-2 pl-5" style="border-right: 1px solid black; border-bottom: 1px solid black;"><strong><?php echo date("F d, Y", strtotime($row['due_date'])); ?></strong></div>
                        <div class="col-sm-4 p-2 pl-5" style="border-bottom: 1px solid black;"><strong><?php echo "&#8369; ".number_format($monthly, 2); ?></strong></div>
                        <div class="col-sm-4 p-2 pl-5" style="border-bottom: 1px solid black;"><strong><?php echo $payment_status; ?></strong></div>
                    </div>
                    <?php
                        }
                    ?>
                </div>  
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>

                </div>

                </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="js/jquery.easing.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.js"></script>


</body>

</html>