<?php
$page_title = "Register User";


include_once ('includes/header.php');
include_once('./classes/User.class.php');


include_once('./classes/UserDAO.class.php');

?>
<h3> <?php echo"$page_title" ; ?></h3>


<?php 
    
            if (isset($_POST['inscription']))
        {
            
            
            if (isset($_POST['username']) && isset($_POST['pass1']) && isset($_POST['pass2'])
                    && isset($_POST['firstName'])&& isset($_POST['lastName']) && isset($_POST['courriel']))
            {
                
                //echo "oui tout est sette";
                if ($_POST['pass1'] == $_POST['pass2'])
                {
                    $udao = new UserDAO();
                    //echo"<br>dao creer<br>";
                    //echo"calice";
                    
                    //$user = new User($_POST["username"]);
                    
                    $user = new User(32);
                    $user->setUsername($_POST['username']);
                    $user->setFirst_name($_POST['firstName']);
                    $user->setLast_name($_POST['lastName']);
                    $user->setPass($_POST['pass1']);
                    $user->setEmail($_POST['courriel']);
                    //$user->setRegistration_date("caca");
                    /*echo "<br>userID utilisateur: ".$user->getUser_id()."<br>";
                    echo "<br>Username utilisateur: ".$user->getUsername()."<br>";
                    echo "<br>Firstname utilisateur: ".$user->getFirst_name()."<br>";
                    echo "<br>Lastname utilisateur: ".$user->getLast_name()."<br>";
                    echo "<br>Password utilisateur: ".$user->getPass()."<br>";
                    echo "<br>Email utilisateur: ".$user->getEmail()."<br>";
                    echo "<br>Registration date: ".$user->getRegistration_date()."<br>";
                    */
                    //$user = $udao->find($_POST['username']);
                    if ($udao->create($user))
                    {
                        echo"<div class='changement'>";
                        echo"<br>User ".$_POST['username']." has been created!<br>";
                        echo "</div>";
                        $_POST = array();
                        //$_POST[] = []; 
                        
                    }
                    else
                    {
                        echo"<br> MARCHE PAS DANS LE DAO CREATE<br>";
                        
                    }
                    /*$user = $udao->find($user->getUsername());
                            if ($user != NULL)
                            {
                             //ajouter utilisateur ici...   
                                echo"<br>nom utilisateur libre<br>";
                                /*$user = new User($_REQUEST["username"]);
                                $user->setPasswordComix($_REQUEST["password"]);
                                $user->setNom($_REQUEST["nom"]);
                                $user->setPrenom($_REQUEST["prenom"]);
                                $user->setType($_REQUEST["type"]);
                                 
                                 
                
                            //$udao->create($user);
                                
                                
                                
                            }
                            else { echo "<p class='error'>The username is already taken<p>";}
                            */    
                    
                }
                else
                {
                    echo "<p class='error' >Passwords aren't identical</p>";
                }
                
            }
            else
            {
                echo "<br>we are missing some info<br>";
            }
            
        }
    
       
        
        
  


?>






<div id="formRegister">
<form action='' method='POST'>
    <fieldset><legend> Enter your information</legend>
        <table>
            <tr> <td> Username: </td> <td><input type='text' name='username' value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"/></td></tr>
            <tr><td> Password once: </td> <td><input type='password' name='pass1' /></td></tr>
            <tr><td> Password second: </td> <td><input type='password' name='pass2'/></td></tr>
            <tr><td> First name: </td> <td><input type='text' name='firstName' value="<?php if(isset($_POST['firstName']))echo $_POST['firstName'];?>"/></td></tr>
            <tr><td> Last name: </td> <td><input type='text' name='lastName' value="<?php if (isset($_POST['lastName']))echo $_POST['lastName']; ?>"/></td></tr>
            <tr><td> Email: </td> <td><input type='email' name='courriel' value="<?php if (isset($_POST['courriel']))echo $_POST['courriel']; ?>"/></td></tr>
        </table>
        <input name="inscription" value="true" type="hidden" />
        <input type="submit" value="OK"/>
        
		
        
    </fieldset>    
</form>
</div>





<?php include('includes/footer.php'); ?>


        


