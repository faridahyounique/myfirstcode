<?php 
    require 'manage_session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'navigation/nav2.php';?>
    <div class="container_fluid">
        <div class="container">
            <h5>Welcome, <span class="text-danger"><?php echo $full_name;?></span></h5>
            <div class="row">
                <div class="col-sm-2">
                    <div class="btn-group-vertical w-100">
                        <a href=""><button style="width:180px" class="btn btn-secondary mb-2 active">Dashboard</button></a>
                        <a href=""><button style="width:180px" class="btn btn-secondary mb-2">Profile</button></a>
                        <a href=""><button style="width:180px" class="btn btn-secondary mb-2">Message</button></a>
                        <a href=""><button style="width:180px" class="btn btn-danger">Logout</button></a>
                    </div>
                </div>
                <div class="col-sm-9 rounded" style="margin-left:10px; background-color: #f2f2f2;">
                    <div id="accordion">
                        <div class="card mt-1 mb-2 bg-white">
                            <a class="card-header" data-bs-toggle="collapse" href="#collapseOne" style="text-decoration: none;">
                                <h6>Application Status</h6>
                            </a>
                            <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <?php if($status=='Accepted'):?>
                                        <span class="badge bg-success"><?=$status;?></span>
                                    <?php endif?>
                                    <?php if($status=='Pending'):?>
                                        <span class="badge bg-primary"><?=$status;?></span>
                                    <?php endif?>
                                    <?php if($status=='Rejected'):?>
                                        <span class="badge bg-danger"><?=$status;?></span>
                                    <?php endif?>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div id="accordion">
                        <div class="card mt-1 mb-2 bg-white">
                            <a class="card-header" data-bs-toggle="collapse" href="#collapsetwo" style="text-decoration: none;">
                                <h6>Remarks</h6>
                            </a>
                            <div id="collapsetwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="badge bg-secondary">
                                        Remarks ...
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>      
                    <div id="accordion">
                        <div class="card mt-1 mb-2 bg-white">
                            <a class="card-header" data-bs-toggle="collapse" href="#collapsetwo" style="text-decoration: none;">
                                <h6>Announcement</h6>
                            </a>
                            <div id="collapsetwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <span class="badge bg-info">
                                        Announcement contents will be here
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    
    <!-- <a href="logout.php"><button type="button" class="btn btn-info">Logout</button></a> -->
    <!-- <center><img class="rounded-circle" src="passport_uploaded/<?=$profile_image?>" width="100px" height="100px"></center>

    <H4>Your Application Status is: <span class="text-primary"><?=$status;?></span></H4> -->
</body>
</html>
