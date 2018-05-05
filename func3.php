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
    <th>Seat Code</th>    
    <th>Click to book</th>  
    </tr>
    </thead>    
	<?php
	$con = mysqli_connect("localhost","root","", "airlinedb");
    $flightNo = $_GET['flightNo']; 
    $class = $_GET['classi'];
    $grossFare = $_GET['grossFare'];
    $day = $_GET['day'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $query = "select * from seatinformationtb where Flight_No = '$flightNo' and Class = '$class' and Seat_Code not in (select Seat_Code from seatbookedtb where Flight_No = '$flightNo' and Date = '$date' and Day = '$day' and Time='$time')";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
    	 $seatCode = $row['Seat_Code'];
    	 echo "<tr>
         <td>$flightNo</td>
         <td>$seatCode</a></td>
         <td><a href='func4.php?seatCode=$seatCode&grossFare=$grossFare&flightNo=$flightNo&day=$day&date=$date&time=$time'>Book Now</a></td>
         </tr>
         ";
    }     
    ?>
    </table>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>