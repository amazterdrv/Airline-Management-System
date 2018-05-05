<!doctype html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Airline management system</title>
</head>
  
<body style="background: url('sky.jpg') no-repeat; background-size:cover;">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./dashboard.php">Dashboard</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="./signout.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="./dashboard.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./search.php">
                  <span data-feather="file"></span>
                  Search
                </a>
              </li>  
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <h2>Transaction History</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>FlightNo</th>
                  <th>To</th>
                  <th>From</th>
                  <th>SeatNo</th>
                  <th>Date of Departure</th>
                  <th>Time of Departure</th>
                  <th>Click to Cancel</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $con = mysqli_connect("localhost","root","", "airlinedb");
                  session_start();
                  $id = $_SESSION["id"];
                  $query = "select * from seatbookedtb where IdentificationNo = '$id'";
                  $result = mysqli_query($con,$query);
                  while($row=mysqli_fetch_array($result))
                  {
                       $seatCode   = $row['Seat_Code'];
                       $FlightNo   = $row['Flight_No'];
                       $date = $row['Date'];
                       $day = $row['Day'];
                       $time = $row['Time'];  
                       $query1 = "select * from flightscheduletb where Flight_No = '$FlightNo' and Dep_Day='$day' and Dep_Time='$time'";
                       $result1 = mysqli_query($con,$query1);
                       while($row1=mysqli_fetch_array($result1))  
                       {
                           $to   = $row1['Destination'];
                           $from  = $row1['Origin'];
                           echo "<tr>
                           <td>$FlightNo</td>
                           <td>$to</td>
                           <td>$from</td>
                           <td>$seatCode</td>
                           <td>$date</td>
                           <td>$time</td>
                           <td><a href='func6.php?flightNo=$FlightNo&seatCode=$seatCode&date=$date&day=$day&time=$time'>Cancel</a></td>
                           </tr>
                            ";
                       }
                  }     
              ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>