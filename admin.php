<?php

session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>User panel</title>
    <style>
    fieldset
     {
    min-width: max-content;
    padding: 43px;
    margin: 60px;
    border: 2px solid #9a340d;
    margin-left: 0%;
    position: relative;
}

img {
    border-radius: 50%;
    width: 100px;
    margin-left: 7%;
}
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
</style>
  </head>
  
<body text="black">
   <div align="left">
      <u>USER PANEL</u>
</div>
      
     <h5> <?php echo "welcome &nbsp;&nbsp;".$_SESSION['usern'];?><h5>
      <hr>
      <div class="container">
  
      
          
      <fieldset>
                    <legend>User Details</legend>
    <div class="modal" id="editmodal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times-circle">*</i></button>
      </div>
      <div class="modal-body">
      <form action="update.php" method="post">
                              <div class="form-group">
                                <input type ="hidden" name ="update" id="update">
                                <lable>usertype</lable>
                                 <input type="text" id="user" name="usertype" value="admin" >                                  
</div>
<div class="form-group">

                                 <lable>Username</lable>
                                  <input type="text" id="username" name="username" value="<?php if(!empty($username)){ echo $username;}?>" class="form-control" required>
 </div>
                              <div class="form-group">
                                 <lable>Password</lable>
                                   <input type="text" id="password" name="password" value="<?php if(!empty($username)){ echo $username;}?>" class="form-control" required>

                              </div>

                         <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" name="updated">Save changes</button>
                         </div>
                         </form>


      </div>
    </div>
  </div>
</div>

            <?php

               

           $con=mysqli_connect("localhost", "root", "","mydb");



           $sql = "select * from user WHERE usertype='user'";

           $result=mysqli_query($con,$sql);

           $count=mysqli_num_rows($result);

             if($count>0){
                echo '<table class="table">';
                echo "<thead>";
                echo "<tr>";
                echo"<td>id </td>";
                echo"<td>username  </td>";
                echo"<td>password </td>";
                echo"<td>usertype</td>";
                echo"</tr>";
                echo "</thead>";
               
                while($row = mysqli_fetch_assoc($result)){
                  echo "<tbody>";
                  echo" <tr>";
                  echo"<td>".$row['id']."</td>";
                  echo"<td>".$row['username']."</td>";
                  echo"<td>".$row['password']."</td>";
                  echo"<td>".$row['usertype']."</td>";
                  echo "</tr>";                
                  echo "</tbody>";
                  echo "</table";

               }
            }
            ?>

            


         
         


<fieldset>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
    
    <script type="text/javascript">


    $(document).ready(function(){

      $('.edtbtn').on('click',function(){

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function(){

        return $(this).text();
        }).get();

        console.log(data);

        $('#update').val(data[0]);
        $('#username').val(data[1]);
        $('#password').val(data[2]);
        $('#user').val(data[3]);

      });

    });

</script>
  </body>
</html>

