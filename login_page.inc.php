<!DOCTYPE html>
<?php
$page_title = "login.php";

include_once('includes/header.php');
include_once('classes/UserDAO.class.php');


$udao = new UserDAO();

        /*if (isset(filter_input([INPUT_POST,'user'])))
        {
            echo "<h2>".$page_title."</h2>";
        }
         * *
         */
        /*if (isset($_SESSION['connectee']))
        {

        }

         */


if (isset($_POST['user']) && isset($_POST['pass']))
{
    
    $username = filter_input(INPUT_POST, 'user');
    $password = filter_input(INPUT_POST,'pass');
    
    $user = $udao->find($username);
    
    if ($user!= NULL)
    {        
        echo "<br> User est: ".$user."<br>";
        echo "<br>Password entre est: ".$password."<br>";
        echo "<br> User get email est: ".$user->getEmail()."<br>";
        echo "<br> User get password est: ".$user->getPass()."<br>";
        if ($password == $user->getPass())
        {
            echo "<h2> Bravo oui c correct</h2>";
            $_SESSION["connectee"] = $_REQUEST["user"];
            $_SESSION['start'] = time(); // taking now logged in time
            $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ; // ending a session in 1 min 
            header("Location: http://localhost/forumCarl/index.php");
            die();
            
        }
        else
        {
            echo "<h2 class='error'> Mot de passe invalide</h2>";
        }
    }
    else
    {
        echo"<h2 class='error'> Utilisateur n'existe pas</h2>";
    }

    
    
    
}



echo "<form action='' method='post'>
        
    <table>
        <tr>
            <td>Username: </td>
            <td><input type='text' name='user'> </input> </td>
        </tr>
            
        <tr>
            <td>Password: </td>
            <td><input type='password' name='pass' </td>
        </tr>
        <tr>
            <td>
            <input type='submit' name='soumis' value='piton'></input>
            <input type='hidden' name='sub' value='TRUE'></input>
            </td>
        </tr>
        
        
        
     </table>   
</form>";





include_once('includes/footer.php');
?>
