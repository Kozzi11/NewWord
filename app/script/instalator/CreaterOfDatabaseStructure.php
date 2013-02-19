<?php
namespace Kalendar;
use Nette, Kdatabase\TableUser;

class CreatorOfDatabaseStructure extends Nette\Object
{
    private $connection;
    
    public function __construct(Nette\Database\Connection $db) 
    {
	$this->connection = $db;
    }
    
    public function createAll()
    {
	$this->createUserTable();
    }
    
    private function createUserTable()
    {
	$id = TableUser::ID;
	$password = TableUser::PASSWORD;
	$fristname = TableUser::FRISTNAME;
	$surname= TableUser::SURNAME;
	$emailAdress = TableUser::EMAIL_ADRESS;
	$role = TableUser::ROLE;
	$statement = "CREATE TABLE IF NOT EXISTS users(
			    $id int(11) NOT NULL AUTO_INCREMENT,
			    $password char(60) NOT NULL,
			    $fristname varchar(50) NOT NULL,
			    $surname varchar(50) NOT NULL,
			    $emailAdress varchar(50) NOT NULL,
			    $role varchar(20) NOT NULL,
			    PRIMARY KEY (id))";
	
	$this->connection->exec($statement);
    }
}
