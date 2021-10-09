<?php
session_start();
error_reporting(0);
$con=mysqli_connect("localhost", "root", "","mydb");

if(isset($_POST['login']))

{
  $username=$_POST['username'];
  $password=$_POST['password'];
  
      
  $sql=" select * from user where username='$username' and password='$password'";
  $rsult=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($rsult);
  $_SESSION['id']=$row['id'];
  $_SESSION['user']=$row['usertype'];
  $_SESSION['pass']=$row['password'];
  $_SESSION['usern']=$row['username'];
  
  $count=mysqli_num_rows($rsult);
  if($count==1){
       
  if($row['usertype']==admin){
   
    header('location:admin.php');
    
       exit();
     }
   
     else
     {
       header('location:user.php');
     exit();
     }
    }
    else
    {
    echo " YOU HAVE ENTERED INCORRECT PASSWORD ";
    exit();
    }
   
}
session_destroy();


?>
<?php

$con=mysqli_connect("localhost", "root", "","mydb");

if(isset($_POST['login1']))

{
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql=" select * from user where username='$username' and password='$password' LIMIT 0, 25";
  $rsult=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($rsult);
  $count=mysqli_num_rows($rsult);
  if($count==1){
        
   header('location:user.php');
      exit();
    }
  
    else
    {
    echo " YOU HAVE ENTERED INCORRECT PASSWORD";
    exit();
    }
   
}
 /*
if(!isset($_SESSION['$username'])){
  header('location:login.php');
}
*/
        /*php if(isset($_GET['num'])){echo $_GET['num']; }*/

?>

<?php


$con=mysqli_connect("localhost", "root", "","mydb");

if(isset($_POST['submit']))

{ $usertype=$_POST['user'];
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql=" select * from user where username='$username' and password='$password'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count == 1){
   
    $_SESSION['USERNAME']= $username;
    echo "we have already exist this username "  .   $_SESSION['USERNAME'];
      exit();
    }
    else
    {
        $reg ="insert into user (username,password,usertype) values('$username','$password','$usertype')";
        mysqli_query($con,$reg);
        echo"Registration Successful";    
        exit();
    }
   
    
	}
?>
<html>
    <head>
        <title>User login & Registration</title>
        <link rel="stylesheet" href="style11.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <style>

     body{
    background:linear-gradient(rgb(66 60 60 / 80%),rgb(25 21 21 / 60%)),url(./SNIMAGES1.jpeg)no-repeat;
    background-size: 100%;
    background-position: center;

    

}
     #logomaa 
     {
    width: 10%;
    margin-left: 2%;
    margin-top: 1%;
}

.head {
    margin-top: -45px;
}
.head {
    position: fixed;
    left: 38%;
    color: azure;
    
}
.login-form{
  margin-top: 50px;
    margin-left: 18%;

}
#reg
{


}


.col-md-8{
margin-right: 70px;
background-color: lightslategray;
border-radius: 53px;
padding: 10%;
opacity: 0.6;

}


.col-md-4{
    margin-right: 70px;
    background-color: lightslategray;
    border-radius: 53px;
    padding: 8%;
    opacity: 0.6;
    
    }
#center
 {
    margin-left: 28px;
    
}
h2 {
    margin-bottom: 15%;
    margin-top: -10%;
}
button.btn.btn-primary {
  cursor: pointer;
}


.conatainer {
        
        margin-left: -3%;
        
    }
    @media only screen and (max-width: 1005px){
    
    
        .conatainer {
            
            margin-left: -17%;
            
        }
        
     body{
    background:linear-gradient(rgb(66 60 60 / 80%),rgb(25 21 21 / 60%)),url(./SNIMAGES1.jpeg)no-repeat;
    
    }
    .head {
    position: fixed;
    left: 25%;
    color: azure;

  }
}
     </style>
</head>
<body> 

        <div class="head">

        <h1 id="center"></h1>

        </div>
     <div class="conatainer">
         <div class="login-form">
              <div class="row">
                  <div class="col-md-4">
                     <h2>Login Here</h2>
                         <form action="" method="post">
                              <div class="form-group">
                                 <lable>Username</lable>
                                  <input type="text" name="username" value="<?php if(!empty($username)){ echo $username;}?>" class="form-control" required>

                              </div>
                              <div class="form-group">
                                 <lable>Password</lable>
                                   <input type="password" name="password" value="<?php if(!empty($username)){ echo $username;}?>" class="form-control" required>

                              </div>
                              <button type="submit" name="login" class="btn btn-primary">Login</button>

                         </form>
                   </div>

                    <div id="reg" class="col-md-8">
                       <h2>Register Here</h2>
                           <form action="#" method="post">
                             <div class="form-group">
                                 
                               <lable>Admin</lable>
                               <input type="radio" name="user" value="admin" >                                  
                               <lable>User</lable>
                               <input type="radio" name="user" value="user">                             
                            </div>

                            <div class="form-group">


                               <lable>Username</lable>
                                  <input type="text" name="username" class="form-control" required>

                             </div>
                             <div class="form-group">
                                <lable>Password</lable>
                                  <input type="password" name="password" class="form-control" required>

                             </div>
                             <div class="form-group">

                             <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
</div>
                        </form>
                         </div>
                   </div>
               </div>
           </div>

          

</body>
</html>


