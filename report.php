<?php 
    include 'config/database_connect.php';
    require 'manage_session.php';
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
</head>
<body>
    <?php include 'navigation/nav2.php';?>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb text-danger font-weight-bold" style="float:right;">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Report</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 offset-3"><br>
                    <center><h5 class="text-danger">Application Report Generator</h5></center>
                    <form action="" method="POST">
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label for="">Surname</label>
                            </div>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="surname">
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Qualification</label>
                            </div>
                            <div class="col-sm-7">
                                <select id="qualification" class="form-control" name="qualification"  onchange="other_qualification()">
                                    <option value="">Choose..</option>
                                    <option value="Primary School Certificate">Primary School Certificate</option>
                                    <option value="SSCE">SSCE</option>
                                    <option value="ND">ND</option>
                                    <option value="NCE">NCE</option>
                                    <option value="HND">HND</option>
                                    <option value="B.Sc./B.Ed./B.Tech">B.Sc./B.Ed./B.Tech</option>
                                    <option value="M.Sc./M.Ed./M.Tech">M.Sc./M.Ed./M.Tech</option>
                                    <option value="Ph.D">Ph.D</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Local Government</label>
                            </div>
                            <div class="col-sm-7">
                                <select id="lga" class="form-control" name="lga">
                                    <option value="">LGA</option>
                                        <option>
                                            <?php
                                                $sql = "SELECT * FROM local_governments WHERE state_name = 'Ekiti' ORDER BY name ASC";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                    while($row = $result->fetch_assoc()) {?>
                                                    <option value="<?php echo $row['name'];?>" ><?php echo $row['name'];?></option>
                                            <?php
                                                }
                                                }
                                            ?>
                                        </option>
                                    </select>
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Hometown</label>
                            </div>
                            <div class="col-sm-7">
                                <input class="form-control" type="text" name="hometown">
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Have A Laptop?</label>
                            </div>
                            <div class="col-sm-7">
                                <select id="qualification" class="form-control" name="laptop">
                                    <option value="">Choose..</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Area of Interest</label>
                            </div>
                            <div class="col-sm-7">
                                <select id="interest" class="form-control" name="interest">
                                    <option value="">Choose..</option>
                                    <option>Data Analysis</option>
                                    <option>Mobile App Development</option>
                                    <option>Web App Development</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Gender</label>
                            </div>
                            <div class="col-sm-7">
                                <label class="btn" data-toggle-class="btn-info" data-toggle-passive-class="btn-default">
                                      <input type="radio" name="gender" value="Male" class="join-btn"> &nbsp; Male &nbsp;
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="btn" data-toggle-class="btn-info" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" value="Female" class="join-btn"> Female
                                </label>
                            </div>
                        </div>
                        <div class="row form-group mt-2">
                            <div class="col-sm-4">
                                <label for="">Applicant Status</label>
                            </div>
                            <div class="col-sm-7">
                                <select id="status" class="form-control" name="status">
                                    <option value="">Choose..</option>
                                    <option>Accepted</option>
                                    <option>Pending</option>
                                    <option>Rejected</option>
                                    <option>All</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <center><button class="btn btn-primary btn-block w-100" type="submit" name="filter_report">Search</button></center>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                    if(isset($_POST['filter_report']))
                    {
                        $WhereClause = "";
                        $title="List Of Applicant ";
                        $SQL_stm = "SELECT * FROM applicant_profile WHERE";
                        if(isset($_POST['surname']) && $_POST['surname'] != '')
                        {
                            $surname = $_POST['surname'];
                            $WhereClause = $WhereClause." surName = '$surname'";
                            $title = $title . "With Surname:".$surname;
                        
                        }
                        if(isset($_POST['qualification']) && $_POST['qualification'] != '')
                        {
                            if(empty($WhereClause)){
                                $qualification = $_POST['qualification'];
                                $WhereClause = $WhereClause." qualification= '$qualification'";
                                $title = $title . "With Qualification:".$qualification;
                            } else{
                                $qualification = $_POST['qualification'];
                                $WhereClause = $WhereClause." AND qualification= '$qualification'";
                                $title = $title . " and Qualification:".$qualification;;
                            } 
                        }
                        if(isset($_POST['status']) && $_POST['status'] != '')
                        {
                            if(empty($WhereClause)){
                                $status = $_POST['status'];
                                $WhereClause = $WhereClause." application_status= '$status'";
                                $title = $title . "With Application Status:".$status;
                            } else{
                                $status = $_POST['status'];
                                $WhereClause = $WhereClause." AND application_status= '$status'";
                                $title = $title . " and Status:".$status;;
                            } 
                        }
                        if(isset($_POST['lga']) && $_POST['lga'] != '')
                        {
                            $lga = $_POST['lga'];
                            if(empty($WhereClause)){
                                $WhereClause = $WhereClause." lga= '$lga'";
                                $title = $title . "from:".$lga." LGA";
                            } else{
                                $WhereClause = $WhereClause." AND lga= '$lga'";
                                $title = $title . " and from:".$lga." LGA";
                            } 
                        }
                        
                        ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Image</th>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Phone Number</th>
                                    <th>Details</th>
                                </tr>
                                <tr>
                                    <th colspan="7"><?php echo $title;?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $SQL_stm = $SQL_stm.$WhereClause;
                                    // echo $SQL_stm;
                                    // die();
                                    if($result= $conn->query($SQL_stm))
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
                                                <img class="rounded-circle" src="passport_uploaded/<?=$image;?>" width="30px" height="30px"></td>
                                            <?php endif; ?>
                                            <?php if($image ==''):?>
                                                <img class="rounded-circle" src="passport_uploaded/alternative.png" width="30px" height="30px"></td>
                                            <?php endif; ?>
                                        <td><?=$row['surName'];?></td>
                                        <td><?=$row['firstName'];?></td>
                                        <td><?=$row['middleName'];?></td>
                                        <td><?=$row['phoneNumber'];?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><button class="btn btn-info bg-info mb-1 dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal-<?=$id?>">Details</button></a></li>
                                                    <li><button class="btn btn-success bg-info mt-1 mb-1 dropdown-item">Aprrove</button></a></li>
                                                    <li><button class="btn btn-danger bg-danger mt-1 dropdown-item">Disapprove</button></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>  
                                        <?php }
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php }
                ?>
            </div>
        </div>
    </div>
</body>
</html>