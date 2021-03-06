<?php

// class for handling db connects and queries
class database {

	/**
	 * The master database link resource id
	 */
	private $masterDB;

	/**
	 * The slave database link resource id
	 */
	private $slaveDB;

	/**
	 * This variable holds the current active database link resource id
	 */
	private $link;

	// defined constructor that calls connect
	public function __construct($slaveConfig, $masterConfig)
	{
		// Create connections for the slave and master databases
		$this->slaveDB = $this->connect($slaveConfig);
		$this->masterDB = $this->connect($masterConfig);

	} // end function __construct()

	// connecting funtion to creating a mysql connection
	public function connect($config)
	{
		// set port if one wasn't passed
		if (empty($config['sql_port'])) $config['sql_port'] = '3306';

		// try to connect fail silently if not
		try
		{
			$db = new PDO(
				'mysql:host=' . $config['sql_host'] . ';port=' . $config['sql_port'] . ';dbname=' . $config['sql_db'] . ';charset=utf8',
				$config['sql_user'],
				$config['sql_pass'],
				array(
					PDO::ATTR_TIMEOUT => 10,
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				)
			);
		}
		catch (PDOException $e)
		{
			die("not connected to db");
			return false;
		}

		// send the object
		$this->link =& $db;
		return $db;

	} // end function connect()

	// function to handle standard mysql commands
	public function query($sql)
	{
		// Initialize return variable
		$result = false;

		if (!empty($sql))
		{
			// Get the first word in the sql statement
			$sqlCommand = strtoupper(current(explode(" ", trim($sql))));

			// Check if a sql command was found
			if (!empty($sqlCommand))
			{
				// Check if the sql command is select or show and set link resource id to slave
				if ($sqlCommand === 'SELECT'
					|| $sqlCommand === 'SHOW')
				{
					// Set link resource id to slave db
					$this->link =& $this->slaveDB;

				}
				else
				{
					// Set link resource id to master db
					$this->link =& $this->masterDB;

				} // end if ($sqlCommand === 'SELECT' || $sqlCommand === 'SHOW')

			}
			else // else if (!empty($sqlCommand))
			{
				// Fall back... set link resource id to master db
				$this->link =& $this->masterDB;

			} // end if (!empty($sqlCommand))

			for ($n=0; $n<10; $n++)
			{
				// attempt query
				try
				{
					$result = $this->link->query($sql);
				}
				catch (PDOException $e)
				{
					$result = false;
				}

				// if successful break
				if ($result !== false)
					break;

				// wait for one second
				sleep(1);

				// log it
				echo "Attempt #" . $n . " for query '" . $sql . "'<br />\n";

			} // end for ($n=0; $n<10; $n++)

			if (!$result)
				die("Query failed: " . implode(":", $this->link->errorInfo()) . " \"" . $sql . "\"");

			return $result;

		}

		return $result;

	} // end function query()

	// function to handle standard type selects
	public function fetch($sql, $type="all")
	{
		// run query
		$result = $this->query($sql);

		if (!$result)
			echo "Query failed: " . implode(":", $this->link->errorInfo()) . " \"" . $sql . "\"<br />\n";

		// switch type to determine output
		switch ($type)
		{

			case "all":
				// if type is all, return as full array
				while ($temporary = $result->fetch(PDO::FETCH_ASSOC))
				{
					if (count($temporary) > 0) $resultArray[] = $temporary;

				}
				break;

			case "row":
				// if type is row, return first result as array
				$resultArray = (!$result) ? array() : $result->fetch(PDO::FETCH_ASSOC);
				break;

			case "one":
				// if type is one, return first field of first row
				@$resultArray = $result->fetchColumn();
				break;

			case "flat":
				// if type is flat, return fields as flat array
				while ($test = @$result->fetch(PDO::FETCH_NUM))
				{
					if (!empty($test[0])) $resultArray[] = $test[0];

				}
				break;

			case "pairs":
				// if type is pairs, return set as key / value pairs
				while ($test = @$result->fetch(PDO::FETCH_NUM))
				{
					$resultArray[$test[0]] = $test[1];

				}
				break;

		} // end switch ($type)

		// free mysql resources
		if ($result) $result = null;

		// return results
		if (!empty($resultArray))
			return $resultArray;
		else
			return [];

	} // end function fetch()

