<?require 'vendor/autoload.php';
//inicia biblioteca vlucas/phpdotenv
//$dotenv = Dotenv\Dotenv::creatImmutable(__DIR__);
$dotenv->load();
/*
"::" é um operador usado para chamar métodos e propriedades estáticos
"->" é um operador utilizado para acessar propriedades e métodos de objetos
*/
$user_ip = $_SERVER['REMOTE_ADDR'];
//captura de IP
$encrypted_ip = password_hash($user_ip, PASSWORD_DEFAULT);
//CRIPTOGRAFIA HASH
$host = $_ENV['DB_HOST'];
$DBNAME = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER']; 
$password = $_ENV['DB_PASS'];
//Config banco de dados
try
{
    //conexão com banco de dados
$pdo = new
PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//Inserção do IP criptografado no banco de dados
$stmt = $pdo->prepare("INSERT INTO user_ips (ip_addres) VALUES(:ip_addres)");
$stmt->bindParam(':ip_address', $encrypted_ip);
$stmt->execute();
}
catch (PDOException $e)
{
    echo "Erro de conexão" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeiAÍ</title>
</head>
<body>
    <h1><?php echo "Bem-vindo à minha página em PHP!"; ?></h1>
    <p><?php echo "Hoje é " . date("d/m/Y") . "."; ?></p>
    <p><?php echo "alterado no github"; ?></p>
    <p><?php echo "alterado no github"; ?></p>
</body>
</html>
