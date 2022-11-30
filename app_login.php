<?php 
    session_start();
    include 'config/database_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- Javascript form validation  -->
    <script src="js/formvalidate.js"></script>
</head>
<body>
    <?php include 'navigation/nav.php';?>
    <div class="container">
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
        <div id="login">
            <center><h5 class="text-success">Login Here</h5></center>
            <div class="col-sm-6" style="margin-left: 200px">
                <form action="register.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Email Address</label>
                        <input type="email" class="form-control" id="" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="" name="userpassword">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </form>
                <p style="text-align: right;">No Account? <a style="text-decoration: none; color:red; font-weight:bolder;" onclick="create_account()">Register Now</a></p>
            </div>
        </div>
        <!-- Registeration form  -->
        <div id="register" style="display: none;">
            <center><h5 class="text-danger">Register Here</h5></center>
            <div class="col-sm-10" style="margin-left: 100px">
                <form name="register" action="register.php" method="POST" onsubmit="return validate_form()" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4 offset-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Passport</label>
                                <input type="file" class="form-control" id="passport" name="passport" aria-describedby="">
                                <span class="text-danger" id="passportErr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" aria-describedby="">
                                <span class="text-danger" id="surnameErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label  class="form-label" style="text-align: left;">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="">
                                <span class="text-danger" id="firstnameErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label  class="form-label" style="text-align: left;">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" aria-describedby="">
                                <span class="text-danger" id="middlenameErr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" style="text-align: left;">Gender</label><br>
                                <label class="btn" data-toggle-class="btn-info" data-toggle-passive-class="btn-default">
                                      <input type="radio" name="gender" value="Male" class="join-btn"> &nbsp; Male &nbsp;
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="btn" data-toggle-class="btn-info" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" value="Female" class="join-btn"> Female
                                </label>
                                <span class="text-danger" id="genderErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="">
                                <span class="text-danger" id="emailErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone" aria-describedby="">
                                <span class="text-danger" id="phoneErr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" style="text-align: left;">Date of Birth</label><br>
                                <input type="date" class="form-control" id="dob" name="dob" aria-describedby="">
                                <span class="text-danger" id="dobErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Marital Status</label>
                                <select id="marital_status" class="form-control" name="marital_status">
                                    <option value="">Choose..</option>
                                    <option>Divorced</option>
                                    <option>Married</option>
                                    <option>Single</option>
                                    <option>Widow</option>
                                    <option>Widower</option>
                                </select>
                                <span class="text-danger" id="marital_statusErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Qualification</label>
                                <input type="text" class="form-control" id="other" name="qualification" placeholder="Enter Your Qualification" aria-describedby="" style="display: none;">
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
                                <span class="text-danger" id="qualificationErr"></span>
                            </div>
                        </div>
                    </div>
                    <fieldset class="fieldset">
                        <legend class="legend" style="font-size: 15px;">Residential Address</legend>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="street" name="street" placeholder="Street" aria-describedby="">
                                    <span class="text-danger" id="streetErr"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="town" name="town" placeholder="Town" aria-describedby="">
                                    <span class="text-danger" id="townErr"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
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
                                    <span class="text-danger" id="lgaErr"></span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row form-group">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label class="form-label" style="text-align: left;">Do You Have A Laptop?</label><br>
                                <label class="btn" data-toggle-class="btn-info" data-toggle-passive-class="btn-default">
                                      <input type="radio" name="laptop" value="Yes" class="join-btn"> &nbsp; Yes &nbsp;
                                </label>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label class="btn" data-toggle-class="btn-info" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="laptop" value="No" class="join-btn"> No
                                </label><br>
                                <span class="text-danger" id="laptopErr"></span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" style="text-align: left;">Area of Interest</label>
                                <select id="interest" class="form-control" name="interest">
                                    <option value="">Choose..</option>
                                    <option>Data Analysis</option>
                                    <option>Mobile App Development</option>
                                    <option>Web App Development</option>
                                </select>
                                <span class="text-danger" id="interestErr"></span>
                            </div>
                        </div>
                    </div>
                   <center> <button type="submit" class="btn btn-primary" name="register">Save</button></center>
                </form>
                <p style="text-align: right;">Have An Account? <a style="text-decoration: none; color:green; font-weight:bolder;" onclick="login()">Login Here</a></p>
            </div>
        </div>
    </div>

    <script>
        function create_account()
        {
           document.getElementById("login").style.display= "none"; 
           document.getElementById("register").style.display="";
        }
        function login()
        {
           document.getElementById("login").style.display= ""; 
           document.getElementById("register").style.display="none";
        }
        function other_qualification()
        {
            var qualification = document.getElementById("qualification").value;
            if(qualification=="Others")
            {
                document.getElementById("qualification").style.display= "none"; 
                document.getElementById("other").style.display="";
            }
        }
    </script>
</body>
</html>