<?php

if (isset($_GET['install'])) {
  $host = @$_GET['host'];
  $user = @$_GET['user'];
  $pass = @$_GET['pass'];
  $name = @$_GET['name'];

  $json = [];
  $mysqli = new mysqli($host,$user,$pass,$name);
  
  if (empty($name)) {

    $json['success'] = false;
    $json['message'] = "Harap masukan nama basis data";

  } elseif ($mysqli -> connect_errno) {
    
    $json['success'] = false;
    $json['message'] = "<strong>Masalah sambungan MySQL</strong>\n" . $mysqli -> connect_error;

  } else {

    $json['success'] = true;
    $json['message'] = 'Berhasil menyambungkan basis data';

  }
  
  echo json_encode($json);
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
</head>
<body>
  <div class="flex items-center justify-center py-5">
    <div class="text-center">
      <img class="rounded-full block mx-auto mb-5" src="/public/icons/apple-touch-icon.png" alt="PDD Logo">
      <div class="font-normal text-3xl">Portal Desa Digital</div>
    </div>
  </div>
  <div class="sm:w-4/6 card p-5 m-5 mb-10 sm:mx-auto" id="app">
    <div class="font-bold text-xl mb-3">Basis Data</div>

    <form id="form-db">
      <div class="mb-3">
        <label class="block">Host</label>
        <input type="text" id="db-host" class="input w-full" value="localhost">
      </div>
      
      <div class="mb-3">
        <label class="block">User</label>
        <input type="text" id="db-user" class="input w-full" value="mysql">
      </div>
  
      <div class="mb-3">
        <label class="block">Kata Sandi</label>
        <input type="password" id="db-pass" class="input w-full">
      </div>
      
      <div class="mb-3">
        <label class="block">Basis Data</label>
        <input type="text" id="db-name" class="input w-full" value="pdd">
      </div>

      <button class="btn">Gas</button>

      <div id="db-result"></div>
    </form>

  </div>

  <script>
    const $ = (x) => document.querySelector(x)
    
    $('#form-db').onsubmit = (event) => {
      event.preventDefault();

      const db = {}; // input
      (['host','user','pass','name']).map(n => {
        db[n] = $(`#db-${n}`).value;
      })

    const result = $('#db-result');
    result.className = ''
    result.classList.add('notif')
    result.innerHTML = 'Memeriksa ...'

    fetch('?install&' + new URLSearchParams(db))
      .then(res => res.json())
      .then(({ success, message }) => {
          const domClass = success
            ? 'notif--success'
            : 'notif--error'
          result.classList.add(domClass);
          console.log(success);
          result.innerHTML = message.replace(/\n/g, '<br/>')
        })
    }
    
  </script>
</body>
</html>