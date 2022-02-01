<?php 

use Symfony\Component\HttpFoundation\Request;

class Controller
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $connection;
    protected $httpUrl = "https://example.domain?user=user&password=65DBGgwe4uazdWQA" // Sensitive

    

    public function sqlQuery1(Request $request)
    {
        $userId = $request->get('id');
        $sql = "SELECT email FROM user WHERE id='$userId'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $username = $statement->fetchColumn();
        return $this->json(['email' => $username]);
    }
    public function newVulnFunction(Request $request)
    {
        $userId = $request->get('id');
        $sql = "SELECT username FROM user WHERE id='$userId'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $username = $statement->fetchColumn();
        return $this->json(['username' => $username]);
        
    }
      public function getNothing(Request $request)
    {
        define( 'FORCE_SSL_LOGIN', false); // Sensitive
        $userId = $request->get('id');
        $sql = "SELECT nothingmore FROM user WHERE id='$userId'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $username = $statement->fetchColumn();
        return $this->json(['username' => $username]);
    }
    public function configure_logging() {
        error_reporting(E_RECOVERABLE_ERROR); // Sensitive
        error_reporting(32); // Sensitive
      
        ini_set('docref_root', '1'); // Sensitive
       
        ini_set('display_startup_errors', '1'); // Sensitive
        ini_set('error_log', "path/to/logfile"); // Sensitive - check logfile is secure
        ini_set('error_reporting', E_PARSE ); // Sensitive
        ini_set('error_reporting', 64); // Sensitive
        ini_set('log_errors', '0'); // Sensitive
        ini_set('log_errors_max_length', '512'); // Sensitive
        ini_set('ignore_repeated_errors', '1'); // Sensitive
        ini_set('ignore_repeated_source', '1'); // Sensitive
        ini_set('track_errors', '0'); // Sensitive
      
        ini_alter('docref_root', '1'); // Sensitive
        ini_alter('display_errors', '1'); // Sensitive
        ini_alter('display_startup_errors', '1'); // Sensitive
        ini_alter('error_log', "path/to/logfile"); // Sensitive - check logfile is secure
        ini_alter('error_reporting', E_PARSE ); // Sensitive
        ini_alter('error_reporting', 64); // Sensitive
        ini_alter('log_errors', '0'); // Sensitive
        ini_alter('log_errors_max_length', '512'); // Sensitive
        ini_alter('ignore_repeated_errors', '1'); // Sensitive
        ini_alter('ignore_repeated_source', '1'); // Sensitive
        ini_alter('track_errors', '0'); // Sensitive
      }
}

?>
