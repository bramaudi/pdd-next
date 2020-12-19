<?php

function setMessage($success, $message)
{
  return [
    'success' => $success,
    'message' => $message
  ];
}

if (isset($_GET['install_db'])) {
  
  $host = @$_GET['host'];
  $user = @$_GET['user'];
  $pass = @$_GET['pass'];
  $name = @$_GET['name'];

  $json = [];
  $mysqli = new mysqli($host,$user,$pass,$name);
  
  if (empty($name)) {

    $json = setMessage(false, 'Harap masukan nama basis data');

  } elseif ($mysqli -> connect_errno) {
    
    $json = setMessage(false, "<strong>Masalah sambungan MySQL</strong>\n" . $mysqli -> connect_error);

  } else {

    $json = setMessage(true, 'Berhasil menyambungkan basis data');

  }
  
  echo json_encode($json);
  die();
}


if (isset($_GET['install_env'])) {

  $host = @$_GET['host'];
  $user = @$_GET['user'];
  $pass = @$_GET['pass'];
  $name = @$_GET['name'];

  $appname = @$_GET['appname'];
  $debug = @$_GET['debug'];

  $json = [];

  if (empty($name)) {

    $json = setMessage(false, 'Harap masukan nama aplikasi');

  } else {
   
    $json = setMessage(true, 'Memproses installasi..');
    
  }

  function set_env ($key, $value, $source) {
    return preg_replace("/$key=(.*)$/m", "$key=$value", $source);
  }

  // echo json_encode($json);
  $env = file_get_contents('../.env.example');
  $env = set_env('DB_HOST',     $host, $env);
  $env = set_env('DB_USERNAME', $user, $env);
  $env = set_env('DB_PASSWORD', $pass, $env);
  $env = set_env('DB_DATABASE', $name, $env);
  $env = set_env('APP_NAME',    $name, $env);
  $env = set_env('APP_ENV',     'production', $env);
  $env = set_env('APP_DEBUG',   $debug ? 'true' : 'false', $env);
  echo $env;
  die();
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDD Installer</title>
  <link rel="apple-touch-icon" sizes="180x180" href="/public/icons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/public/icons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/public/icons/favicon-16x16.png">
  <link rel="manifest" href="/public/icons/site.webmanifest">
  <link rel="mask-icon" href="/public/icons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/public/icons/favicon.ico">
  <meta name="msapplication-TileColor" content="#b91d47">
  <meta name="msapplication-config" content="/public/icons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Tailwind Base CSS -->
  <link href="css/app.css" rel="stylesheet">
  <style>
    .hide { display: none; }
  </style>
</head>
<body>
  <div class="flex items-center justify-center py-5">
    <div class="text-center">
      <img class="rounded-full block mx-auto mb-5" src="/public/icons/apple-touch-icon.png" alt="PDD Logo" style="max-width: 150px;">
      <div class="font-normal text-3xl">Portal Desa Digital</div>
    </div>
  </div>
  <div class="sm:w-4/6 card p-5 m-5 mb-10 sm:mx-auto" id="app">
  
  <form id="form-db">
    <div class="font-bold text-xl text-center mb-3">Basis Data</div>
    <div class="mb-3">
      <label class="block">Host</label>
      <input type="text" id="db-host" class="input w-full" value="localhost">
    </div>
    
    <div class="mb-3">
      <label class="block">User</label>
      <input type="text" id="db-user" class="input w-full" value="root">
    </div>

    <div class="mb-3">
      <label class="block">Kata Sandi</label>
      <input type="password" id="db-pass" class="input w-full">
    </div>
    
    <div class="mb-3">
      <label class="block">Basis Data</label>
      <input type="text" id="db-name" class="input w-full" value="pdd">
    </div>

    <div class="flex">
      <button class="btn ml-auto">Selanjutnya</button>
    </div>

    <div id="db-result"></div>
  </form>

  <form id="form-env" class="hide">
    <div class="font-bold text-xl text-center mb-3">Penyiapan Lingkungan</div>
    <div class="mb-3">
      <label class="block">Nama</label>
      <input type="text" id="env-name" class="input w-full" value="PDD">
    </div>

    <div class="flex items-center select-none mb-3">
      <label class="inline-block mr-3" for="env-debug">Debug</label>
      <input type="checkbox" id="env-debug">
    </div>
    <div id="warn-debug" class="notif mb-3 hide" style="background: #FFC107;">
      <small>
        <strong>Peringatan!</strong> Debug mode akan menampilkan data konfigurasi yang sensitif, gunakan hanya dalam ruang lingkup pengembangan.
      </small>
    </div>

    <div class="flex">
      <button class="btn" type="button" id="btn_backward">&laquo; Sebelumnya</button>
      <button class="btn ml-auto bg-green-500">Install</button>
    </div>
  </form>
    
  </div>
  <script>
    const $ = (x) => document.querySelector(x)

    $('#btn_backward').onclick = () => {
      $('#form-db').classList.remove('hide')
      $('#form-env').classList.add('hide')
    }

    $('#env-debug').onclick = (e) => {
      e.target.checked
        ? $('#warn-debug').classList.remove('hide')
        : $('#warn-debug').classList.add('hide')
    }
    
    $('#form-db').onsubmit = (event) => {
      event.preventDefault();

      const db = {}; // input
      (['host','user','pass','name']).map(n => {
        db[n] = $(`#db-${n}`).value;
      })

      const resultDB = $('#db-result');
      resultDB.className = ''
      resultDB.classList.add('notif')
      resultDB.innerHTML = 'Memeriksa ...'

      fetch('?install_db&' + new URLSearchParams(db))
        .then(res => res.json())
        .then(({ success, message }) => {
            const domClass = success
              ? 'notif--success'
              : 'notif--error'
            resultDB.classList.add(domClass);
            resultDB.innerHTML = message.replace(/\n/g, '<br/>')

            if (success) {
              $('#form-db').classList.add('hide')
              $('#form-env').classList.remove('hide')
            }
          })
    }

    $('#form-env').onsubmit = event => {
      event.preventDefault()

      const db = {};
      (['host','user','pass','name']).map(n => {
        db[n] = $(`#db-${n}`).value;
      })

      const env = {
        appname: $('#env-name').value,
        debug: $('#env-debug').checked
      };
      
      fetch('?install_env&' + new URLSearchParams({ ...db, ...env }))
        .then(res => res.json())
        .then(res => {
          console.log(res);
        })
    }
    
  </script>
</body>
</html>