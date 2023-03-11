<?php
class Mysql_Driver
{
    private $conn;
    public function connect()
    {
		//connection parameters
        $config = parse_ini_file('db-config.ini');

		$this->conn = mysqli_connect($config['servername'], $config['username'],$config['password'], $config['dbname']);
		if (mysqli_connect_errno())
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

	public function query($qry, ...$params)
	{
		$result = "";
		try{
			$stmt = mysqli_stmt_init($this->conn);
			if (!mysqli_stmt_prepare($stmt, $qry)) {
				trigger_error("Failed to prepare Stmt Query" . $stmt->error);
			} else {
				$stringTypes = "";
				$type = "";
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
					mysqli_stmt_bind_param($stmt, $stringTypes , ...$params);
				}
				if (!mysqli_stmt_execute($stmt)) {
					trigger_error("Query Failed SQL: $qry - Stmt Error: " . htmlspecialchars($stmt->error));
				}
				if (mysqli_stmt_affected_rows($stmt) > 0) {
					$result = true;
				} else {
					$result = mysqli_stmt_get_result($stmt);
				}
				return $result;
			}
		}catch (mysqli_sql_exception $e){
			//log
			if (str_contains($e, "Duplicate")){
				return "duplicate";
			}else{
				return $e;
			}			
		}finally{
			mysqli_stmt_close($stmt);
		}
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