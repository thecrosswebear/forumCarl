<?php

class User
{
   
    
    
    private $user_id;
    private $username;
    private $pass;
    private $first_name;
    private $last_name;
    private $email;
    private $registration_date;
    
    public function __construct($user_id="XXX000")
    {
        $this->user_id = $user_id;
        
        
    }
    function getUser_id()
    {
        return $this->user_id;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPass()
    {
        return $this->pass;
    }

    function getFirst_name()
    {
        return $this->first_name;
    }

    function getLast_name()
    {
        return $this->last_name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getRegistration_date()
    {
        return $this->registration_date;
    }

    function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function setUsername($username)
    {
        $this->username = $username;
    }

    function setPass($pass)
    {
        $this->pass = $pass;
    }

    function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setRegistration_date($registration_date)
    {
        $this->registration_date = $registration_date;
    }

       
    
     public function __toString()
	{
		return "User[".$this->user_id.",".$this->username.",".$this->pass.",".$this->first_name.",".$this->last_name.",".$this->email.",".$this->registration_date."]";
	}
	public function affiche()
	{
		echo $this->__toString();
	}
	public function loadFromRecord($ligne)
	{
		$this->user_id = $ligne["user_id"];
		$this->username = $ligne["username"];
		$this->pass = $ligne["pass"];
                $this->first_name = $ligne["first_name"];
                $this->last_name = $ligne["last_name"];
                $this->email = $ligne["email"];
                $this->registration_date = $ligne["registration_date"];
                
	}
    
}
