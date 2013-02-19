<?php
namespace Kalendar;
use Nette, Kdatabase\TableUser;
  
class User
{
    private $connection;
    private $fristname;
    private $surname;
    private $emailAdress;
    private $password;
    private $role;


    public function __construct(IUserStorage $storage, Nette\DI\Container $context, Nette\Database\Connection $db)
    {
	parent::__construct($storage, $context);
	$this->connection = $db;
	$this->setExpiration('+ 30 minutes', TRUE);
	$this->setAuthenticator(new \Authenticator($db));
	$this->setAuthenticator(new \Authenticator($db));
	//$user->setAuthorizator($handler);
	
    }

    /**
     * @param string $fristname
     * @param string  $surname
     * @param string  $emailAdress
     * @param string  $password
     * @param role  $role
     * @return bool | true if OK
     */
    public function createUser($fristname, $surname, $emailAdress, $password, $role = \role::USER)
    {
	$this->fristname = $fristname;
	$this->surname = $surname;
	$this->emailAdress = $emailAdress;
	$this->password = \Authenticator::calculateHash($password);
	$this->role = $role;
	return $this->saveUserToDatabase();	
    }

    private function saveUserToDatabase()
    {
	$nameOfTable = TableUser::TABLE_NAME;
	$password = TableUser::PASSWORD;
	$fristname = TableUser::FRISTNAME;
	$surname= TableUser::SURNAME;
	$emailAdress = TableUser::EMAIL_ADRESS;
	$role = TableUser::ROLE;
	
	$data = array($emailAdress => $this->emailAdress,
		      $fristname   => $this->fristname,
		      $surname     => $this->surname,
		      $password    => $this->password,
		      $role        => $this->role
		);
	$isDone = $this->connection->table($nameOfTable)->insert($data);
	if($isDone == false){
	    return false;
	}
	return true;
    }
    
    /**
     * @param string $email
     * @return bool | true if exists
    */
    public function checkIfEmailExists($email)
    {
	$numberOfRowWithSameEmail = $this->connection->table(TableUser::TABLE_NAME)->where(TableUser::EMAIL_ADRESS,$email)->count();
	if($numberOfRowWithSameEmail === 0)
	{
	    return false;
	}
	return true;
    }
    
    private function aclPermission()
    {
	$acl = new Nette\Security\Permission;
	$acl->addRole($role);
	$acl->addResource($resource);
	$acl->allow();
    }
    
    public function getName()
    {
	return 'test';
    }
}