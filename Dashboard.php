<?php
    require 'config.php'; 
    session_start();
    
    if(!isset($_SESSION['id'])){
        header("Location:index.php");
    }
    $sql = "SELECT * FROM login_cred where staff_id='".$_SESSION['id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['staff_id'];
            $designation = $row['designation'];
            $qualification = $row['qualification'];
            $dof = $row['date_of_joining'];
            $department = $row['department'];
            $name = $row['staff_name'];
        }
    } if(isset($_POST['logout'])){
        session_destroy();
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="Dashboard.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Faculty activity
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="events.php">Events</a>
                </div>
            </li>
            <li class="nav-item">
                <form action="#" method="post">
                        <button type="submit" name ="logout" class="btn btn-danger">Log out</button>
                    </form>
            </li>
        </ul>
    </nav>


    <div class="row" style="margin:5% 25%;width:70%">
        <div class="col-8">
            <p>Staff ID</p>
            <input type="text" value="<?php echo $id?>" style="width:60%" disabled>
            <p>Staff Name</p>
            <input type="text" value="<?php echo $name?>" style="width:60%" disabled>
            <p>Date of joining</p>
            <input type="text" value="<?php echo $dof?>" style="width:60%" disabled>
            <p>Designation</p>
            <input type="text" value="<?php echo $designation?>" style="width:60%" disabled>
            <p>Department</p>
            <input type="text" value="<?php echo $department?>"  style="width:60%" disabled>
            <p>Qualification</p>
            <input type="text" value="<?php echo $qualification?>"  style="width:60%" disabled>
        </div>
    </div>


    
    
</body>
</html>