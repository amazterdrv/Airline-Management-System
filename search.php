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
  
<style type="text/css">
   #ab1:hover{
    cursor: pointer;
   }

</style>

<body style="background: url('sky.jpg') no-repeat; background-size:cover;">
    
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="./search.php">Search Flights</a>
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
              </ul>  
          </div>
        </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">    
    <div class="container" style="width:800px">
    <form class="form-group" name="search" action="func2.php" method="POST">
              <h1>Search Flights</h1>
              <div class="radio">
                    <label>
                      <input type="radio" name="radio1" value="oneway" onchange="hideA(this)">
                      One Way
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="radio1" value="return" checked" onchange="hideB(this)">
                      Return
                    </label>
              </div>
                  <b><label class="control-label">From</label></b>
                  <select class="form-control" name="from_city" id="from_city">
                     <option name="delhi" value="Delhi">Delhi</option>
                     <option name="mumbai" value="Mumbai">Mumbai</option>
                     <option name="kolkata" value="Kolkata">Kolkata</option>
                     <option name="pune" value="Pune">Pune</option>
                  </select><br>  
                  <b><label class="control-label">To</label></b>
                  <select class="form-control" name="to_city" id="to_city"><br>
                     <option name="delhi" value="Delhi">Delhi</option>
                     <option name="mumbai" value="Mumbai">Mumbai</option>
                     <option name="kolkata" value="Kolkata">Kolkata</option>
                     <option name="pune" value="Pune">Pune</option>
                  </select><br>  
                 
                  <b><label class="control-label">Departure Date</label></b>
                  <input class="form-control" name="departure_date" id="departure_date" required type="date"><br>
                  <b><label class="control-label" id="return" for="return_date">Return Date</label></b>
                  <input class="form-control" name="return_date" id="return_date" required type="date"><br>
                  <b><label for="select" class="control-label">Class</label></b>
                  <select class="form-control" name="class" id="select">
                    <option name="economy" value="Economy">Economy</option>
                    <option name="business" value="Business">Business</option>
                  </select><br>
                <center>
                  <button type="submit" id="submit" value="submit" name="submit" class="btn btn-primary">Search</button>
                </center>
             
    </form>
    </div>
    </main>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./jquery.validate.min.js"></script>
    

    <script type="text/javascript">
      jQuery.validator.addMethod("greaterThan", 
        function(value, element, params) {

         if (!/Invalid|NaN/.test(new Date(value))) {
          return new Date(value) > new Date($(params).val());
        }

    return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) > Number($(params).val())); 
},'Must be greater than {0}.');
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if(dd<10){dd='0'+dd;} 
      if(mm<10){mm='0'+mm;} 
      var today = yyyy+'-'+mm+'-'+dd;
      $("form[name='search']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      departure_date: {
        required: true,
        date : true,
        min: today,
      },
      return_date: {
        required: true,
        date : true,
        greaterThan: "#departure_date",
      }
    },
    // Specify validation error messages
    messages: {
      departure_date: "Enter a valid date",
      return_date: "Enter a valid date"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });




      function hideA(x) 
      {
         if (x.checked)
         {
           document.getElementById("return_date").disabled = true;
         }
      }

     function hideB(x)
      {
         if (x.checked) 
         {
           document.getElementById("return_date").disabled = false;
         }
      }
   </script>  
</body>
</html>