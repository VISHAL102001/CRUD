<?php
    require '../config.php'; 
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header("Location:login.php");
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location:login.php");
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
    <title>Events Page</title>
    <script>
        $(document).ready(()=>{
            $('#addnewbtn').click(()=>{
                $('#addnew').toggle();
            });
            $('#addnewbtn1').click(()=>{
                $('#addnew').toggle();
            });
        });
    </script>
    <style>

tr,td {overflow:hidden; white-space:nowrap}
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="excel.php">
                    <button class="btn btn-success">Export to Excel</button>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                <form action="#" method="post">
                        <button type="submit" name ="logout" class="btn btn-danger">Log out</button>
                    </form>
                </a>
            </li>

        </ul>
    </nav>
    
    <br><br>
    <div class="container">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    <div  style="margin-top:5%;margin-left:2%;width:95%;overflow-x:Scroll;text-align:Center">
    
        <table class="table table-hover" >
            <thead>
            <tr>
                <th>Mentor ID</th>
                <th>Mentor1</th>
                <th>Mentor2</th>
                <th>Student Team Leader</th>
                <th>Department of Team Leader</th>
                <th>Student 1</th>
                <th>Department of student 1</th>
                <th>Student 2</th>
                <th>Department of student 2</th>
                <th>Student 3</th>
                <th>Department of student 3</th>
                <th>Email ID</th>
                <th>Phone number</th>
                <th>Year of study</th>
                <th>Innovation contest/hackathon</th>
                <th>Title of project</th>
                <th>Duration</th>
                <th>Organizer</th>
                <th>Prize / Level of achievement</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <tr>
                    <?php 
                        $sql = "SELECT * FROM events";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $mentor_id=$row['mentor_id'];
                                $mentor1 = $row['mentor1'];
                                $mentor2 = $row['mentor2'];
                                $student_TL = $row['student_TL'];
                                $dept_TL = $row['dept_TL'];
                                $student1 = $row['student1'];
                                $dept1 = $row['dept1'];
                                $student2 = $row['student2'];
                                $dept2 = $row['dept2'];
                                $student3 = $row['student3'];
                                $dept3 = $row['dept3'];
                                $email = $row['email'];
                                $ph = $row['ph'];
                                $innovationhackathon = $row['innovation/hackathon'];
                                $title = $row['title'];
                                $duration = $row['duration'];
                                $oraganizer = $row['oraganizer'];
                                $prize = $row['prize'];
                                $certificate_id = $row['certificate_id'];
                                echo '<td>'.$mentor_id. '</td>';
                                echo '<td>'.$mentor1.'</td>';
                                echo '<td>'.$mentor2.'</td>';
                                echo '<td>'.$student_TL.'</td>';
                                echo '<td>' .$dept_TL.'</td>';
                                echo '<td>'.$student1.'</td>';
                                echo '<td>' .$dept1.'</td>';
                                echo '<td>'.$student2.'</td>';
                                echo '<td>' .$dept2.'</td>';
                                echo '<td>'.$student3.'</td>';
                                echo '<td>' .$dept3.'</td>';
                                echo '<td>'.$email.'</td>';
                                echo '<td>'.$ph.'</td>';
                                echo '<td>'.$innovationhackathon.'</td>';
                                echo '<td>'.$title.'</td>';
                                echo '<td>'.$duration.'</td>';
                                echo '<td>'.$oraganizer.'</td>';
                                echo '<td>'.$prize.'</td>';
                                echo '<td><a href="../view.php?certificate_id=';echo $certificate_id;echo'" target="_blank" class="btn btn-warning">View Certificate</a></td></tr>';
                            }
                        } 

                    ?>

            </tbody>
        </table>
    </div>
    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
    <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>