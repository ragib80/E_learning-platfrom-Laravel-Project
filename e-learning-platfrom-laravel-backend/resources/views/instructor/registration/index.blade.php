<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sign Up #7</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="img/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign Up</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            </div>
            <form  method="post">
            @csrf
              <div class="form-group first">
                <label for="fullname">Full name</label>
                <input type="text" class="form-control" id="fullname" name="full_name">

              </div>
              <div class="form-group first">
                <label for="fullname">User name</label>
                <input type="text" class="form-control" id="username" name="username">

              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"> 

              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                
              </div>
              <div class="form-group last mb-4">
                <label for="re-password">Re-type Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                
              </div>
              <div class="form-group last mb-4">
                <label for="re-password">Address </label>
                <input type="text" class="form-control" id="address" name="address">
                
              </div>
              <div class="form-group last mb-4">
                <label for="re-password"> country</label>
                <input type="text" class="form-control" id="country" name="country">
                <div class="form-group last mb-4">
                <label for="dob">Date Of Birth</label>
                <input type="date" class="form-control" id="type" name="dob">
                
              </div>
              </div>
              <div class="form-group last mb-4">
                <label for="re-password">Type </label>
                <input type="text" class="form-control" id="type" name="type">
                
              </div>
              </div>
              


              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Creating an account means you're okay with our <a href="#">Terms and Conditions</a> and our <a href="#">Privacy Policy</a>.</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
              </div>

              <input type="submit" value="Register" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted">&mdash; or register with &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            @foreach ( $errors->all() as $er)
    <p>{{ $er }}</p><br>
@endforeach
<p>{{ session("err") }}</p>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>