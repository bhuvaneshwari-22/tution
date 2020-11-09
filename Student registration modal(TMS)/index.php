<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Registration Model(TMS)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<!-- Modal -->
  <div class="modal fade" id="Student_AddModal" tabindex="-1" aria-labelledby="Student AddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Student AddModalLabel">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="insertcode.php" method="POST" enctype="multipart-form-data">
           <div class="modal-body">
               <div class="form-group">
                   <label>First name</label>
                   <input type="text" name="fname" class="form-control" placeholder="Enter first name">
               </div>

               <div class="form-group">
                   <label>last name</label>
                   <input type="text" name="lname" class="form-control" placeholder="Enter last name">
               </div>
               
               <div class="form-group">
                   <label>Course</label>
                   <input type="text" name="course" class="form-control" placeholder="Enter Course">
               </div>

               <div class="form-group">
                   <label>Phone number</label>
                   <input type="number" name="contact" class="form-control" placeholder="Enter Phone number">
               </div>

               <div class="form-group">
                   <label>Photo</label>
                   <input type="file" name="Photo" class="form-control" placeholder="Upload Photo">
               </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit"name="insertdata" class="btn btn-primary">Save Data</button>
            </div>
       </form>
    </div>
  </div>
</div>



<!-- ###################################################################################### -->
<!-- EDIT popup form(TMS) -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="Student AddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Student AddModalLabel">Edit Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="updatecode.php" method="POST">
           <div class="modal-body">

               <input type="hidden" name="update_id" id="update_id">

               <div class="form-group">
                   <label>First name</label>
                   <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter first name">
               </div>

               <div class="form-group">
                   <label>last name</label>
                   <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter last name">
               </div>
               
               <div class="form-group">
                   <label>Course</label>
                   <input type="text" name="Course" id="Course" class="form-control" placeholder="Enter Course">
               </div>

               <div class="form-group">
                   <label>Phone number</label>
                   <input type="text" name="Contact" id="Contact" class="form-control" placeholder="Enter Phone number">
               </div>

               <div class="form-group">
                   <label>Photo</label>
                   <input type="file" name="Photo"  id="Photo" class="form-control" placeholder="Upload Photo">
               </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="Submit"name="updatedata" class="btn btn-primary">update Data</button>
            </div>
       </form>
    </div>
  </div>
</div>
<!-- ############################################################################################## -->

<!-- DELETE popup form(TMS) -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="Student AddModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Student AddModalLabel">Delete Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="deletecode.php" method="POST">
           <div class="modal-body">

               <input type="hidden" name="delete_id" id="delete_id">

               <h4>Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                <button type="Submit"name="deletedata" class="btn btn-primary"> Yes !! Delete it.</button>
            </div>
       </form>
    </div>
  </div>
</div>
<!-- ############################################################################################## -->


   <div class="container">
       <div class="jumbotron">
           <div class="card">
              
                    <div class="card">
                      <div class="card-body">
                      <h2>Students Registration Model(TMS)</h2>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Student_AddModal">
                              Add Data
                            </button>
                        </div>
                    </div>

            </div>

             <div class="card">
                 <div class="card-body">

                         
                            
                       <table widh="50%" border="1" cellbadding="5"cellspacing="5" class="table table-bordered table-dark">
                            <thead>
                               <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">EDIT</th>
                                    <th scope="col">DELETE</th>
                               </tr>
                            </thead>
                            <?php
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,'phpcrud');

                                $query = "SELECT * FROM student";
                                $query_run = mysqli_query($connection,$query);
                           ?>
                            <?php
                                if($query_run)
                                {
                                    foreach($query_run as $row)
                                {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['fname'];?></td>
                                    <td><?php echo $row['lname'];?></td>
                                    <td><?php echo $row['Course'];?></td>
                                    <td><?php echo $row['Contact'];?></td>
                                    <td><?php echo '<img src="'.$row['Photo'].'" />';?></td>
                                    <td>
                                       <button type = "button" class="btn btn-success editbtn"> EDIT </button>
                                    </td>
                                    <td>
                                       <button type = "button" class="btn btn-danger deletebtn"> DELETE </button>
                                    </td>
                                </tr>
                            </tbody>
                          <?php
                                  }
                                }
                                else
                                {
                                    echo "No Record Found";
                                }
                           ?>
                       </table>
                 </div>
             </div>  

        </div>
    <div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>  

<script>

$(document).ready(function () {

     $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
               
        });
    });

</script>

<script>

$(document).ready(function () {
     $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#fname').val(data[1]);
                $('#lname').val(data[2]);
                $('#Course').val(data[3]);
                $('#Contact').val(data[4]);
                $('#Photo').val(data[4]);
        });
    });

</script>
</body>
</html>