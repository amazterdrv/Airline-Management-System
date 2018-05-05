<!doctype html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Confirm Booking Details</title>
</head>
  
<style type="text/css">
   #ab1:hover{
    cursor: pointer;
   }

</style>

<body style="background: url('sky.jpg') no-repeat; background-size:cover;">
   <center>
   <div class="container" style="width:600px;margin-top: 50px">
   <div class="card">
    <h2>Confirm Ticket</h2>
   <div class="card-body"> 
   
   <form class="form-group" name="confirmTicket" action="func8.php" method="post">
      <input type="text" name="firstname" id="firstname" class="form-control" placeholder="FirstName"><br/>
      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="LastName"><br/>
      <input type="text" name="email" id="email" class="form-control" placeholder="Email"><br/>
      <input type="text" name="contactno" id="contactno" class="form-control" placeholder="ContactNo"><br/>
      <input type="text" name="address" id="address" class="form-control" placeholder="Address"><br/>
      <input type="text" name="residenceCity" id="residenceCity" class="form-control" placeholder="City"><br/>
      <input type="text" name="residenceCountry" id="residenceCountry" class="form-control" placeholder="Country"><br/>
      <input type="text" name="Age" id="Age" class="form-control" id="age" placeholder="Age"><br/>
      <input type="text" name="seatCode" id="seatCode" class="form-control" readonly value=<?php echo $_GET['seatCode'];?> ><br/>
      <input type="text" name="flightNo" id="flightNo" class="form-control" readonly value=<?php echo $_GET['flightNo'];?> ><br/>
      <input type="text" name="date" id="date" class="form-control" readonly value=<?php echo $_GET['date'];?> ><br/>
      <input type="text" name="day" id="day" class="form-control" readonly value=<?php echo $_GET['day'];?> ><br/>
      <input type="text" name="time" id="time" class="form-control" readonly value=<?php echo $_GET['time'];?> ><br/>
      <input type="text" name="grossFare" id="grossFare" class="form-control" readonly value=<?php echo $_GET['grossFare'];?> ><br/>
      <b><label class="control-label">Infant</label></b>
      <input type="checkbox" class="form-control" name="infant" value="infant"></input>
      <br>
      <button type="submit" name="confirm" class="btn btn-primary" id="ab1">Confirm Ticket</button>
   </form>
   </div>
   </div>
    </div>
  </center>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./jquery.validate.min.js"></script>
    <script type="text/javascript">  
          $(function() {
  //document.getElementById("seatCode").disabled = true;
  //document.getElementById("flightNo").disabled = true;
  //document.getElementById("grossFare").disabled = true;
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='confirmTicket']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstname: "required",
      lastname: "required",
      address: "required",
      residenceCity: "required",
      residenceCountry: "required",
      contactno:{
        required: true,
        minlength: 10,
        maxlength: 10,
        digits:true,
      },
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      Age: {
        required: true,
        digits: true,
        min: 2,
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      contactno:{
        required: "Please provide a contact no",
        minlength: "Enter only 10 digits",
        maxlength: "Enter only 10 digits",
        digits: "Characters not allowed"
      },
      address: "Please enter address",
      residenceCity: "Please enter city of residence",
      residenceCountry: "Please enter country of residence",
      email: "Please enter a valid email address",
      Age: "Enter a valid age"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
    </script>  
</body>
</html>