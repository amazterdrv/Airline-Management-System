<?php
$con = mysqli_connect("localhost","root","", "airlinedb");
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
    $query = "select * from employeetb where email = '$email' and password = '$password'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result)==1)
    {
        while($row=mysqli_fetch_array($result))
        {
             $identity = $row['Emp_Id'];
             session_start();
             $_SESSION["email"] = $email;
             $_SESSION["id"] = $identity;
             header("Location:dashboard2.php");
        }
    }
    else
    {
    	echo "<script>alert('Enter correct details');</script>";
    	echo "<script>window.open('index.php','_self');</script>";	
    }
}


?>