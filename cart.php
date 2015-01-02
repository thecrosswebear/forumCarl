<!DOCTYPE html>
<?php

    $page_title = "My Cart";
    
    include_once('includes/header.php');
    include_once('classes/UserDAO.class.php');
    $dao = new UserDAO();
    
    echo "<h2>".$page_title."</h2>";
    
    if (isset($_SESSION['connectee']))
    {
        echo "<h3> User: ".$_SESSION['connectee']."</h3>";
    ?>
   
        <?php
            
            if(!isset($_SESSION['cart'])) 
            {
                echo "<br>Le panier est vide!<br>";
            }
            //echo "<table><tr><th>id</th><th>quantity</th><th>remove from cart</th></tr>";
            else
            {
                ?> <table class='myTable'>
                <tr>
                    <th> User id</th>
                    <th> Username </th>
                    <th> Quantity </th>
                    <th> Remove from cart </th>
                </tr>
                <!--<tr>-->
                 <?php
                
                foreach($_SESSION['cart'] as $product => $quantity)
                //foreach($_SESSION['cart'] as $item)
                {
                        $u = $dao->find($product);
                        $userId = $u->getUser_id();
                    //echo "<tr><td> ".$item."</td></tr>";
                    echo "<tr><td> ".$userId."</td><td>".$product."</td><td>".$quantity."</td>"
                            ."<td><a href='?remove=".$product."'>remove from cart</a></td></tr>";
                    

                }
            }
            echo "</table>";
            
            
        }
    
        else
        {
            echo "vous avez accedez a cette page par erreur!";
        }
        ?>
        
    
    <?php
    include_once('includes/footer.php');
    ?>