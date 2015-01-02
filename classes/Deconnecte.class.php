<?php
session_start(); 

class Deconnecte
{
    //private static $instance = null; 
    
    //private  function __construct(){}
    
    public static function loggaUt()
    {
        UNSET($_SESSION["connectee"]);
        
	
        session_destroy();
        header("Location: http://localhost/forumCarl/index.php");
        
        
	
        //session_destroy();
        
    }
}
 ?>