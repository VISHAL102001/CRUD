<?php
    require 'config.php'; 
    session_start();
    $msg = "";
    if(isset($_POST['login']))   {
        $id = $_POST['id'];
        $sql = "SELECT * FROM login_cred where staff_id='".$id."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $pwd = $row['password'];
            }
            if($pwd == $_POST["pwd"]){
                $_SESSION['id']=$id;
                header("Location:Dashboard.php");
            }
        } else {
            $msg = "Invalid Credentials";
        }
    }
    if(isset($_SESSION['id'])){
        header("Location:Dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
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