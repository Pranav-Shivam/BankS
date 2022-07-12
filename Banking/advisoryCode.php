<?php
session_start();
require 'dbcon.php';

 
if(isset($_POST['hlogin']))
{
    $email=mysqli_real_escape_string($con,$_POST['aemail']);
    $password=mysqli_real_escape_string($con,$_POST['apassword']);
    $status="UNBLOCK";
    $select = " SELECT * FROM `mydb`.`bank_advisory` WHERE email = '$email' && password = '$password' && status='$status' ";

    
    $run_query=mysqli_query($con,$select);
    
    if(mysqli_num_rows($run_query) > 0)
    {
        $_SESSION['message']="Advisor Login Sucessfully ";
        $_SESSION['email']=$email;
        //print_r($run_query);
        header("Location:advisory.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Advisor Can Not Login Sucessfully ";
        header("Location:hLogin.php");
        exit(0);
    }
} 
if(isset($_POST['acceptLoan']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['acceptLoan']);
    $query="SELECT * FROM customer_info WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        $loan=$customer['balance']*10;
        $status="YES";
        $query1="UPDATE `mydb`.`customer_info` SET loanApply='$status',balance='$loan' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Loan Applied Sucessfully ";
            //print_r($run_query);
            header("Location:advisory.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
            header("Location:hLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:hLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['rejectLoan']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['rejectLoan']);
    $query="SELECT * FROM customer_info WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="NO";
        $query1="UPDATE `mydb`.`customer_info` SET loanApply='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Loan Canceled Sucessfully ";
            //print_r($run_query);
            header("Location:advisory.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
            header("Location:hLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:hLogin.php");
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
            header("Location:advisory.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Blocked Sucessfully ";
            header("Location:hLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Not Blocked Sucessfully ";
        header("Location:hLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['unblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['unblock']);
    $query="SELECT * FROM customer_info WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="UNBLOCK";
        $query1="UPDATE `mydb`.`customer_info` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Customer Unblock Sucessfully ";
            //print_r($run_query);
            header("Location:advisory.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Unblock Sucessfully ";
            header("Location:hLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Not Unblock Sucessfully ";
        header("Location:hLogin.php");
        exit(0);
    }
    
} 
?>