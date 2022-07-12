<?php 
require 'dbcon.php';
require 'advisoryCode.php';
$email=$_SESSION['email'];
$x=strcasecmp($email,"advisory@banking.com");
//echo $email;
if($x!=0)
{
    header("Location:hLogin.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Advisor</title>
  </head>
  <body>
 
      <div class="row">
        <div class="col-md-12">
        <?php include('message.php');?>
          <div class="card">
            <div class="card-header">
              <h4>
                Student Details
                <a href="sRegister.php" class="btn btn-primary float-end">Add Customer</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Loan Apply</th>
                    <th>Login Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query="SELECT * FROM customer_info ";
                  $run_query=mysqli_query($con,$query);
                  if(mysqli_num_rows($run_query)>0)
                  {
                    foreach($run_query as $student){
                    ?>
                    <tr>
                      <td><?= $student['id']; ?></td>
                      <td><?= $student['cname']; ?></td>
                      <td><?= $student['email']; ?></td>
                      <td><?= $student['balance']; ?></td>
                      <td><?= $student['loanApply']; ?></td>
                      <td><?= $student['status']; ?></td>
                      <td>
                      <form action="advisoryCode.php" method="post" class="d-inline">
                        <button type="submit"name="acceptLoan" value="<?= $student['id']; ?>" class="btn btn-success btn-sm">Accept</button>
                        <button type="submit"name="rejectLoan" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Reject</button>
                        <button type="submit"name="unblock" value="<?= $student['id']; ?>" class="btn btn-info btn-sm">Unblock</button>
                        <button type="submit"name="block" value="<?= $student['id']; ?>" class="btn btn-warning btn-sm">Block</button>
                      </form>
                      </td>
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
        </div>
      </div>
      <center>
            <a href="index.php" class="btn btn-primary mt-3" type="button">Go to Home Page</a></center>
    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>