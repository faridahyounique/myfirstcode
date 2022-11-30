<?php
    // session_start();
?>
<style>
    /* li a:hover{
        background-color: green;
        border-radius: 5px;
    }
    .dropdown{
        position: relative;
    }
    .dropdown-content{
        display: none;
        position: absolute;
    }
    .dropdown:hover .dropdown-content ol li a{
        display: block;
        background-color: black;
    } */
</style>
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder, text-danger" href="#"><h3>AWO ICT ACADEMY</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="dashboard.php">Home</a>
                </li>
                <?php 
                    if($_SESSION['userlevel']=='Admin'):?>
                        <li class="nav-item">
                            <a class="nav-link text-light dropdown-toggle" aria-current="page" data-bs-toggle="dropdown" aria-expanded="false">Applicants</a>
                                <div class="dropdown">
                                    <ul class="dropdown-menu">
                                        <a href="accepted_applicants.php" class="dropdown-item">Accepted</a>
                                        <a href="pending_applicants.php" class="dropdown-item">Pending</a>
                                        <a href="rejected_applicants.php" class="dropdown-item">Rejected</a>
                                        <a href="all_applicants.php" class="dropdown-item">All Applicants</a>
                                    </ul>
                                </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page" href="report.php">Report</a>
                        </li>   
                <?php endif;?>             
                <li class="nav-item">
                    <a class="bg-danger rounded nav-link text-light" aria-current="page" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
            
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
<style>
    /* .dropdown2{
        background-color: green;
        color:red;
        width: 200px;
        position: relative;
    }
    .dropdown-content2{
        display: none;
    }
    .dropdown2:hover .dropdown-content2{
        display: block;
        background-color: red;
        color: white;
    } */
</style>
    <!-- <div class="dropdown2">
        <h4>My Drop Down</h4>
        <div class="dropdown-content2">
            <span>Ade is aboy</span>
        </div>
    </div> -->
    