<?php
	    session_start();
        $seatCode =  $_GET['seatCode'];
        $flightNo = $_GET['flightNo'];
        $day = $_GET['day'];
        $date = $_GET['date'];
        $time = $_GET['time'];
        $id =  $_SESSION["id"];
        $con = mysqli_connect("localhost","root","", "airlinedb");
        $query="delete from seatbookedtb where Flight_No = '$flightNo' and Seat_Code = '$seatCode' and Date = '$date' and Day = '$day' and Time = '$time'";
        $result = mysqli_query($con,$query);
        header("Location:dashboard.php");
     ?>
