<!doctype html>
<html lang="en">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Passenger Sign up</title>
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
    <img src="download.jpg" class="card-img-top">
   
   <div class="card-body"> 
   
   <form class="form-group" name="registration" action="func7.php" method="post">
      <input type="text" name="firstname" id="firstname" class="form-control" placeholder="FirstName"><br/>
      <input type="text" name="lastname" id="lastname" class="form-control" placeholder="LastName"><br/>
      <input type="text" name="email" id="email" class="form-control" placeholder="Email"><br/>
      <input type="text" name="contactno" id="contactno" class="form-control" placeholder="ContactNo"><br/>
      <input type="text" name="address" id="address" class="form-control" placeholder="Address"><br/>
      <input type="text" name="residenceCity" id="residenceCity" class="form-control" placeholder="City"><br/>
      <input type="text" name="residenceCountry" id="residenceCountry" class="form-control" placeholder="Country"><br/>
      <input class="form-control" name="birth_date" id="birth_date" required type="date"><br>
      <input type="text" name="IdentificationNo" id="IdentificationNo" class="form-control" placeholder="IdentificationNo"><br/>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password"><br/>
      <button type="submit" name="Signup" class="btn btn-primary" id="ab1">Sign Up</button>
   </form>
   </div>
   <a href='index2.php'>Employee Login</a>
   <a href='index.php'>Log In</a>
   </div>
    </div>
  </center>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="./jquery.validate.min.js"></script>
    <script type="text/javascript">  
          $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
        var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear()-12;
      if(dd<10){dd='0'+dd;} 
      if(mm<10){mm='0'+mm;} 
      var today = yyyy+'-'+mm+'-'+dd;

  $("form[name='registration']").validate({
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
      password: {
        required: true,
        minlength: 5
      },
      IdentificationNo: {
        required: true,
        minlength: 6,
        maxlength: 6,
        digits: true,
      },
      birth_date: {
        required: true,
        date : true,
        max: today,
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      contactno:{
        required: "Please provide a contact no",
        minlength: "Enter only 10 digits",
        maxlength: "Enter only 10 digits",
        digits: "Characters not allowed"
      },
      address: "Please enter address",
      residenceCity: "Please enter city of residence",
      residenceCountry: "Please enter country of residence",
      IdentificationNo: {
        required: "Please provide a password",
        minlength: "Please provide a valid Identification No",
        digits: "Only digits are allowed in Identification No"
      },
      email: "Please enter a valid email address",
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