<!DOCTYPE html>
<?php
    $page_title = 'Products';
    //session_start();
    
    include_once ('includes/header.php');
    include_once('classes/UserDAO.class.php');
    $udao = new UserDAO();
    $liste = $udao->findAll();
    
    echo '<h2>'.$page_title.'</h2>';
    
    
    
    
    if (isset($_GET['addCart']))
    {
        $item = $_GET['addCart'];
        
        if(!isset($_SESSION['cart'])) 
        {
            $_SESSION['cart'] = array();
        }
        
        if (isset($_SESSION['cart'][$item]))
        {
            //$_SESSION['cart'][$item]['quantity']++;
            //$_SESSION['cart'][$pid]['quantity']++; 
            $_SESSION['cart'][$item]++;
            echo "<h3 class=changement> Additional Item ".$item." has been added to cart.</h3>";
        }
        else
        {     //$quantity = 1;        
             //$_SESSION ['cart'][$item] = $item;
            $_SESSION ['cart'][$item]= 1;
            echo "<h3 class=changement> Item ".$item." has been added to cart.</h3>";
        }
        
       
        
        
        foreach($_SESSION['cart'] as $myItem)
            {
                
                echo "<br>item: ".$myItem."<br>";
            }
        
        /*for ($i=0;$i<count($_SESSION['cart']);$i++){

            echo "<br>avec un for".$_SESSION['cart'][$i]."<br>";
        }
         * */
         
}
      
    ?>

    

<table   style ='width: 100%'class='myTable'>
    <tr>
        <th>User id</th>
        <th>Username</th>
        <th>Password</th>
        <th>first name</th>
        <th>last name</th>
        <th>email</th>
        <th>registration date</th>
        <th>Add to cart</th>
    </tr>

    <?php
        
        
        foreach ($liste as $u)
        {
            
            /*echo"<tr><td>".$user->getUser_id()."</td><td>".$user->getFirst_name()."</td><td>".$user->getLast_name().
                    "</td><td>".$user->getEmail()."</td><td>".$user->getRegistration_date()."</td>.".
                    "<td><a href='?addCart=".$user->getUser_id()."'>add to cart</a></td></tr>";
             * 
             */
            
             echo "<tr><td>".$u->getUser_id()."</td><td>".$u->getUsername()."</td><td>".$u->getPass()."</td>"
                    ."<td>".$u->getFirst_name()."</td><td>".$u->getLast_name()."</td><td>".$u->getEmail()."</td>".
                    "<td>".$u->getRegistration_date()."</td><td><a href='?addCart=".$u->getUsername()."'>add to cart</a></td>";
                   // ."<td><a href='update_user.php?username=".$u->getUsername()."'>Update</a></td></tr>";
            
            
        }
         
         
    
    
    ?>
    
   
</table>
    
   
    
    
    
    
    
    
    
    
    
    
    
    <?php
    
    include_once ('includes/footer.php');



?>