<?php
class Mysql_Driver
{
    private $conn;
    public function connect()
    {
		//connection parameters
        $config = parse_ini_file('db-config.ini');
        $this->conn = new mysqli($config['servername'], $config['username'],$config['password'], $config['dbname']);
        if ($this->conn->connect_error)
  		{
 		    trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
  		}
    }

    public function close()
	{
        $this -> conn->close();
	}
	
	public function num_rows($result)
	{
		return mysqli_num_rows($result);
	}
	
	public function fetch_array($result)
	{
		return mysqli_fetch_array($result);
	}
	
    function perform_query($qry, ...$params)
    {
		$stringTypes = "";
		try{
            $stmt = $this->conn->prepare($qry);
            foreach($params as $param) {
				if (is_string($param)) {
					$type = "s";
				} else if (is_int($param)) {
					$type = "i";
				} else if (is_double($param)) {
					$type = "d";
				}
				$stringTypes .= $type;
			}
			if (sizeof($params)) {
				$stmt->bind_param($stringTypes , ...$params);
			}
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0)
            {
                return $result;
            }
            else
            {
                return false;
            }
        
		}catch (mysqli_sql_exception $e){
			//log
			if (str_contains($e, "Duplicate")){
				return "duplicate";
			}else{
				return $e;
			}			
		}finally{
			$stmt->close();
		}
		return true;
    }
}
?>