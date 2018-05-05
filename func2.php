<!doctype html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Flights Available</title>
</head>
  
<style type="text/css">
   #ab1:hover{
    cursor: pointer;
   }

</style>

<body style="background: url('sky.jpg') no-repeat; background-size:cover;">
    <div class="card-body">
    <table class="table table-hover">
    <thead>
    <tr>
    <th>Flight No D</th>    
    <th>Flight No R</th>
    <th>From</th>    
    <th>To</th>
    <th>Departure Date</th>    
    <th>Departure Time</th>
    <th>Arrival Time</th>
    <th>R.Departure Date</th>    
    <th>R.Departure Time</th>
    <th>R.Arrival Time</th>
    <th>Gross Fare</th>
    <th>R.Gross Fare</th> 
    <th>Book</th>
    </tr>
</thead>
    <?php
    $con = mysqli_connect("localhost","root","", "airlinedb");
    if(isset($_POST['return_date']))
    {
        $from = $_POST['from_city'];
        $to = $_POST['to_city'];
        $depDate = $_POST['departure_date'];
        $retDate = $_POST['return_date'];
        $unixTimestamp = strtotime($depDate);
        $dayOfWeek1 = date("l", $unixTimestamp);
        $unixTimestamp = strtotime($retDate);
        $dayOfWeek2 = date("l", $unixTimestamp);
        $classi = $_POST['class']; //Economy 5% GST and Business 12%
        $query = "select * from flightscheduletb where Origin = '$from' and Destination = '$to' and Dep_Day = '$dayOfWeek1'";
        $result = mysqli_query($con,$query);
        while($row=mysqli_fetch_array($result))
        {
          $from    = $row['Origin'];
          $to      = $row['Destination'];
          $depDay  = $row['Dep_Day'];
          $flightNo = $row['Flight_No'];
          $arrDay = $row['Arr_Day'];
          $depTime = $row['Dep_Time'];
          $arrTime = $row['Arr_Time'];
          $routeCode = $row['Route_Code'];
          $query2 = "select * from airfaretb where Route_Code = '$routeCode'";
          $result2 = mysqli_query($con,$query2);
          while($row2=mysqli_fetch_array($result2))
          {
              $baseFare = $row2['Base_Fare'];
              $grossFare;     
              if(strcmp($classi,'Economy') == 0) {$tax = "5%";$grossFare = $baseFare + (.05)*$baseFare;}
              else {$tax = "12%";$grossFare = $baseFare + (.12)*$baseFare;}
              $query3 = "select * from flightscheduletb where Origin = '$to' and Destination = '$from' and Dep_Day = '$dayOfWeek2'";
              $result3 = mysqli_query($con,$query3);
              while($row3=mysqli_fetch_array($result3))
              {
                $RdepDay  = $row3['Dep_Day'];
                $RflightNo = $row3['Flight_No'];
                $RarrDay = $row3['Arr_Day'];
                $RdepTime = $row3['Dep_Time'];
                $RarrTime = $row3['Arr_Time'];
                $RrouteCode = $row3['Route_Code'];
                $query4 = "select * from airfaretb where Route_Code = '$RrouteCode'";
                $result4 = mysqli_query($con,$query4);
                while($row4=mysqli_fetch_array($result4))
                {
                    $baseFare2 = $row4['Base_Fare'];
                    $grossFare2;     
                    if(strcmp($classi,'Economy') == 0) {$tax = "5%";$grossFare2 = $baseFare2 + (.05)*$baseFare2;}
                     else {$tax = "12%";$grossFare2 = $baseFare2 + (.12)*$baseFare2;}
                  echo "<tr>
                 <td>$flightNo</td>
                 <td>$RflightNo</td>
                 <td>$from</td>
                 <td>$to</td>
                 <td>$depDate</td>
                 <td>$depTime</td>
                 <td>$arrTime</td>
                 <td>$retDate</td>
                 <td>$RdepTime</td>
                 <td>$RarrTime</td>
                 <td>$grossFare</td>
                 <td>$grossFare2</td>
                 <td><a href='func13.php?classi=$classi&flightNo1=$flightNo&grossFare1=$grossFare&day1=$depDay&date1=$depDate&time1=$depTime&flightNo2=$RflightNo&grossFare2=$grossFare2&day2=$RdepDay&date2=$retDate&time2=$RdepTime'>Click here</a><td>
                 </tr>
                 ";
                } 
               }
        
          }    
        }

    }
    else
    {
    $from = $_POST['from_city'];
    $to = $_POST['to_city'];
    $depDate = $_POST['departure_date'];
    $unixTimestamp = strtotime($depDate);
    $dayOfWeek = date("l", $unixTimestamp);
    //echo $dayOfWeek;
    $classi = $_POST['class']; //Economy 5% GST and Business 12%
    $query = "select * from flightscheduletb where Origin = '$from' and Destination = '$to' and Dep_Day = '$dayOfWeek'";
    $result = mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
    {
         $from    = $row['Origin'];
         $to      = $row['Destination'];
         $depDay = $row['Dep_Day'];
         $flightNo = $row['Flight_No'];
         $arrDay = $row['Arr_Day'];
         $depTime = $row['Dep_Time'];
         $arrTime = $row['Arr_Time'];
         $routeCode = $row['Route_Code'];
         $query2 = "select * from airfaretb where Route_Code = '$routeCode'";
         $result2 = mysqli_query($con,$query2);
         while($row2=mysqli_fetch_array($result2))
         {
         $baseFare = $row2['Base_Fare'];
         $grossFare;     
         if(strcmp($classi,'Economy') == 0) {$tax = "5%";$grossFare = $baseFare + (.05)*$baseFare;}
         else {$tax = "12%";$grossFare = $baseFare + (.12)*$baseFare;}
           
         echo "<tr>
         <td>$flightNo</td>
         <td>N.A</td>
         <td>$from</td>
         <td>$to</td>
         <td>$depDate</td>
         <td>$depTime</td>
         <td>$arrTime</td>
         <td>N.A</td>
         <td>N.A</td>
         <td>N.A</td>
         <td>$grossFare</td>
         <td>N.A</td>
         <td><a href='func3.php?flightNo=$flightNo&classi=$classi&grossFare=$grossFare&day=$depDay&date=$depDate&time=$depTime'>Click here</a><td>
         </tr>
         ";
         }    
    }
    }
    //var_dump($result);
   ?>

</table>
</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>