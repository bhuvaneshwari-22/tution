<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'phpcrud');

     if(isset($_POST['updatedata']))
     {
         $id = $_POST['update_id'];

         $fname = $_POST['fname'];
         $lname = $_POST['lname'];
         $Course = $_POST['Course'];
         $Contact = $_POST['Contact'];
         $Photo = $_POST['Photo'];

         $query = "UPDATE student SET fname='$fname', lname='$lname', Course='$Course', Contact='$Contact', Photo='$Photo' WHERE id='$id' ";
         $query_run = mysqli_query($connection,$query);

         if($query_run)
         {
             echo'<script> alter("Data Update"); </script>';
             header("location:index.php");
         }
         else
         {
            echo'<script> alter("Data Not Updated"); </script>';
         }
    }
?>