<?php 
    include 'config/database_connect.php';
    require 'manage_session.php';
    if(isset($_GET['accept'])){
        $applicantId = $_GET['accept'];
        $sql= "UPDATE applicant_profile SET application_status= 'Accepted' WHERE applicant_id ='$applicantId'";
        if($result = $conn->query($sql)){
            $_SESSION['message'] = "Applicant has been accepted";
            $_SESSION['msg_type'] = "success";
            header('applicants.php');
        }
        else{
            $_SESSION['message'] = "Applicant can not be accepted".$conn->error;
            $_SESSION['msg_type'] = "danger";
            header('applicants.php');
        }
    }
    if(isset($_GET['reject'])){
        $applicantId = $_GET['reject'];
        $sql= "UPDATE applicant_profile SET application_status= 'Rejected' WHERE applicant_id ='$applicantId'";
        if($result = $conn->query($sql)){
            $_SESSION['message'] = "Applicant has been rejected";
            $_SESSION['msg_type'] = "warning";
            header('applicants.php');
        }
        else{
            $_SESSION['message'] = "Applicant can not be accepted".$conn->error;
            $_SESSION['msg_type'] = "danger";
            header('applicants.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include 'navigation/nav2.php';?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb text-danger font-weight-bold" style="float:right;">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Applicants</li>
        </ol>
    </nav>
        <?php if(isset($_SESSION['message'])): ?>
            <div class="w-100 sufee-alert alert with-close alert-<?=$_SESSION['msg_type']?> alert-dismissible fade show">
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
        <?php endif ?>
    <div class="container_fluid">
        <div class="container">
            <div>
                <h4>List of Applicants</h4>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Surname</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM applicant_profile WHERE application_status='Pending' ORDER BY surName ASC";
                            if($result= $conn->query($sql))
                            {
                                $i=0;
                                while($row = $result->fetch_assoc())
                                {
                                    //$i+=1;
                                    $i++;
                                    $id =$row['applicant_id'];
                                    $image = $row['passport_image'];
                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php if($image !=''):?>
                                                <img class="rounded-circle" src="passport_uploaded/<?=$image;?>" width="50px" height="50px"></td>
                                            <?php endif; ?>
                                            <?php if($image ==''):?>
                                                <img class="rounded-circle" src="passport_uploaded/alternative.png" width="50px" height="50px"></td>
                                            <?php endif; ?>
                                        <td><?=$row['surName'];?></td>
                                        <td><?=$row['firstName'];?></td>
                                        <td><?=$row['middleName'];?></td>
                                        <td><?=$row['phoneNumber'];?></td>
                                        <?php 
                                            if($row['application_status']=='Accepted'){?>
                                                <td class="badge bg-success mt-3 ml-2 text-light"><?=$row['application_status'];?></td>
                                        <?php }
                                        ?>
                                        <?php 
                                            if($row['application_status']=='Rejected'){?>
                                                <td class="badge bg-danger mt-3 ml-2 text-light"><?=$row['application_status'];?></td>
                                        <?php }
                                        ?>
                                        <?php 
                                            if($row['application_status']=='Pending'){?>
                                                <td class="badge bg-primary mt-3 ml-2 text-light"><?=$row['application_status'];?></td>
                                        <?php }
                                        ?>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><button class="btn btn-info bg-info mb-1 dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal-<?=$id?>">Details</button></a></li>
                                                    <li><a href="applicants.php?accept=<?=$id;?>"><button class="btn btn-success bg-info mt-1 mb-1 dropdown-item" name="accept">Accept</button></a></li>
                                                    <li><a href="applicants.php?reject=<?=$id;?>"><button class="btn btn-danger bg-danger mt-1 mb-1 dropdown-item" name="reject">Reject</button></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>  
                                    <!-- Modal -->
                            <div class="modal fade" id="exampleModal-<?=$id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h6 class="modal-title" id="exampleModalLabel">Applicant Details</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <style>
                                        label{
                                            color:red;
                                            font-weight: bold;
                                            font-size: 9px;
                                        }
                                    </style>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6"><label>Surname</label></div>
                                                <div class="col-sm-6" style="font-size: 9px;"><?=$row['surName']?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6"><label>First Name</label></div>
                                                <div class="col-sm-6" style="font-size: 9px;"><?=$row['firstName']?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6"><label>Middle Name</label></div>
                                                <div class="col-sm-6" style="font-size: 9px;"><?=$row['middleName']?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6"><label>Gender</label></div>
                                                <div class="col-sm-6" style="font-size: 9px;"><?=$row['gender']?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6"><label>Phone Number</label></div>
                                                <div class="col-sm-6" style="font-size: 9px;"><?=$row['phoneNumber']?></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6" style="font-size: 9px;"><label>Email Address</label></div>
                                                <div class="col-sm-6" style="font-size: 9px;"><?=$row['emailAddress']?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                                </div>
                            </div>
                            </div>     
                        <?php        }
                            }
                            else{
                                echo "SQL Error" .$conn_error;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
