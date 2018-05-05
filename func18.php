<?php
      if(isset($_POST['confirm'])){  
        session_start();
        $id = $_SESSION["id"];
        $city = $_POST['residenceCity'];
        $country = $_POST['residenceCountry'];
        $age = $_POST['Age'];
        $address = $_POST['address'];
        $contact = $_POST['contactno'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        
        $seatCode =  $_POST['seatCode1'];
        $flightNo = $_POST['flightNo1'];
        $grossFare = $_POST['grossFare1'];
        $day = $_POST['day1'];
        $date = $_POST['date1'];
        $time = $_POST['time1'];

        $seatCode2 =  $_POST['seatCode2'];
        $flightNo2 = $_POST['flightNo2'];
        $grossFare2 = $_POST['grossFare2'];
        $day2 = $_POST['day2'];
        $date2 = $_POST['date2'];
        $time2 = $_POST['time2'];


        $con = mysqli_connect("localhost","root","", "airlinedb");
        $query="insert into seatbookedtb values('$flightNo','$seatCode','$date','$day','$time','$id')";
        //$result = mysqli_query($con,$query);
        $query="insert into seatbookedtb values('$flightNo2','$seatCode2','$date2','$day2','$time2','$id')";
        //$result = mysqli_query($con,$query);
        if(isset($_POST['infant']))
        {
            $query1="insert into transactiontb(firstname,lastname,contactno,address,Fare,Flight_No,Seat_Code,Date,Day,Time,IdentificationNo,Email,residenceCity,residenceCountry,Age,Infant) values('$firstname','$lastname','$contact','$address','$grossFare','$flightNo','$seatCode','$date','$day','$time','$id','$email','$city','$country','$age',1)";

            $query2="insert into transactiontb(firstname,lastname,contactno,address,Fare,Flight_No,Seat_Code,Date,Day,Time,IdentificationNo,Email,residenceCity,residenceCountry,Age,Infant) values('$firstname','$lastname','$contact','$address','$grossFare2','$flightNo2','$seatCode2','$date2','$day2','$time2','$id','$email','$city','$country','$age',1)";
       
       
        }
        else
        {
            $query1="insert into transactiontb(firstname,lastname,contactno,address,Fare,Flight_No,Seat_Code,Date,Day,Time,IdentificationNo,Email,residenceCity,residenceCountry,Age,Infant) values('$firstname','$lastname','$contact','$address','$grossFare','$flightNo','$seatCode','$date','$day','$time','$id','$email','$city','$country','$age',0)";

            $query2="insert into transactiontb(firstname,lastname,contactno,address,Fare,Flight_No,Seat_Code,Date,Day,Time,IdentificationNo,Email,residenceCity,residenceCountry,Age,Infant) values('$firstname','$lastname','$contact','$address','$grossFare2','$flightNo2','$seatCode2','$date2','$day2','$time2','$id','$email','$city','$country','$age',0)";
       
       
        }
        //echo $firstname;
        //echo $grossFare;
         $result = mysqli_query($con,$query1);
         $result = mysqli_query($con,$query2);
        //echo $time;
        header("Location:dashboard.php");
    }
     ?>