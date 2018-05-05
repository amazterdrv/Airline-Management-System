<?php
$con = mysqli_connect("localhost","root","", "airlinedb");

if(isset($_POST['Signup'])){
	$email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $contact = $_POST['contactno'];
    $birth = $_POST['birth_date'];
    $address = $_POST['address'];
    $residenceCity = $_POST['residenceCity'];
    $residenceCountry = $_POST['residenceCountry'];
    $id = $_POST['IdentificationNo'];
	$password = $_POST['password'];
    $query="insert into passengertb(firstname,lastname,contactno,email,password,address,residenceCity,IdentificationNo,residenceCountry,birth) values('$firstname','$lastname','$contact','$email','$password','$address','$residenceCity','$id','$residenceCountry','$birth')";
    $result = mysqli_query($con,$query);
   // echo "sss";
    header("Location:index.php");
}


?>