<!DOCTYPE html>

<?php

$page_title = "Delete user";

include_once('includes/header.php');
include_once('./classes/UserDAO.class.php');

$errors = array();
echo "<h3> Delete user</h3>";

      $udao = new UserDAO();         

if (isset($_GET['username']) && !isset($_POST['soumis']))
{
    $username = trim($_GET['username']);
    
    //$udao = new UserDAO();
    echo 'LE ISSET $_GET Username est correct APRES LA CREATION DU UserDAO<br>';
    $user = $udao->find($username);
    echo 'JUST APRES LE find username dao<br> '.$user."<br>";
    
    if ($user != NULL)
    {
        echo "<form id='delete' action='' method='POST'>";
        
        echo "<p>Do you really want to delete user: ".$username."? </p>";
        echo"<input type='radio' name='sure' value='yes'>Yes</input>";
        echo"<input type='radio' name='sure' value='no'>No</input>";
        
        echo"<p><input type='submit' name='submit' value='Soumettre'></input></p>";
        echo"<input type='hidden' name='soumis' value='TRUE'/>";
        
        echo"</form>";
              
    }
    else
    {
        $error[]= 'User does not exist!';
    }
    
      
    
}
else
{
    $errors[] = 'No user to delete';
    echo"rentre pas dans le if GET!!!! <br>";
}


if (isset($_POST['soumis']))
{
    if (isset($_POST['sure']))
    {
        echo 'le sure est set<br>';
        if (isset($_GET['username']))
        {
            $username = trim($_GET['username']);
            echo 'USERNAME est :****'.$username."****";
            if ($_POST['sure']== 'yes')
            {
                echo"<h2>On va deleter: ".$username."</h2>";
                //$udao = new UserDAO();
                echo "<h2> APRES LE NEW DAO</h2>";
                //$user_id=$user->getUser_id();
                
                $user = $udao->find($username); 
                //echo "avant le find deuxieme user3";
                //$user3 = $udao->find('tim');
                //echo "avant le find all";
                
                //$liste = $udao->findAll();
                //echo "LE USER id EST APRES LE FIND du deuxieme: ".$user->getUser_id();
                //$udao->delete($user);
                //echo "apres le delete";
                
                if ($user!= NULL)
                {
                    echo"<h3> User ".$user." est pas null</h3>";    
                    //$udao3 = new UserDAO();
                    //echo"<h3> apres creation du udao3333333 JUSTE AVANT LE IF</h3>";  
                   
                       // echo "calide de udao EST PAS NULL<br> Pis le user: ".$user;
                        //$udao->delete($use)
                       if ($udao->delete($user))
                       {
                            //$udao->delete($user);
                            echo"<h3 class='changement'> User ".$username." has been deleted.</h3>";
                       }
                       else
                       {
                            echo"<h3> ua un fuck dans le delete esti</h3>";
                       }
                        
                        
                      
                }
                else
                {
                    echo "<h3 class='error'> Le user est null </h3>";
                }
            }
            else
            {
                echo "<h2 class='error'> Nothing has happened</h2>";
            }
            
            
            
        }
    }
    else
    {
        echo 'sure not set';
    }
}















include_once('includes/footer.php');
?>
