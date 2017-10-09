<?php
Class Sql
{
	protected $db;
	protected $sql;
	protected $selectVal;
	protected $fromVal;
	protected $whereVal;
	protected $insertVal;
	protected $valuesVal;
	protected $deleteVal;
	protected $updateVal;
	protected $setVal;
	
	public function select($what)
	{
		if(!empty($what) && $what !== "*")
		{
			$this->selectVal = "Select $what ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong select values");
		}
	}
	
	public function from($table)
	{
		if(!empty($table))
		{
			$this->fromVal = "from $table ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong from values");
		}
	}
	
	public function where($key, $values)
	{
		if(!empty($key) && !empty($values))
		{
			$this->whereVal = "where $key = '$values' ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong where values");
		}
	}
	
	public function insert($table, $col1, $col2)
	{
		
		if(!empty($table) && !empty($col1) && !empty($col2))
		{
			$this->insertVal = "INSERT INTO $table ($col1, $col2) ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong insert values");
		}
	}
	
	public function values($val1, $val2)
	{
		
		if(!empty($val1) && !empty($val2))
		{
			$this->valuesVal = "VALUES ('$val1', '$val2')";
			return $this;
		}
		else
		{
			throw new Exception("Wrong value values");
		}
	}

	public function delete($table)
	{
		
		if(!empty($table))
		{
			$this->deleteVal = "DELETE FROM $table ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong delete values");
		}
	}
	
	public function update($table)
	{
		
		if(!empty($table))
		{
			$this->updateVal = "UPDATE $table ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong update values");
		}
	}

	public function set($col, $val)
	{
		
		if(!empty($col) && !empty($val))
		{
			$this->setVal = "SET $col='$val' ";
			return $this;
		}
		else
		{
			throw new Exception("Wrong set values");
		}
	}
	
	public function exec()
	{		
		switch(TRUE)
		{
			case(!empty($this->selectVal) && !empty($this->whereVal)): $this->sql = $this->selectVal . $this->fromVal . $this->whereVal; break;
			case(!empty($this->selectVal)): $this->sql = $this->selectVal . $this->fromVal . $this->whereVal; break;
			case(!empty($this->insertVal)): $this->sql = $this->insertVal . $this->valuesVal; break;
			case(!empty($this->deleteVal)): $this->sql = $this->deleteVal . $this->whereVal; break;
			case(!empty($this->updateVal)): $this->sql = $this->updateVal . $this->setVal . $this->whereVal; break;
			default: throw new Exception("Wrong exec values");
		}
	}
	
	public function restartVal()
	{
		$this->selectVal = FALSE;
		$this->insertVal = FALSE;
		$this->updateVal = FALSE;
		$this->deleteVal = FALSE;
		$this->whereVal = FALSE;
	}
}
?>
