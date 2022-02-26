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
    } 
    if(isset($_POST["submit1"])){
        $mentor_id=$id;
        $mentor1 = $_POST['mentor1'];
        $mentor2 = $_POST['mentor2'];
        $student_TL = $_POST['studentnameTL'];
        $dept_TL =$_POST['dept_TL'];
        $student1 = $_POST['studentname1'];
        $dept1 =$_POST['dept1'];
        $student2 = $_POST['studentname2'];
        $dept2 =$_POST['dept2'];
        $student3 = $_POST['studentname3'];
        $dept3 =$_POST['dept3'];
        $email = $_POST['email'];
        $ph = $_POST['ph'];
        $contest = $_POST['contest'];
        $title = $_POST['title'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $oraganizer = $_POST['organizer'];
        $prize = $_POST['prize'];
        $certificate_id = uniqid();
        $sql = "INSERT INTO events VALUES ('".$mentor_id."','".$mentor1."','".$mentor2."','".$student_TL."','".$dept_TL."','".$student1."','".$dept1."','".$student2."','".$dept2."','".$student3."','".$dept3."','".$email."','".$ph."','".$contest."','".$title."','".$from." to ".$to."','".$oraganizer."','".$prize."','".$certificate_id."')";
        if ($conn->query($sql) === TRUE) {
            $pdfname=$_FILES['myfile']['name'];
            $extension = pathinfo($pdfname,PATHINFO_EXTENSION);
            $rename= $certificate_id;
            $newname=$rename.'.'.$extension;
            $filename1=$_FILES['myfile']['tmp_name'];
            move_uploaded_file($filename1, 'certificates/'.$newname);
            header("Location:events.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; 
        }
        
}

    
    if(isset($_POST['logout'])){
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
            <li class="nav-item active">
                <a class="nav-link" >
                <button class="btn btn-primary" id="addnewbtn">Add new</button>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="excel.php">
                    <button class="btn btn-success">Export to Excel</button>
                </a>
            </li>
            
            <li class="nav-item justify-content-end">
                <a class="nav-link">
                    <form action="#" method="post">
                        <button type="submit" name ="logout" class="btn btn-danger">Log out</button>
                    </form>
                </a>
            </li>

        </ul>
    </nav>
    <div style="margin-top:1%;z-index:5566666655;position:absolute;background-color:white;box-shadow:10px 5px 5px black;padding:2%;width:100%;display:none" id="addnew">
        <form method="post" action="#" enctype= "multipart/form-data">   
            <button type="button" class="close" data-dismiss="alert" id="addnewbtn1">&times;</button>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Mentor Name 1:<span style="color:red">*</span></label><br>
                        <input type="text" class="form-control" name="mentor1" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Mentor Name 2:<span style="color:red">*</span></label><br>
                        <label><i>Enter N/A if not applicable</i></label>
                        <input type="text" class="form-control" name="mentor2" required >

                    </div>
                    
                    <div class="form-group">
                        <label>Student Name(Team Leader):<span style="color:red">*</span></label><br>
                        <input type="text" class="form-control" name="studentnameTL" required>
                    </div>

                    <div class="form-group">
                        <label>Batch/Department of team Leader:<span style="color:red">*</span></label><br> 
                        <input name="dept_TL" type="text" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label>Student Name 1:<span style="color:red">*</span></label><br>
                        <label><i>Enter N/A if not applicable</i></label>
                        <input type="text" class="form-control" name="studentname1" required>
                    </div>

                    <div class="form-group">
                        <label>Batch/Department of Student 1:<span style="color:red">*</span></label><br> 
                        <label><i>Enter N/A if not applicable</i></label>
                        <input name="dept1" type="text" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label>Student Name 2:<span style="color:red">*</span></label><br>
                        <label><i>Enter N/A if not applicable</i></label>
                        <input type="text" class="form-control" name="studentname2" required>
                    </div>

                    <div class="form-group">
                        <label>Batch/Department of Student 2 <span style="color:red">*</span></label><br> 
                        <label><i>Enter N/A if not applicable</i></label>
                        <input name="dept2" type="text" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label>Student Name 3:<span style="color:red">*</span></label><br>
                        <label><i>Enter N/A if not applicable</i></label>
                        
                        <input type="text" class="form-control" name="studentname3" required>
                    </div>

                    <div class="form-group">
                        <label>Batch/Department of Student 3:<span style="color:red">*</span></label><br> 
                        <label><i>Enter N/A if not applicable</i></label>
                        <input name="dept3" type="text" class="form-control" required >
                    </div>
                    
                   

                    
                    <div class="form-group">
                        <label>Student Email ID:<span style="color:red">*</span></label><br>
                        <input type="email" class="form-control" required name="email">
                    </div>

                    <div class="form-group">
                        <label>Phone number:<span style="color:red">*</span></label><br>
                        <input name="ph" type="text" class="form-control" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength="10" minlength="10">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Innovation Contest/ Hackathon<span style="color:red">*</span></label><br>
                        <input name="contest" type="text" class="form-control" required >
                    </div>

                    <div class="form-group">
                        <label>Title of Project<span style="color:red">*</span></label><br> 
                        <input name="title" type="text" class="form-control" required >
                    </div>
                    
                    
                    
                    
                    <label>Duration<span style="color:red">*</span></label><br>
                    <label>From</label>
                    <input type="date" name="from">
                    <label>To</label>
                    <input type="date" name="to"><br><br>
                    <div class="form-group">
                        <label>Organizer<span style="color:red">*</span></label><br>
                        <input type="text" name="organizer" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label>Prize/ Level of achievement:<span style="color:red">*</span></label><br>    
                        <select name="prize" class="form-control" id="sel1" required>
                            <option>1st</option>
                            <option>2nd</option>
                            <option>3rd</option>
                            <option>Participated</option>
                            <option>Cleared First Round</option>
                            <option>Cleared Second Round </option>
                            <option>Cleared Third Round</option>
                            <option>Special appreciation</option>
                            <option>Waiting for result</option>
                            
                        </select>
                    </div>

                    <label>Upload certificate:<span style="color:red">*</span></label><br>    
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="myfile" required>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div><br><br>
                    <button style="float:right" class="btn btn-info" type="submit" name="submit1">Submit</button>
                </div>
            </div>

            
        </form>
    </div>
    <div class="container" style="margin-top:3%">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
    <div  style="margin-top:5%;margin-left:2%;width:95%;overflow-x:Scroll;text-align:Center">
        <table class="table table-hover">
            <thead>
            <tr>
                
                <th>Mentor1</th>
                <th>Mentor2</th>
                <th>Student Team Leader</th>
                <th>Batch/Department of Team Leader</th>
                <th>Student 1</th>
                <th>Batch/Department of student 1</th>
                <th>Student 2</th>
                <th>Batch/Department of student 2</th>
                <th>Student 3</th>
                <th>Batch/Department of student 3</th>
                <th>Email ID</th>
                <th>Phone number</th>
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
                        $sql = "SELECT * FROM events where mentor_id='".$_SESSION['id']."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                
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
                                echo '<td><a href="view.php?certificate_id=';echo $certificate_id;echo'" target="_blank" class="btn btn-warning">View Certificate</a></td></tr>';
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