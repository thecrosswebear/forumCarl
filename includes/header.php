<!DOCTYPE html>


<?php 
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
include_once ('./classes/Deconnecte.class.php');

    if (!ISSET($_SESSION)) 
       {
                session_start();
       }

   if (isset($_REQUEST['logout']))
   {
       Deconnecte::loggaUt();
       
       //echo "<h2> On est logge out</h2>";
   }
   
?>

<div id='header'>
<head>
    <meta>
    </meta>
    
    <title> <?php echo $page_title  ?></title>
    <!--<link href="css/style.css" type="text/css" rel="stylesheet"/>-->
    
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <!--<link href="bootstrap/css/bootstrap.css" type="test/css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="css/main.css" >
  
    <!--<link href="bootstrap/css/bootstrap.css" type="text/css" rel='stylesheet'/>-->
    
    <script src="jquery/jquery-1.11.1.js"></script>
    <script src='jquery-ui-1.11.2/jquery-ui.js'></script>
    <script src="jquery/carlQuery.js"></script>
    <!--<script>
       $( document ).ready(function() {
       $( "a" ).click(function( event ) {
       alert( "The link will no longer take you to jquery.com" );
       event.preventDefault();
       });
       });
    </script>
    -->
</head>
</div>

<body>
    <div id='page-wrap'>
    
        <div id='connect'>
        <?php    
        if (ISSET($_SESSION["connectee"]))
        {    
            echo "Utilisateur: ".$_SESSION["connectee"]; 
        }
        else
        {

           echo "<a href='login_page.inc.php'>se connecter</a>"; 
           //echo"<h3>Contenu de $ _Session: ".$_SESSION['connectee']."</h3>";

        }
         ?>   
        </div>
        <h1>SUPER SITE WEB</h1>
    
        
                <ul class=" nav nav-pills menu-carl">
                    <li><a href ='index.php'> Home </a></li>
                    <li class="active"><a href=''> Forum</a> </li>
                
                
                    <li><a href=''> My Info</a> </li>
                    
                    
                    
                    <?php
                    if (ISSET($_SESSION["connectee"]))
                    {
                        echo "<li><a href='view_users.php'>View Users</a> </li>
                   <li><a href='page_view_users.php'>Page view Users</a></li>";
                        echo "<li><a href='products.php'>products</a></li>";
                     echo "<li><a href='?logout'>logout</a></li>";
                     echo "<li><a href='cart.php'> Shopping cart</a></li>";
                     echo "<li><a href='products2.php'>Product 2 </a></li>";
                     
                     
                    }
                    else
                    {
                        echo "<li><a href='login_page.inc.php'>login</a></li>"
                        . "<li><a href='register_user.php'>Register</a> </li>";
                    }
                    
                    
                    //phpinfo();
                    ?>
                    <li><a href="test_dao.php">test dao</a></li>
        
                </ul>
            
       
    
