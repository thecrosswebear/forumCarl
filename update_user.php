<!DOCTYPE html>

<?php

$page_title = "Update user: ";
include_once('includes/header.php');
include_once('./classes/UserDAO.class.php');
echo "<h3>".$page_title.$_GET['update']."</h3>";

$udao = new UserDAO();
$username = $_GET['username'];

$user = $udao->find($username);
echo "<br> resultat du find au debut: ".$user."<br>";

if (isset($_POST['action']))
{
    if ($_POST['action']== 'miseajour')
    {
        //$user_id= $_POST['userId'];
        $password = $_POST['password'];
        $firstname= $_POST['firstname'];
        $lastname= $_POST['lastname'];
        $email = $_POST['email'];
        //echo "<h3> Oui cest setter l'action mise a jour</h3>";
        //$user = new User($user->getUser_id());
        $user->setPass($password);
        $user->setFirst_name($firstname);
        $user->setLast_name($lastname);
        $user->setEmail($email);
        //echo 'avant update<br>';
        echo "utilisateur: ".$user."<br>";
        /*$request = "UPDATE users SET username = '".$user->getUsername()."', pass = '".$user->getPass()
                         ."',first_name = '".$user->getFirst_name()."', last_name = '".$user->getLast_name()
                         ."', email = '".$user->getEmail()."', registration_date = '".$user->getRegistration_date()
                         ."'"." WHERE user_id = '".$user->getUser_id()."'";
        echo "<br>la requete: ".$request."<br>";
        */
        
        /*try
		{
                        echo "<br>dans le try au debut debut<br>";
			$db = Database::getInstance();
                        echo "<br>dans le try Database::getInstance<br>";
			echo "reussite: ".$db->exec($request);
                        echo "<br>dans le try a la de l'execution de la requete<br>";
		}
		catch(PDOException $e)
		{   
                        echo "<br>dans le catch: ".$e."<br>";
			throw $e;
		}
        
        */
        
        if ($udao->update($user))
        {
            echo "<br> le update dans le if a marche <br>";
        }
        else
        {
            echo '<br>apres update qui na pas marche<br>';
        }
    }
    
}
else
{
   if ($user!=NULL)
    { 
    ?>
        <form action='' method='POST'>
            <table> 
                <tr>
                    <td>
                        User id: 
                    </td>
                    <td>
                        <input type='text' name='userId' value='<?php echo $user->getUser_id(); ?>' disabled></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        Username: 
                    </td>
                    <td>
                        <input type='text' name='username' value='<?php echo $user->getUsername(); ?>' disabled></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type='text' name='password' value='<?php echo $user->getPass(); ?>'></input>
                    </td>
                <tr>
                    <td>
                        Firstname:
                    </td>
                    <td>
                        <input type='text' name='firstname' value='<?php echo $user->getFirst_name(); ?>'></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        Lastname:
                    </td>
                    <td>
                        <input type='text' name='lastname' value='<?php echo $user->getLast_name(); ?>'></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email:
                    </td>
                    <td>
                        <input type='text' name='email' value='<?php echo $user->getEmail(); ?>'></input>
                    </td>

                </tr>

           </table>


            <input name="action" value="miseajour" type="hidden" />
            <input value="OK" type="submit"  />
        </form>
    <?php 
    }
    else
    {
        echo "L'utilisateur n'existe pas";
    }
}




echo "oui PENIS VAGIN VAGIN VAGIN";

include_once('includes/footer.php');
?>
