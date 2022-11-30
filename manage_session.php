<?php
    ob_start();
    session_start();
    include 'config/database_connect.php';
    $userID = $_SESSION['userEmail'];
    $sql ="SELECT * from userdetails_tbl WHERE username= '$userID'";
    $result = mysqli_query($conn, $sql);
    if($result) {
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $level = $row['userLevel'];
            if($level== 'Admin'){
                $full_name = "Admin";
            }
            if($level=='Student'){
                $sql1 = "SELECT * FROM applicant_profile WHERE emailAddress ='$userID'";
                $result = mysqli_query($conn, $sql1);
                if($result){
                    if(mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $full_name = $row['surName'].' '.$row['firstName']. ' '.$row['middleName'];
                        $profile_image = $row['passport_image'];
                        $status = $row['application_status'];
                    }
                }
            }
        }
        else{
            //echo "you can't login now";
            $_SESSION['message'] = "Please login First Here";
            $_SESSION['msg_type'] = "danger";
            header('location:app_login.php');
        }
    }
    else{
        $_SESSION['message'] = "SQL Error  [' . $conn->error . ']'";
        $_SESSION['msg_type'] = "warning";
        header('location:app_login.php');
    }