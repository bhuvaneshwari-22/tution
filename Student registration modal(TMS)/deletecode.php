<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'phpcrud');

     if(isset($_POST['deletedata']))
     {
         $id = $_POST['delete_id'];

         $query = "DELETE FROM student WHERE id='$id'";
         $query_run = mysqli_query($connection,$query);

         if($query_run)
         {
             echo'<script> alter("Data Deleted"); </script>';
             header("location:index.php");
         }
         else
         {
            echo'<script> alter("Data Not Deleted"); </script>';
         }
    }
?>