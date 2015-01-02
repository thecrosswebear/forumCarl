<!DOCTYPE html>

<?php $page_title = "View users"; 
    include_once 'includes/header.php';
    include_once('./classes/UserDAO.class.php');
    echo "<h3>".$page_title."</h3>";
    $udao = new UserDAO();
    
   
    echo "<br>joyeux noel<br>";
       
    if (isset($_GET['delete']))
    {
        
        
                
    }

    if (isset($_REQUEST['orderBy']))
    {
        echo "<br>dans le isset de orderBy<br>";
        $orderBy = $_REQUEST['orderBy'];
        $liste=$udao->findAll($orderBy);
         
        
    }
    else
    {
        echo"<br> dans le else de order by<br>";
        //$liste = $udao->findAll();
        $udao = new UserDAO();
        $liste=$udao->findAll();
        echo"<br> dans le else de order by A LA FIN!!!!<br>";
        
    }
    echo "<br>Avant affichage de la table<br>";
    
    echo "<table>";
    echo "    <tr>
            <th> <a href='?orderBy=user_id'> user_id</a> </th>
            <th><a href='?orderBy=username'> username</a> </th>
            <th><a href='?orderBy=pass'> password </a> </th>
            <th> <a href='?orderBy=first_name'> First name </a> </th>
            <th> <a href='?orderBy=last_name'> Last name </a> </th>
            <th> <a href='?orderBy=email'> Email </a> </th>
            <th> <a href ='?orderBy=registration_date'> Registration date </a> </th>
            <th> Delete </th>
            <th> Update </th>
        </tr>";
    
    
    
        //echo "dans le tab request: ".$_REQUEST['penis'];
    
        //while($liste->next())
        foreach($liste as $u)
        {
            //$u = new User();
            //$u = $liste->getCurrent();
            echo "<tr><td>".$u->getUser_id()."</td><td>".$u->getUsername()."</td><td>".$u->getPass()."</td>"
                    ."<td>".$u->getFirst_name()."</td><td>".$u->getLast_name()."</td><td>".$u->getEmail()."</td>".
                    "<td>".$u->getRegistration_date()."</td><td><a href='delete_user.php?username=".$u->getUsername()."'>Delete</a></td>"
                    ."<td><a href='update_user.php?username=".$u->getUsername()."'>Update</a></td></tr>";
                        
            
        }

        //echo "fin de la table";

    echo "</table>"; 
    
    //a href='delete_user.php?username="
    
    //echo "<br>a la fin de la classe<br>";
    
    
    include_once('includes/footer.php');
    
?>

