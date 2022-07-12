<?php 
require 'dbcon.php';
require 'custCode.php';
$email=$_SESSION['email'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Customer</title>
  </head>
  <body>
    <div class="container-fluid vh-100" style="margin-top:100px">
      <div class="d-grid gap-2 d-md-block">
        <center>
          <h1>Hello, <?= $email ?></h1>
          <br>
          <br>
            <button type="button" class="btn btn-dark"  data-bs-toggle="modal" data-bs-target="#viewCustomer">View Profile</button>
            <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#updateCustomer">Update Profile</button>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#transfer">Transfer</button>
            <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#loanApply">Apply For Loan</button>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#transaction">Transaticon History</button>
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#balance">Balance Enquiry</button>
            
            <br>
            <form action="custCode.php" method="POST"><br><button type="submit"  name="block" class="btn btn-warning">Block</button></form>
            <br>
            <a type="button" href="logout.php" class="btn btn-danger">Logout</a>

            <br>
            <a href="index.php" class="btn btn-primary mt-3" type="button">Go to Home Page</a>
          </center>
      </div>
    </div>
      
    <!-- Scrollable modal -->
    <div class="modal fade" id="updateCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="container vh-500">
            <?php include('message.php');?>
                <form action="custCode.php" method="POST">                    
                  <div class="input-group mb-3">
                      <span class="input-group-text bg-primary"><i
                              class="bi bi-person-plus-fill text-white"></i></span>
                      <input type="text" name="name" class="form-control" placeholder="Username">
                  </div>
                  
                  <div class="input-group mb-3">
                      <span class="input-group-text bg-primary"><i
                              class="bi bi-key-fill text-white"></i></span>
                      <input type="password" name="password" class="form-control" placeholder="password">
                  </div>
                  <div class="input-group mb-3">
                      <span class="input-group-text bg-primary"><i
                              class="bi bi-currency-dollar text-white"></i></span>
                      <input type="number" name="account" class="form-control" placeholder="Account Balance" min="1" max="50000000">
                  </div>
                    <div class="d-grid col-12 mx-auto">
                        <button class="btn btn-success" type="submit" name="update"><span></span> Update Account
                      </button>
                    </div>
                </form>                            
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="transfer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transfer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           
            <div class="container vh-500">
            <?php include('message.php');?>
                <form action="custCode.php" method="POST">
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary"><i
                                class="bi bi-currency-dollar text-white"></i></span>
                        <input type="number" name="account" class="form-control" placeholder="Enter Account No." min="1" max="50000000">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary"><i
                                class="bi bi-currency-dollar text-white"></i></span>
                        <input type="number" name="amount" class="form-control" placeholder="Enter your amount" min="1" max="50000000">
                    </div>
                    <div class="d-grid col-12 mx-auto">
                        <button class="btn btn-success" type="submit" name="transfer"><span></span> Send Money
                      </button>
                    </div>
                </form>                            
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="transaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Transaticon History</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>To Account</th>
                    <th>Transaction Time</th>
                    <th>Balance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query="SELECT * FROM customer_transaction where email='$email' ";
                  $run_query=mysqli_query($con,$query);
                  if(mysqli_num_rows($run_query)>0)
                  {
                    foreach($run_query as $student){
                    ?>
                    <tr>
                      <td><?= $student['id']; ?></td>
                      <td><?= $student['email']; ?></td>
                      <td><?= $student['toaccount']; ?></td>
                      <td><?= $student['transactionTime']; ?></td>
                      <td><?= $student['balance']; ?></td>
                      
                    </tr>
                    <?php
                    }
                  }
                  else
                  {
                    echo "<h5>No RRecord Found</h5>";
                  }
                  ?>
                
                </tbody>
              </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="balance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Balance Enquiry </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <?php
              $query="SELECT * FROM customer_info where  email='$email'";
                    $run_query=mysqli_query($con,$query);
                    if(mysqli_num_rows($run_query)>0)
                    {
                      foreach($run_query as $cust){
                        ?>
                        <h4><?= $cust['cname']; ?> your account balance is ₹ <?= $cust['balance']; ?></h4>
                        <?php
                      }
                    }
                    ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="viewCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="container vh-500">
          <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    
                    <th>Balance</th>
                    <th>Loan Status</th>
                    <th>Login Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query="SELECT * FROM customer_info where email='$email' ";
                  $run_query=mysqli_query($con,$query);
                  if(mysqli_num_rows($run_query)>0)
                  {
                    foreach($run_query as $student){
                    ?>
                    <tr>
                      <td><?= $student['id']; ?></td>
                      <td><?= $student['cname']; ?></td>
                      
                      <td><?= $student['balance']; ?></td>
                      <td><?= $student['loanApply']; ?></td>
                      <td><?= $student['status']; ?></td>
                    </tr>
                    <?php
                    }
                  }
                  else
                  {
                    echo "<h5>No RRecord Found</h5>";
                  }
                  ?>
                
                </tbody>
              </table>
                             
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="loanApply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apply For Loan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="container vh-500">
            <?php include('message.php');?>
                <form action="custCode.php" method="POST">
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-primary"><i
                                class="bi bi-currency-dollar text-white"></i></span>
                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount For loan" min="1" max="50000000">
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text bg-primary"><i
                              class="bi bi-key-fill text-white"></i></span>
                      <input type="password" name="password" class="form-control" placeholder="Confirm your Password">
                  </div>
                    <div class="d-grid col-12 mx-auto">
                        <button class="btn btn-success" type="submit" name="loan"><span></span> Apply Loan
                      </button>
                    </div>
                </form>                            
              </div>
                          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>