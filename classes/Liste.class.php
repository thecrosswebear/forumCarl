<?php
require_once('./classes/Navigable.interface.php');

class Liste implements Navigable {
	private $things;
	private $current = -1;

	public function __construct()	//Constructeur
	{
		$this->things = array();
	}	
	
	public function add($livre)
	{
			array_push($this->things,$livre);
	}
	
	public function previous()
	{
		if ($this->current>0)
		{
			$this->current--;
			return true;
		}
		return false;
	}
	public function next()
	{
		if ($this->current<count($this->things)) 
		{
			$this->current++;
			return true;
		}
		return false;
	}
        
	public function printCurrent()
	{
			if (isset($this->things[$this->current]))
				echo $this->things[$this->current];
	}
	public function getCurrent()
	{
		if (isset($this->things[$this->current]))
			return $this->things[$this->current];
		return null;	
	}	
}
?>