	// extra function for handling standard insert commands
	public function insert($table, $data, $extra = 'insert'){

		// if table and data defined then process
		if (!empty($table) && !empty($data))
		{

			// initialize the query data array
			$query_data = array();

			// loop through given data array to build query format
			foreach ($data as $k=>$v)
			{
				$k = $this->escape($k);
				$v = $this->escape($v);
				$query_data[] = "`$k`='$v'";

			}

			// finish query format with instruction and table info
			if ($extra === 'replace')
			{
				$sql = "replace into `$table` set " . implode(", ", $query_data);
			}
			elseif ($extra === 'update')
			{
				$sql = "insert into `$table` set " . implode(", ", $query_data) . " on duplicate key update " . implode(", ", $query_data);
			}
			else
			{
				$sql = "insert into `$table` set " . implode(", ", $query_data);
			}

			// run query
			$this->query($sql);

			$result = $this->link->lastInsertId();

			// return status
			return intval($result);

		}
		else
		{ // else if (!empty($table) && !empty($data))

			// if no options passed, pass comment to error handler
			echo "empty fields in insert<br />\n";

		} // end if (!empty($table) && !empty($data))

	} // end function insert()

	// extra function for handling standard update commands
	public function update($table, $data, $conditions)
	{

		// if table and data defined then process
		if (!empty($table) && !empty($data) && !empty($conditions))
		{

			// initialize the query data array
			$query_data = array();

			// loop through given data array to build query format
			foreach ($data as $k=>$v)
			{
				$k = $this->escape($k);
				$v = $this->escape($v);
				$query_data[] = "`$k`='$v'";

			}

			// loop through given conditions array to build query format
			foreach ($conditions as $k=>$v)
			{
				$k = $this->escape($k);
				$v = $this->escape($v);
				$where_data[] = "`$k`='$v'";

			}

			// finish query format with instruction and table info
			$sql = "update `$table` set " . implode(", ", $query_data) . " where " . implode(" and ", $where_data);

			// run query
			$result = $this->query($sql);

			// return status
			return $result;

		}
		else
		{ // else if (!empty($table) && !empty($data))

			// if no options passed, pass comment to error handler
			echo "empty fields in insert<br />\n";

		} // end if (!empty($table) && !empty($data))

	} // end function update()

	// function to cleanup api string output for database insertion
	public function escape($mixed)
	{
		// trim the input
		if (!empty($mixed)
			&& is_string($mixed)
		){
			// if this is currency scrub it
			if (strpos($mixed, 0, 1) !== false)
				$mixed = str_replace(["$", ",", " "], "", $mixed);

			// trim the string
			$mixed = trim($mixed);

		} // end if (is_string($mixed))

		// return objects
		if (is_object($mixed))
		{
			// return it
			//return $mixed;

		} // end if (is_object($mixed))

		// if a boolean process it
		elseif (is_bool($mixed) === true)
		{
			// ensure it's a bool
			$mixed = ($mixed === true) ? true: false;

		} // end elseif (is_bool($mixed) === true)

		// if this is numeric process it
		elseif (is_numeric($mixed) === true)
		{
			// if a float process it
			if (strpos($mixed, ".") !== false)
			{
				// ensure it's a float
				$mixed = floatval($mixed);

			} // end if (strpos($mixed, ".") !== false)

			// if a integer process it
			else
			{
				// ensure it's an int
				$mixed = intval($mixed);

			} // end else

		} // end elseif (is_numeric($mixed) === true)

		// if an array do things
		elseif (is_array($mixed))
		{
			foreach ($mixed as $key => $value)
			{
				unset($mixed[$key]);
				$mixed[$this->escape($key)] = $this->escape($value);

			} // end foreach ($mixed as $key => $value)

		} // end elseif (is_array($mixed))

		// if it is a string process it
		else
		{
			// addslashes once
			$mixed = addslashes(stripslashes($mixed));

		} // end else

		// return
		return $mixed;

	} // end function escape()

} // end class database()

// initalize database
$db = new database(
);
