<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    //require 'vendor/autoload.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    session_start();
    include 'config/database_connect.php';
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Registration processing code
    if(isset($_POST['register'])){
      $surName = validate_input($_POST['surname']);
      $firstName = validate_input($_POST['firstname']);
      $middleName = validate_input($_POST['middlename']);
      $gender = validate_input($_POST['gender']);
      $emailAddress = validate_input($_POST['email']);
      $phoneNumber = validate_input($_POST['phone']);
      $dateOfBirth = validate_input($_POST['dob']);
      $maritalStatus = validate_input($_POST['marital_status']);
      $qualification = validate_input($_POST['qualification']);
      $street = validate_input($_POST['street']);
      $town = validate_input($_POST['town']);
      $lga = validate_input($_POST['lga']);
      $laptopStatus = validate_input($_POST['laptop']);
      $areaOfInterest = validate_input($_POST['interest']);
      $password = md5($phoneNumber);

      //Mail body
      $mail_body ='
      <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
        <div style="margin-left:70px">
            <h3>Dear,' .$surName. '</h3>
            This is to inform you that your application for Ekiti ICT Training at Awo-Ekiti has been submitted successfully.
            We will contact you for any development concerning your application.
            Thanks
        </div>
    </body>
    </html>';
     
      //prepare to send into the database
      $surName = mysqli_real_escape_string($conn, $_POST['surname']);
      $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
      $middleName = mysqli_real_escape_string($conn, $_POST['middlename']);
      $gender = mysqli_real_escape_string($conn, $_POST['gender']);
      $emailAddress =mysqli_real_escape_string($conn, $_POST['email']);
      $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone']);
      $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dob']);
      $maritalStatus = mysqli_real_escape_string($conn, $_POST['marital_status']);
      $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
      $street = mysqli_real_escape_string($conn, $_POST['street']);
      $town = mysqli_real_escape_string($conn, $_POST['town']);
      $lga = mysqli_real_escape_string($conn, $_POST['lga']);
      $laptopStatus = mysqli_real_escape_string($conn, $_POST['laptop']);
      $areaOfInterest = mysqli_real_escape_string($conn, $_POST['interest']);
      $passport = $_FILES['passport'];
      $passportname = $_FILES['passport']['name'];
      $passportsize = $_FILES['passport']['size'];
      $passporttype = $_FILES['passport']['type'];
      $passportTmpName = $_FILES['passport']['tmp_name'];
      $passportError = $_FILES['passport']['error'];
      $valid_extension = explode('.',$passportname);
      $passportExtension = strtolower(end($valid_extension));
      $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');
      if(in_array($passportExtension, $allowed))
      {
        if($passportsize<3145728)
        {
            $passportNewName = uniqid(",true").".".$passportExtension;
            $passportDestination = 'passport_uploaded/'.$passportNewName;
            move_uploaded_file($passportTmpName, $passportDestination);
        }
        else{
            echo "Image size is too big, please upload a file less 3M";
        }
      }
      else{
        echo "Image format/extension not allowed";
      }
      $applicationstatus =  'Pending';
      //echo $passportNewName;
      //die();
      //Check if email already exist
        // $sql_email = "SELECT emailAddress FROM applicant_profile WHERE emailAddress = '$emailAddress'";
        // // echo $sql_email;
        // // die();
        // if(!$result = $conn->query($sql_email)){
        //     $sqlphone = "SELECT phoneNumber FROM applicant_profile WHERE phoneNumber = '$phoneNumber'";
        //     if(!$result = $conn->query($sqlphone)){
                //Sql for inserting into applicant_profile table
                $sqlSaveApplicant = "INSERT INTO applicant_profile 
                (surName, firstName, middleName, gender, emailAddress, phoneNumber, dateOfBirth, maritalStatus, qualification, street, town, lga, laptopStatus, areaOfInterest, passport_image, application_status) 
                VALUES ('$surName', '$firstName', '$middleName', '$gender', '$emailAddress', '$phoneNumber', '$dateOfBirth', '$maritalStatus', '$qualification', '$street', '$town', '$lga', '$laptopStatus', '$areaOfInterest', '$passportNewName','$applicationstatus')";
                if(!$result = $conn->query($sqlSaveApplicant)){
                    $_SESSION['message'] = "Application can not be submitted'.[$conn->error'].'";
                    $_SESSION['msg_type'] = "danger";
                    header('location:app_login.php');
                }
                else{
                    $sql= "INSERT INTO userdetails_tbl(username, userPassword, passwordResetStatus, userLevel) VALUES ('$emailAddress', '$password', 'Inactive', 'Student')";
                    if(!$result = $conn->query($sql)){
                        $_SESSION['message'] = "Application can not be submitted'.[$conn->error'].'";
                        $_SESSION['msg_type'] = "danger";
                        header('location:app_login.php');
                    }
                    else{
                        try {
                            $mail->setFrom('aosasona@ekitistate.gov.ng', 'Ekiti ICT Training');
                            $mail->addAddress($emailAddress);
                            // $mail->addReplyTo("aosasona@ekitistate.gov.ng");
                            $mail->isHTML(true);
                            $mail->Subject = 'Awo ICT App';
                            $mail->Body =  $mail_body;        
                            /* SMTP parameters. */
                            $mail->isSMTP();
                            $mail->Host = 'mail.ekitistate.gov.ng';
                            $mail->SMTPAuth = TRUE;
                            $mail->SMTPSecure = 'ssl';
                            $mail->Username = 'aosasona@ekitistate.gov.ng';
                            $mail->Password = 'akprofman@1203';
                            $mail->Port = 465;
                            
                            /* Disable some SSL checks. */
                              $mail->SMTPOptions = array(
                              'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                              )
                            );
                            
                            $mail->send();
                            $_SESSION['message'] = "Application submitted successfully and message has been sent your email address";
                            $_SESSION['msg_type'] = "success";
                            header('location:app_login.php');
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                } 
            } 
}
//login code
if(isset($_POST['login'])){
    $userEmail = $_POST['username'];
    $password = md5($_POST['userpassword']);
    //Sql to check login details
    $sqllogin = "SELECT * FROM userdetails_tbl WHERE username = '$userEmail' AND userPassword = '$password'";
    $result = mysqli_query($conn, $sqllogin);
    if($result) {
        if(mysqli_num_rows($result)==1) {
            $row = mysqli_fetch_assoc($result);
            $level= $_SESSION['userlevel']=$row['userLevel'];
            $_SESSION['userEmail'] = $row['username'];
            $_SESSION['message'] = "Login successfully";
            $_SESSION['msg_type'] = "success";
            if($level =='Admin'){
                header("location:dashboard.php");
            }
           else{
                header("location:student_dashboard.php");
           }
        }
        else{
            //echo "you can't login now";
            $_SESSION['message'] = "Login Details Not Correct";
            $_SESSION['msg_type'] = "warning";
            header('location:app_login.php');
        }
    }
    else{
        $_SESSION['message'] = "SQL Error  [' . $conn->error . ']'";
        $_SESSION['msg_type'] = "warning";
        header('location:app_login.php');
    }
    
}