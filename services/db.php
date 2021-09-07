<?php
namespace services;
class db
{
	private static $instance;
	public $pdo;
	public $errorArray;
	private function __construct()
	{
		$options = (require $_SERVER["DOCUMENT_ROOT"].'/crud/services/settings.php')['db'];
		try {
			$this->pdo = new \PDO('mysql:host='.$options['host'].';dbname='.$options['dbname'],$options['user'],$options['password']);
		}
		catch (\PDOException $e) {
			if ($e->getCode() == 1049)   // если нет базы данных, то создаем сначала её
			{
				$this->pdo = new \PDO('mysql:host='.$options['host'],$options['user'],$options['password']);
				$this->pdo->exec("CREATE DATABASE ".$options['dbname']);
				$this->pdo->exec("USE ".$options['dbname']);
			}
			else 	die('Error: '.$e->getMessage().' Code: '.$e->getCode());
		}
		$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$this->checkTableExists();
	}
	public function checkTableExists()
	{
		//проверяем, если таблица существует, если нет, то создаем
		$statement = $this->pdo->prepare( "DESCRIBE `groups`");
		if ( !$statement->execute() ) {
			$this->pdo -> exec("CREATE TABLE IF NOT EXISTS  `groups` (   
				`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
				`name` varchar(255) NOT NULL )");
		}
		$statement = $this->pdo->prepare( "DESCRIBE `students`");
		if ( !$statement->execute() ) {
			$this->pdo -> exec("CREATE TABLE IF NOT EXISTS  `students` (   
				`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
				`name` varchar(255) NOT NULL,
   				 `groupId` int(11) NOT NULL)");
		}
		$statement = $this->pdo->prepare( "DESCRIBE `subjects`");
		if ( !$statement->execute() ) {
			$this->pdo -> exec("CREATE TABLE IF NOT EXISTS  `subjects` (   
				`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
				`name` varchar(255) NOT NULL )");
		}
		$statement = $this->pdo->prepare( "DESCRIBE `gslink`"); // group - subject link
		if ( !$statement->execute() ) {
			$this->pdo -> exec("CREATE TABLE IF NOT EXISTS  `gslink` (   
				`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
				`groupId` int(11) NOT NULL,
    			`subjectId` int(11) NOT NULL,
    			UNIQUE (`groupId`,`subjectId`))");
		}
		$statement = $this->pdo->prepare( "DESCRIBE `marks`"); // group - subject link
		if ( !$statement->execute() ) {
			$this->pdo -> exec("CREATE TABLE IF NOT EXISTS  `marks` (   
				`id` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
				`studentId` int(11) NOT NULL,
    			`subjectId` int(11) NOT NULL,
        		`mark` int(11))");
		}
	}
	public function query(string $sql, array $params = [], string $className = "stdClass"): ?array
	{	try
		{
		$statement= $this->pdo->prepare($sql);
		$result = $statement->execute($params);
		}
		catch (\PDOException $e) {
		if ($e->getCode() == 23000)
		{
			$this->errorArray[] = $e->getCode() . ": Комбинация полей неуникальная";
		}
		else
		{
			$this->errorArray[] = $e->getCode() . " ".$e->getMessage();
		}
		}
		if($result === false)
		{
			return null;
		}
		else
		{
			return $statement->fetchAll(\PDO::FETCH_CLASS,$className);
		}
	}
	public static function getInstance(): self
	{
		if (self::$instance === null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function getErrors()
	{
		return $this->errorArray;
	}
}
?>	