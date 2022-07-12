<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Banking Sytem</title>
  </head>
  <body class="bg-image" 
     style="background-image: url('background.png');">
    <h1 class="text-center mt-8">WELCOME TO BANK MANAGEMENT SYSTEM</h1>
    <br>
    
    <div class="row">
  <div class="col-sm-4">
    <div class="card text-white bg-primary">
      <div class="card-body">
        <h5 class="card-title">Customer</h5>
        <p class="card-text"> For a person a person to be known as a customer of the bank there must be either a current account or any sort of deposit account like a loan account or some similar relation.</p>
        <a href="sLogin.php" class="btn btn-success">Customer Login</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-dark">
      <div class="card-body">
        <h5 class="card-title">Bank Advisor</h5>
        <p class="card-text">A financial advisor is a professional who provides expertise for clients' decisions around money matters, personal finances, and investments. Financial advisors may work as bank agents.</p>
        <a href="hLogin.php" class="btn btn-success">Advisor Login</a>
      </div>
    </div>
  </div>

<div class="col-sm-4">
    <div class="card text-white bg-warning">
      <div class="card-body">
        <h5 class="card-title">Bank Admin</h5>
        <p class="card-text">An Administrator provides office support to either an individual or team and is vital for the smooth-running of a business. Their duties may include managing pannel whole bank pannel. </p>
        <a href="aLogin.php" class="btn btn-success">Admin Login</a>
      </div>
    </div>
  </div>
</div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>