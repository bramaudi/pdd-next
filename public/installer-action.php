<?php

function set_env ($key, $value, $source) {
  return preg_replace("/$key=(.*)$/m", "$key=$value", $source);
}

function setMessage($success, $message)
{
  $json = [
    'success' => $success,
    'message' => $message
  ];
  echo json_encode($json);
}

$post = json_decode(file_get_contents('php://input'));
$host = @$post->host;
$user = @$post->user;
$pass = @$post->pass;
$name = @$post->name;
$debug = @$post->debug;

$json = [];
@$mysqli = new mysqli($host,$user,$pass,$name);

if ($post->action == 'test') {

  $json = ['progress' => 0];
  for ($i=0; $i < 1000; $i++) { 
    $json['progress'] = $i;
    die(json_encode($json));
  }

} else if ($post->action == 'db') {
  
  if (empty($name)) {

    setMessage(false, 'Harap masukan nama basis data');

  } elseif ($mysqli -> connect_errno) {
    
    setMessage(false, "<strong>Masalah sambungan MySQL</strong>\n" . $mysqli -> connect_error);

  } else {

    setMessage(true, 'Berhasil menyambungkan basis data');

  }
  
} else if ($post->action == 'env') {

  // app keygen
  $rand = random_bytes(32);
  $appkey = 'base64:'.base64_encode($rand);

  $env = file_get_contents('../.env.example');
  $env = set_env('DB_HOST',     $host, $env);
  $env = set_env('DB_USERNAME', $user, $env);
  $env = set_env('DB_PASSWORD', $pass, $env);
  $env = set_env('DB_DATABASE', $name, $env);
  $env = set_env('APP_KEY',     $appkey, $env);
  // $env = set_env('APP_ENV',     'production', $env);
  $env = set_env('APP_DEBUG',   $debug ? 'true' : 'false', $env);

  // Var sementara untuk baca query sql
  $templine = '';
  // Baca per baris
  $lines = file_get_contents('../install.sql');
  foreach (explode("\n", $lines) as $line) {
  // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;

    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';') {
        // Perform the query
        $mysqli->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
  }

  setMessage(true, 'Selesai mengimpor sql');

  file_put_contents('../storage/installed', 'Installed on '. date("l jS \of F Y h:i:s A") , "\n", FILE_APPEND);
  file_put_contents('../.env', $env);

} else {
  die('??');
}

