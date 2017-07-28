<?php
class OpsWorksDb {
  public $adapter, $database, $encoding, $host, $username, $password, $reconnect;

  public function __construct() {
    $this->type = '';
    $this->data_source_provider = 'stack';
    $this->adapter = '';
    $this->database = 'studyedge';
    $this->encoding = 'utf8';
    $this->host = '';
    $this->username = 'wpuser';
    $this->password = 'zanzibar';
    $this->reconnect = 'true';
  }
}

class OpsWorksMemcached {
  public $host, $port;

  public function __construct() {
    $this->host = '';
    $this->port = '11211';
  }
}

class OpsWorks {
  public $db;
  public $memcached;
  private $stack_map;

  public function __construct() {
    $this->db = new OpsWorksDb();
    $this->memcached = new OpsWorksMemcached();
    $this->stack_map = array('php-app' => array('10.239.222.78'));
    $this->stack_name = 'WordPress-Production';
  }

  public function layers() {
    return array_keys($this->stack_map);
  }

  public function hosts($layer) {
    return $this->stack_map[$layer];
  }
}
?>
