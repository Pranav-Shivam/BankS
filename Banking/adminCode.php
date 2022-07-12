<?php
session_start();
require 'dbcon.php';

//admin login 
if(isset($_POST['alogin']))
{
    $email=mysqli_real_escape_string($con,$_POST['aemail']);
    $password=mysqli_real_escape_string($con,$_POST['apassword']);
    
    $select = " SELECT * FROM `mydb`.`bank_admin` WHERE email = '$email' && password = '$password' ";

    
    $run_query=mysqli_query($con,$select);
    
    if(mysqli_num_rows($run_query) > 0)
    {
        $_SESSION['message']="Admin Login Sucessfully ";
        $_SESSION['email']=$email;
        //print_r($run_query);
        header("Location:admin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Admin Can Not Login Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
} 
//block bank advisory
if(isset($_POST['block']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['block']);
    $query="SELECT * FROM bank_advisory WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="BLOCK";
        $query1="UPDATE `mydb`.`bank_advisory` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Advisor Blocked Sucessfully ";
            //print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Advisor Not Blocked Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Advisor  Not Blocked Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
//unblock bank advisory
if(isset($_POST['unblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['unblock']);
    $query="SELECT * FROM bank_advisory WHERE id='$cust_id' ";  
    $query_run=mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        $customer=mysqli_fetch_array($query_run);
        
        $status="UNBLOCK";
        $query1="UPDATE `mydb`.`bank_advisory` SET status='$status' WHERE id='$cust_id' ";
        $run_query1=mysqli_query($con,$query1);
        
        if($run_query1)
        {
            $_SESSION['message']="Advisor Unblock Sucessfully ";
            //print_r($run_query);
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Advisor Not Unblock Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Advisor Not Unblock Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 


//CUstomer
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
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:aLogin.php");
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
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Loan Not Applied Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['cblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cblock']);
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
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Blocked Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer  Not Blocked Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
if(isset($_POST['cunblock']))
{
    $cust_id=mysqli_real_escape_string($con,$_POST['cunblock']);
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
            header("Location:admin.php");
            exit(0);
        }
        else{
            $_SESSION['message']="Customer Not Unblock Sucessfully ";
            header("Location:aLogin.php");
            exit(0);
        }
    }
    else{
        $_SESSION['message']="Customer Not Unblock Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
}
if(isset($_POST['hRegister']))
{
    
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);
    

    $query="INSERT INTO `mydb`.`bank_advisory` (email,password) VALUES( '$email', '$password')";
    $run_query=mysqli_query($con,$query);
    
    if($run_query)
    {
        $_SESSION['message']="Advisor Created Sucessfully ";
        //print_r($run_query);
        header("Location:admin.php");
        exit(0);
    }
    else{
        $_SESSION['message']="Advisor Not Created Sucessfully ";
        header("Location:aLogin.php");
        exit(0);
    }
    
} 
 ?>