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
    public function getNothing2(Request $request)
    {
        define( 'FORCE_SSL_LOGIN', false); // Sensitive
        $userId = $request->get('id');
        $sql = "SELECT nothingmore FROM user WHERE id='$userId'";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $username = $statement->fetchColumn();
        return $this->json(['username' => $username]);
    }

    public function getNothing3(Request $request)
    {
        $user = $_GET["user"];
        $pass = $_GET["pass"];

        $doc = new DOMDocument();
        $doc->load("test.xml");
        $xpath = new DOMXPath($doc);

        $expression = "/users/user[@name='" . $user . "' and @pass='" . $pass . "']";
        $xpath->evaluate($expression); // Noncompliant
    }

    public function getNothing4(Request $request){
        $userId = $_GET["userId"];
        $fileUUID = $_GET["fileUUID"];

        if ( $_SESSION["userId"] == $userId ) {
        unlink("/storage/" . $userId . "/" . $fileUUID); // Noncompliant
        }

        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 1024, // Noncompliant
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );
        $res = openssl_pkey_new($config);

        $ctx = stream_context_create([
            'ssl' => [
              'crypto_method' =>
                STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT // Noncompliant
            ],
          ]);
    }

    function createMyAccount() {
        $email = $_GET['email'];
        $name = $_GET['name'];
        $password = $_GET['password'];
      
        $hash = hash_pbkdf2('sha256', $password, $email, 100000); // Noncompliant; salt (3rd argument) is predictable because initialized with the provided $email
      
        $hash = hash_pbkdf2('sha256', $password, '', 100000); // Noncompliant; salt is empty
      
        $hash = hash_pbkdf2('sha256', $password, 'D8VxSmTZt2E2YV454mkqAY5e', 100000); // Noncompliant; salt is hardcoded
      
        $hash = crypt($password); // Noncompliant; salt is not provided; fails in PHP 8
        $hash = crypt($password, ""); // Noncompliant; salt is hardcoded; fails in PHP 8
      
        $options = [
          'cost' => 11,
          'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM), // Noncompliant ; use salt generated by default
        ];
        echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
      }
}

?>
