<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'phpcrud');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $course = $_POST['course'];
    $contact = $_POST['contact'];
    $Photo = $_POST['Photo'];

    $query = "INSERT INTO student(`fname`,`lname`,`course`,`contact`,`Photo`) values('$fname','$lname','$course','$contact','$Photo')";
    // echo $query;
    $query_run = mysqli_query($connection, $query);
    echo $query_run;

    if($query_run)
    { 
        
        echo '<script> alert("Data Saved"); </Script>';
        header('location: index.php');
        
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </Script>';
    }
}