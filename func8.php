<?php
      if(isset($_POST['confirm'])){  
        session_start();
        $seatCode =  $_POST['seatCode'];
        $flightNo = $_POST['flightNo'];
        $grossFare = $_POST['grossFare'];
        $id = $_SESSION["id"];
        $city = $_POST['residenceCity'];
        $country = $_POST['residenceCountry'];
        $age = $_POST['Age'];
        $address = $_POST['address'];
        $contact = $_POST['contactno'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $day = $_POST['day'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $con = mysqli_connect("localhost","root","", "airlinedb");
       // $query="insert into seatbookedtb values('$flightNo','$seatCode','$date','$day','$time','$id')";
        //$result = mysqli_query($con,$query);
        if(isset($_POST['infant']))
        {
            $query="insert into transactiontb(firstname,lastname,contactno,address,Fare,Flight_No,Seat_Code,Date,Day,Time,IdentificationNo,Email,residenceCity,residenceCountry,Age,Infant) values('$firstname','$lastname','$contact','$address','$grossFare','$flightNo','$seatCode','$date','$day','$time','$id','$email','$city','$country','$age',1)";
       
        }
        else
        {
            $query="insert into transactiontb(firstname,lastname,contactno,address,Fare,Flight_No,Seat_Code,Date,Day,Time,IdentificationNo,Email,residenceCity,residenceCountry,Age,Infant) values('$firstname','$lastname','$contact','$address','$grossFare','$flightNo','$seatCode','$date','$day','$time','$id','$email','$city','$country','$age',0)";
       
        }
        //echo $firstname;
        //echo $grossFare;
         $result = mysqli_query($con,$query);
        //echo $time;
        header("Location:dashboard.php");
    }
     ?>