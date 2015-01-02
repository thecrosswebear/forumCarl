<?php
//include_once('./Database.class.php'); 
//include_once('./User.class.php'); 
//include_once('./Liste.class.php');

include_once('./classes/Database.class.php');
include_once('./classes/User.class.php'); 
include_once('./classes/Liste.class.php');



class UserDAO

     
{	
	public function create($user) {
/*		$request = "INSERT INTO `magasin`.`produit` (`NUM` ,`DESIGN` ,`PRIXUNIT`)".
				" VALUES ('".$x->getNum()."','".$x->getDesignation()."','".$x->getPrixUnit()."')";
*/		$request = "INSERT INTO users (username, pass,first_name, last_name, email, registration_date)"
			." VALUES ('".$user->getUsername()."','".$user->getPass().
                                "','".$user->getFirst_name()."','".$user->getLast_name()."','".$user->getEmail()."'"
                        .", NOW())";
                  
                

               //$request = "INSERT INTO users(username, pass, first_name, last_name, email, registration_date) 
               //VALUES ('Saral','passwor5454', 'xoeliot', 'smith', 'sara@gmail.com', NOW())";
		try
		{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}

	public static function findAllLimit($start, $display)
	{
		try {
			
                        $liste = new Liste();
                        $tab = array();
		
			$requete = 'SELECT * FROM users LIMIT '.$start.", ".$display;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
                        foreach($res as $row) 
                        {
                                    $p = new User();
                                    $p->loadFromRecord($row);
                                    $liste->add($p);
                                    array_push($tab,$p);
                                    
                        }
			$res->closeCursor();
		    $cnx = null;
                    //return $liste;
                    return $tab;
		} catch (PDOException $e) {
		    //print "Error!: " . $e->getMessage() . "<br/>";
		    //return $liste;
                    return $tab;
		}	
	}
        
        public static function countAll()
        {
            $requete = "SELECT COUNT(user_id) FROM users";
            $cnx = Database::getInstance();
            $resultat = $cnx->query($requete);
            $row = $resultat->fetch(PDO::FETCH_NUM);
            return $row[0];
            
        }
        public static function findAll($orderBy="user_id")
	{
            $_REQUEST['penis']="calice de tabarnak";
            
		try {
			//$liste = new ListeUser();
                        $liste = new Liste();
                        $tab = array();
		
			$requete = "SELECT * FROM users ORDER BY ".$orderBy;
			$cnx = Database::getInstance();
			
			$res = $cnx->query($requete);
		    foreach($res as $row) {
				$p = new User();
				$p->loadFromRecord($row);
                                array_push($tab,$p);
				$liste->add($p);
		    }
			$res->closeCursor();
		    $cnx = null;
			//return $liste;
                        return $tab;
		} catch (PDOException $e) {
		    //print "Error!: " . $e->getMessage() . "<br/>";
		    //return $liste;
                    return $tab;
		}	
	}

	public static function find($username)
	{
		$db = Database::getInstance();

		$pstmt = $db->prepare("SELECT * FROM users WHERE username = :x");//requ�te param�tr�e par un param�tre x.
		$pstmt->execute(array(':x' => $username));
		
		$result = $pstmt->fetch(PDO::FETCH_OBJ);
		$p = new User();

		if ($result)
		{
                    
			$p->setUser_id($result->user_id);
                        $p->setPass($result->pass);
			$p->setUsername($result->username);
                        $p->setFirst_name($result->first_name);
                        $p->setLast_name($result->last_name);
                        $p->setEmail($result->email);
			$p->setRegistration_date($result->registration_date);
			$pstmt->closeCursor();
			return $p;
		}
		$pstmt->closeCursor();
		return null;
	}
	
	public function update($user) {
		/*$request = "UPDATE users SET titre = '".$x->getTitre()."', idUtilisateur = '".$x->getIdUser()."'".
				" WHERE numero = '".$x->getNum()."'";*/
                 
                /*private $user_id;
                private $username;
                private $pass;
                private $first_name;
                private $last_name;
                private $email;
                private $registration_date;
                */
            
                 $request = "UPDATE users SET username = '".$user->getUsername()."', pass = '".$user->getPass()
                         ."',first_name = '".$user->getFirst_name()."', last_name = '".$user->getLast_name()
                         ."', email = '".$user->getEmail()."', registration_date = '".$user->getRegistration_date()
                         ."'"." WHERE user_id = '".$user->getUser_id()."'";
		try
		{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	public function delete($user) {
		$request = "DELETE FROM users WHERE user_id = '".$user->getUser_id()."'";
		try
		{
			$db = Database::getInstance();
			return $db->exec($request);
		}
		catch(PDOException $e)
		{
			throw $e;
		}
	}
	
}
?>