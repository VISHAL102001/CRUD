<?php 
$id = $_GET['certificate_id'];

header("Content-type: application/pdf");

@readfile('certificates/'.$id.'.pdf');
