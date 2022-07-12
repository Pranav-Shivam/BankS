<?php
session_start();
require 'dbcon.php';

if(isset($_POST['register']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $account=mysqli_real_escape_string($con,$_POST['account']);

    $query="INSERT INTO `mydb`.`customer_info` (cname,email,password,balance) VALUES('$name', '$email', '$password', '$account')";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Customer Created Sucessfully ";
        //print_r($run_query);
        header("Location:sLogin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Not Created Sucessfully ";
        header("Location:sRegister.php");
        exit(0);
    }
} 
if(isset($_POST['update']))
{
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $account=mysqli_real_escape_string($con,$_POST['account']);
    $email=$_SESSION['email'];
    $bal=0;
    $query1="SELECT * FROM `mydb`.`customer_info` where email='$email' ";
    $run_query1=mysqli_query($con,$query1);
    if(mysqli_num_rows($run_query1)>0)
    {
        foreach($run_query1 as $cust){
            $bal=$cust['balance'];
        }
    }
    $send=$bal+$account;
    $query="UPDATE `mydb`.`customer_info` SET cname='$name',password='$password',balance='$send' WHERE email='$email' ";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Customer Updated Sucessfully ";
        //print_r($run_query);
        header("Location:customer.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Not Updated Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
} 
if(isset($_POST['login']))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    $status="UNBLOCK";
    $select = " SELECT * FROM `mydb`.`customer_info` WHERE email = '$email' && password = '$password' && status='$status' ";

    
    $run_query=mysqli_query($con,$select);
    
    if(mysqli_num_rows($run_query) > 0)
    {
        $_SESSION['message']="Customer Login Sucessfully ";
        $_SESSION['email']=$email;
        //print_r($run_query);
        header("Location:customer.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Can Not Login Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
}
if(isset($_POST['transfer']))
{
    $account=mysqli_real_escape_string($con,$_POST['account']);
    $amount=mysqli_real_escape_string($con,$_POST['amount']);
    $email=$_SESSION['email'];
    $bal=0;
    $query="SELECT * FROM `mydb`.`customer_info` where email='$email' ";
    $run_query=mysqli_query($con,$query);
    if(mysqli_num_rows($run_query)>0)
    {
        foreach($run_query as $cust){
            $bal=$cust['balance'];
        }
    }
    $send=$bal-$amount;
    if($send>0)
    {
        $query1="INSERT INTO `mydb`.`customer_transaction` (email,toaccount,balance) VALUES( '$email',$account, '$send')";
        $run_query1=mysqli_query($con,$query1);

        $query2="UPDATE `mydb`.`customer_info` SET balance='$send' WHERE email='$email' ";
        $run_query2=mysqli_query($con,$query2);
        
        if(!$run_query2)
        {
            $_SESSION['message']="Amount Send Not  Sucessfully ";
            header("Location:customer.php");
            exit(0);
        }
        
        if($run_query1)
        {
            $_SESSION['message']="Amount Send Sucessfully ";
            //print_r($run_query);
            header("Location:customer.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Amount Send Not  Sucessfully ";
            header("Location:customer.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']=" Amount is Over Limit ";
            header("Location:customer.php");
            exit(0);
    }
} 
if(isset($_POST['block']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['block']);
    $query="SELECT * FROM customer_info WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="BLOCK";
        $query1="UPDATE `mydb`.`customer_info` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Blocked Sucessfully ";
            //print_r($run_query);
            header("Location:index.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Blocked Sucessfully ";
            header("Location:customer.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Not Blocked Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
}
if(isset($_POST['loan']))
{
    $amount=mysqli_real_escape_string($con,$_POST['amount']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    
    $email=$_SESSION['email'];
    
    $query="UPDATE `mydb`.`customer_info` SET loanApply='YES' WHERE password='$password' and email=$email ";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Customer Loan Applied Sucessfully ";
        //print_r($run_query);
        header("Location:customer.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:sLogin.php");
        exit(0);
    }
}
?>