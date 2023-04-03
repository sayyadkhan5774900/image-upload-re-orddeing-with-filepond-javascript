<?php

$host = '127.0.0.1';
$db   = 'image_reorder';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$conn = mysqli_connect($host,$user,$pass,$db);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    exit;
}

function json_response($data = null, $httpStatus = 200)
{
    header_remove();

    header("Content-Type: application/json");

    http_response_code($httpStatus);

    echo json_encode($data);

    exit();
}

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
