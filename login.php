<?php
    require '../config.php'; 
    $msg = "";
    session_start();
    if(isset($_SESSION['admin_id'])){
        header("Location:dashboard.php");
    }
    if(isset($_POST['login']))   {
        $id = $_POST['id'];
        
        if($_POST['pwd'] == 'admin' && $id=='admin'){
            session_start();
            $_SESSION['admin_id']=$id;
            header("Location:dashboard.php");

        } else {
            $msg = "Invalid Credentials";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="login_container">
        <h1>Login</h1>
        <form action="#" method="post">
            Staff ID:<span style="color:red">*</span>
            <input type="text" class="input1" name="id" required><br>
            Password:<span style="color:red">*</span>
            <input type="password" class="input2" name="pwd" required><br><br>
            <p style="color:red"><?php echo $msg?><p>
            <button type="submit" class="btn btn-block btn-success" name="login">Login</button>
        </form>
    </div>
</body>
</html>