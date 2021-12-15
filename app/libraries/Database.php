<?php
/*
* PDO Database Class  
* Connect to Database Class
* Create prepared statements
* Bind Values
* Return rows and results
*/
class Database  
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
       // Set DSN
       $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
       $options = array(
         PDO::ATTR_PERSISTENT => true,
        //  PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => false,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
       );

    try {
        $this->dbh =new PDO($dsn, $this->user, $this->pass, $options );
        // var_dump($this->dbh);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        $this->error= $e->getMessage();
        echo $this->error;
    }

    }
    // Prepare statement with query 
public function query($sql)
{
    $this->stmt=$this->dbh->prepare($sql);

}

// Bind Values
public function bind ($param, $value, $type=null)
{
   if (is_null($type)) {
      switch (true) {
          case is_int($value):        
              $type= PDO::PARAM_INT;
              break;
          
         case is_bool($value):        
             $type= PDO::PARAM_BOOL;
                break;
         case is_null($value):        
             $type= PDO::PARAM_NULL;
            break;
                      
          default:
          $type= PDO::PARAM_STR;
              break;
      }
   }
   $this->stmt->bindValue($param, $value, $type);
}

public function execute()
{
    return $this->stmt->execute();
}

// Get result set as array o objects
public function resultSet()
{
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
}

// Get single record as object
public function single()
{
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
}

// Get row count
public function rowCount()
{
    $this->execute();
    $this->stmt->rowCount();
}

public function fetchColumn()
{
    // $this->execute();
    $this->stmt->fetchColumn();
}

public function fetchAll()
{
   
    $this->stmt->fetchAll();
}
}
