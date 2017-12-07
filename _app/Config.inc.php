<?php
//Credenciais de Acesso ao BD
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME','tasks');

//Define identidade do sistema
define('SYSTEM_NAME', 'Sistema de Tasks');
define('AUTHOR_NAME', 'João Victor Barreto');

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

//Conecta com o MySQL usando PDO
function db_connect()
{
    $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
 
    return $PDO;
}

//Verifica  se existe sessão ativa.
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}

//Cria o hash da senha, usando MD5 e SHA-1
function make_hash($str)
{
    return sha1(md5($str));
}
{
    return false;
}
