<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	
    <div class="container" style="width:400px;margin-top: 100px">
    <div class="card">
    <table class="table table-hover">
    <thead>
    <tr>
    <th>Flight No</th>
    <th>Return Flight No</th>   
    <th>Seat Code</th>
    <th>Return Seat Code</th>    
    <th>Click to book</th>  
    </tr>
    </thead>    
	<?php
	$con = mysqli_connect("localhost","root","", "airlinedb");
    $class = $_GET['classi'];
    $flightNo = $_GET['flightNo1']; 
    $grossFare = $_GET['grossFare1'];
    $day = $_GET['day1'];
    $date = $_GET['date1'];
    $time = $_GET['time1'];

    $flightNo2 = $_GET['flightNo2']; 
    $grossFare2 = $_GET['grossFare2'];
    $day2 = $_GET['day2'];
    $date2 = $_GET['date2'];
    $time2 = $_GET['time2'];
    
    $query = "select * from seatinformationtb where Flight_No = '$flightNo' and Class = '$class' and Seat_Code not in (select Seat_Code from seatbookedtb where Flight_No = '$flightNo' and Date = '$date' and Day = '$day' and Time='$time')";
    $result = mysqli_query($con,$query);


    while($row=mysqli_fetch_array($result))
    {
        $query2 = "select * from seatinformationtb where Flight_No = '$flightNo2' and Class = '$class' and Seat_Code not in (select Seat_Code from seatbookedtb where Flight_No = '$flightNo2' and Date = '$date2' and Day = '$day2' and Time='$time2')";
         $result2 = mysqli_query($con,$query2);
         while($row2=mysqli_fetch_array($result2))
         {
    	 $seatCode1 = $row['Seat_Code'];
    	 $seatCode2 = $row2['Seat_Code'];
         echo "<tr>
         <td>$flightNo</td>
         <td>$flightNo2</td>
         <td>$seatCode1</td>
         <td>$seatCode2</td>
         <td><a href='func14.php?seatCode1=$seatCode1&grossFare1=$grossFare&flightNo1=$flightNo&day1=$day&date1=$date&time1=$time&seatCode2=$seatCode2&grossFare2=$grossFare2&flightNo2=$flightNo2&day2=$day2&date2=$date2&time2=$time2'>Book Now</a></td>
         </tr>
         ";
        }
    }     
    ?>
    </table>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>