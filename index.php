<?php date_default_timezone_set("Etc/GMT+8");?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>loanMate System</title>

    <link href="css/all.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet"> <!-- Link to custom CSS file -->

    <style>
        body {
            background-image: url('image/mainbg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        .card {
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.8);
            width: 1000px; /* Set the desired width */
            height: 500px; /* Set the desired height */
            margin: auto; /* Center the card horizontally */
            
            
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .navbar-brand img {
            max-height: 35px; /* Adjust this value as needed */
            margin-right: 2px;
        }

    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0070ff;">
        <a class="navbar-brand" href="#">
            <img src="image/logo.png" alt="Logo"> <!-- Logo image -->
             
        </a>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="image/back2.png" class="img-fluid" alt="Background Image"/></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Administrator Login</h1>
                                    </div>
                                    <form method="POST" class="user" action="login.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Username here..." required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Password here..." required="required">
                                        </div>
                                        <?php 
                                            session_start();
                                            if(ISSET($_SESSION['message'])){
                                                echo "<center><label class='text-danger'>".$_SESSION['message']."</label></center>";
                                            }
                                        ?>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">Login</button>
                                    </form>
                                    <div class="mt-3 text-center">
                                    <a href="user_login.php" class="">login user account here.</a>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar fixed-bottom navbar-dark" style="background-color: #244edb;">
        <div class="container">
            <span class="navbar-text" style="color:#ffffff;">
                 @LoanMateSystem. All Rights Reserved <?php echo date("Y")?>
            </span>
        </div>
    </nav>
</body>

</html>