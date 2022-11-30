<?php 
    require 'manage_session.php';
    //Total applicant
    $all= "SELECT COUNT(*) as total_applicant FROM applicant_profile";
    $result= $conn->query($all);
    $row = $result->fetch_assoc();
    $total = $row['total_applicant'];
    //Pending applicants
    $pending = "SELECT COUNT(*) as pending_applicant FROM applicant_profile WHERE application_status = 'Pending'";
    $result= $conn->query($pending);
    $row1 = $result->fetch_assoc();
    $pend = $row1['pending_applicant'];
    //Approved applicants
    $approve = "SELECT COUNT(*) as approved_applicant FROM applicant_profile WHERE application_status = 'Accepted'";
    $result= $conn->query($approve);
    $row2 = $result->fetch_assoc();
    $approve = $row2['approved_applicant'];
    //Rejected applicants
    $reject = "SELECT COUNT(*) as rejected_applicant FROM applicant_profile WHERE application_status = 'Rejected'";
    $result= $conn->query($reject);
    $row3 = $result->fetch_assoc();
    $rej = $row3['rejected_applicant'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body style="background-color: #f2f2f2;">
    <?php include 'navigation/nav2.php';?>
    <div class="container_fluid">
        <div class="container">
            <h4 class="mt-5 mb-5">Welcome, <?php echo $full_name;?></h4>
            <div class="row mt-2" style="margin-left: 20px;">
                <div class="col-sm-3 card mt-2">
                    <div class="card-body">
                        <h5 class="card-title bg-info text-light rounded w-100" style="text-align: center;">Applicants</h5>
                        <p class="card-text text-info">
                            Total Number <span class="badge bg-info rounded-circle" style="font-size:20px"><?php echo $total; ?></span>
                        </p>
                        <div class="card-link bg-dark rounded" style="text-align: center;">
                            <a class="text-light" href="all_applicants.php" style="text-decoration: none;">View</a>
                        </div>
                        
                        <!-- <a href="#" class="card-link"></a> -->
                    </div>
                    
                </div>
                <div class="col-sm-3 card mt-2">
                    <div class="card-body">
                        <h5 class="card-title bg-primary text-light rounded w-100" style="text-align: center;">Pending</h5>
                        <p class="card-text text-primary">
                            Total Number <span class="badge bg-primary rounded-circle" style="font-size:20px"><?php echo $pend; ?></span>
                        </p>
                        <div class="card-link bg-dark rounded" style="text-align: center;">
                            <a class="text-light" href="pending_applicants.php" style="text-decoration: none;">View</a>
                        </div>
                        
                        <!-- <a href="#" class="card-link"></a> -->
                    </div>
                    
                </div>
                <div class="col-sm-3 card mt-2">
                    <div class="card-body">
                        <h4 class="card-title bg-success text-light rounded w-100" style="text-align: center;">Approved</h4>
                        <p class="card-text text-success">
                        Total Number <span class="badge bg-success rounded-circle" style="font-size:20px"><?php echo $approve; ?></span>
                        </p>
                        <div class="card-link bg-dark rounded" style="text-align: center;">
                            <a class="text-light" href="accepted_applicants.php" style="text-decoration: none;">View</a>
                        </div>
                        
                        <!-- <a href="#" class="card-link"></a> -->
                    </div>
                    
                </div>
                <div class="col-sm-3 card mt-2">
                    <div class="card-body">
                        <h5 class="card-title bg-danger text-light rounded w-100" style="text-align: center;">Rejected</h5>
                        <p class="card-text text-danger">
                        Total Number <span class="badge bg-danger rounded-circle" style="font-size:20px"><?php echo $rej; ?></span>
                        </p>
                        <div class="card-link bg-dark rounded" style="text-align: center;">
                            <a class="text-light" href="rejected_applicants.php" style="text-decoration: none;">View</a>
                        </div>
                        
                        <!-- <a href="#" class="card-link"></a> -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>Welcome <?php echo $full_name;?></h1><br>
    <a href="logout.php"><button type="button" class="btn btn-info">Logout</button></a>
    <img class="rounded-circle" src="passport_uploaded/<?=$profile_image?>" width="400px" height="400px"> -->
</body>
</html>
