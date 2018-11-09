<?php 
class Db
{
    public $option = array();
    public $connect;
    // public $disconnect;
    public $sql; // handle sql query; created to create no redundancy between query variable
    public $query; // handle query state
    // public $result; // callback data
    public $db; // db connect
    public $debug; // enable debugging command lifecycle each event
    public $last_insert_id; // last insert id
    // public $to_json;

    public $dbengine;
    public $dbhost;
    public $dbuser;
    public $dbpass;
    public $dbname;
    public $dbport;

    public $dbconfig;

    public function __construct($option = NULL)
    {
        try {
            // debug('db constructor start');
            // $env = env();
            $dbconfig = env();

            $this->dbengine = $dbconfig['DB_ENGINE'];
            $this->dbhost = $dbconfig['DB_HOST'];
            $this->dbuser = $dbconfig['DB_USER'];
            $this->dbpass = $dbconfig['DB_PASS'];
            $this->dbname = $dbconfig['DB_NAME'];
            $this->dbport = $dbconfig['DB_PORT'];
            // debug($env,1);
            
            // set option
            if (! empty($option))
            {
                foreach ($option as $key => $opt) 
                {
                    $this->$key = $opt;
                }
            } 

            // check allowed engine
            // if (isset($_engine) && in_array($_engine,array('mysql','mysqli','pdo'))) 
            //     $this->engine = $_engine;

            // check allowed engine
            // if (isset($dbengine) && in_array($dbengine,array('mysql','mysqli','pdo'))) 
            // $this->dbengine = 'mysqli';
            // $this->dbengine = dbconfig$;
            // var_dump($dbconfig);
            switch ($this->dbengine)
            {
                case 'mysql':
                    if ($this->debug) debug('start mysql connect');
                    // $this->connect = mysql_connect($this->dbhost.':'.$this->dbport,$this->dbuser,$this->dbpass,$this->dbname);
                    $this->connect = mysql_connect($this->dbhost.':'.$this->dbport,$this->dbuser,$this->dbpass);
                    mysql_select_db($this->dbname);
                    // Check connection
                    if (! $this->connect) {
                        die("Connection failed: " . mysql_connect_error());
                    }
                    break;
                
                case 'mysqli':
                   if ($this->debug) debug('start mysqli connect');
                    // mysqli
                    $this->connect = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname,$this->dbport);
    
                    // Check connection
                    if (! $this->connect) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
    
                    break;
                
                case "pdo":
                    if ($this->debug) debug('start pdo connect');
                    // pdo connect here
                    $this->dbcharset = 'utf8mb4';
                    // $this->connect = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname,$this->dbport);
                    $this->connect = new PDO('mysql:host='. $this->dbhost .';dbname=' . $this->dbuser . ';charset=' . $this->dbcharset, "'" . $this->dbuser . "'", "'" . $this->dbpass . "'");
                    
    
                    // Check connection
                    if (! $this->connect) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    break;
                default:
                    debug('bego gajalani nih',1);
                    break;
    
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function query($_sql = NULL)
    {
        if ($this->debug) debug('db query start');
        // debug('db engine '. $this->dbengine .HR);
        
        if (isset($_sql)) $this->sql = $_sql;
        
        switch ($this->dbengine)
        {
            case 'mysql':
                // $this->query = mysql_query($this->connect, $this->sql);
                $this->query = mysql_query($this->sql,$this->connect);

                break;
            
            case 'mysqli':
                // mysqli start query
                // debug('start mysqli query'.HR);
                $this->query = $this->connect->query($this->sql);

                if (isset($this->query->last_insert_id)) $this->last_insert_id = $this->query->insert_id;
                break;
            
            case 'pdo':
                $this->query = $this->connect->query($this->sql);
                // PDO::FETCH_ASSOC
                break;

            default:
                debug('error db query',1);
        }
        // debug('db query end');
        return $this->query;
    }

    public function result()
    {
        if ($this->debug) debug('db result start'.HR);
        // debug('engineaa '.$this->dbengine . HR);
        $result = NULL;
        
        // debug('gajalan semua');
        // debug('ketek ');
        // debug($result,1);
        // return $result;
        // die;
        
        switch ($this->dbengine)
        {
            case 'mysql':
                if (mysql_num_rows($this->query) > 0)
                {
                    // output data of each row
                    while($row = mysql_fetch_assoc($this->query)) {
                        $result[] = $row;
                    }
                    return $result;
                }
                break;

            case 'mysqli':
                // mysqli start query
                if ($this->debug) debug('mysqli start');
                // $result = $db->fetch_array();
                $result = $this->query->fetch_array(MYSQLI_ASSOC);
                break;
                
            case 'pdo':
                if ($this->debug) debug('pdo start');
                $result = $this->query->fetch(PDO::FETCH_ASSOC);
                break;

            default:
                debug('error db result',1);
            
        }
        // debug('db result end'.HR);

        return $result;
                
    }

    public function resultAll()
    {
        if ($this->debug) debug('db result start'.HR);

        // $result = array();
        switch ($this->dbengine)
        {
            case 'mysql':
                if (mysql_num_rows($this->query) > 0)
                {
                    // output data of each row
                    while($row = mysql_fetch_assoc($this->query)) {
                        $result[] = $row;
                    }
                    // return $result;
                }
                $this->result = $result;
                break;

            case 'mysqli':
                // $result = $this->query->fetch_array(MYSQLI_ASSOC);

                // while($row = mysqli_fetch_array($this->query)) {
                while($row = $this->query->fetch_array(MYSQLI_ASSOC)) {
                    $result[] = $row;
                }

                // $this->result = $this->query->fetch_array(MYSQLI_ASSOC);
                $this->result = $result;
                break;
                
            case 'pdo':
                // $result = $this->query->fetchAll(PDO::FETCH_ASSOC);
                $this->result = $this->query->fetchAll(PDO::FETCH_ASSOC);
                break;
            
            default:
                debug('error db result all',1);
            
        }
        if ($this->debug) debug('db result end'.HR);

        return $this->result;
        // return $this->query;
                
    }

    // Alias method resultAll (method pointer)
    public function result_array() {
        return $this->resultAll();
    }

    // Get last insert id
    public function lastId()
    {
        // return mysql_insert_id($this->con);
        
        switch ($this->dbengine)
        {
            case 'mysql':
                $last_id = mysql_insert_id($this->connect);
                break;

            case 'mysqli':
                // $result = $this->query->fetch_array(MYSQLI_ASSOC);
                $last_id = $this->last_insert_id;
                break;
                
            case 'pdo':
                // $result = $this->query->fetchAll(PDO::FETCH_ASSOC);
                $last_id = $this->query->lastInsertId();
                break;
            
            default:
                // throw new Exception();    
                debug('error db last id',1);
            
        }
        return $last_id;
	}

    // Return last query
    public function last_query()
    {
        return $this->sql;
    }

    public function select()
    {

    }

    public function from()
    {

    }

    public function where($attr = array())
    {
        
    }

    public function insert($attr = array())
    {
        
    }

    public function update($attr = array())
    {
        
    }

    public function delete($attr = array())
    {
        
    }

    // return json
    public function to_json() {
        return json_encode($this->result);
    }

    // return array
    public function to_array() {
        return ($this->result);
    }

    // return json
    public function to_object() {
        return json_encode($this->result);
    }

    // destructor
    public function __destruct()
    {
        if ($this->debug) debug(HR.'destruct run');
    }

}
?>