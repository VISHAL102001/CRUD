<?php
require '../config.php'; 
$file="demo.xls";
$table='<table class="table table-hover">
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
            <th>Innovation contest/hackathon</th>
            <th>Title of project</th>
            <th>Duration</th>
            <th>Organizer</th>
            <th>Prize / Level of achievement</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <tr>';

$sql = "SELECT * FROM events";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mentor_id= $row['mentor_id'];
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
        $table .= '<td>'.$mentor_id.'</td>';
        $table .= '<td>'.$mentor1.'</td>';
        $table .= '<td>'.$mentor2.'</td>';
        $table .= '<td>'.$student_TL.'</td>';
        $table .= '<td>'.$dept_TL.'</td>';
        $table .= '<td>'.$student1.'</td>';
        $table .= '<td>'.$dept1.'</td>';
        $table .= '<td>'.$student2.'</td>';
        $table .= '<td>'.$dept2.'</td>';
        $table .= '<td>'.$student3.'</td>';
        $table .= '<td>'.$dept3.'</td>';
        $table .= '<td>'.$email.'</td>';
        $table .= '<td>'.$ph.'</td>';
        $table .= '<td>'.$innovationhackathon.'</td>';
        $table .= '<td>'.$title.'</td>';
        $table .= '<td>'.$duration.'</td>';
        $table .= '<td>'.$oraganizer.'</td>';
        $table .= '<td>'.$prize.'</td>';
        $table .= '<td>'.$certificate_id.'</td></tr>';
    }
} 

      
$table .='</tbody></table>';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");
echo $table;
?>
