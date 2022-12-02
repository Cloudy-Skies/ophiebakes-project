<?php
require('../controllers/customer_controller.php');
require('../settings/core.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    //store all data
    $customer = select_one_customer_controller($email);
    
   //check if the email exists in the database.
    if (empty($customer)){
        echo ("<script>alert('The email or password is incorrect'); window.location.href = '../view/true-auth-normal-sign-in.php';</script>");
    }
    // verify if the password is from the database.
    else{
        if (password_verify($password, $customer['customer_pass'])){
            $_SESSION['user_id'] = $customer['customer_id'];
            $_SESSION['user_role'] = $customer['user_role'];
            $_SESSION['customer_email'] = $customer['customer_email'];
            
            //check if the user is an admin; admin = 1, if the person is a customer = 2
            if ($_SESSION['user_role'] == 1){
                
                header("Location: ../admin/brands.php");
            }
            
            if ($_SESSION['user_role'] == 2){
                header("Location: ../view/cart.php");// this will take the customer to a new page
                }
        }
        
        else{
            echo "<script>alert('The email or password is incorrect');window.location.href = 'login.php';</script>";
        }
    }	

}