
<?php


$con=mysqli_connect("localhost", "root", "","mydb");

  $id=$_GET['id'];
  
  $sql=" DELETE FROM user WHERE id='$id'";
  
  $re=mysqli_query($con,$sql);

  
  if($re){

    echo "deleted";
    header('location:logout.php');
   }
   else{

    echo "not deleted";
   }
    
	
?>