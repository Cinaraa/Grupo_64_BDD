<?php
  $user = 'grupo64';
  $password = 'paulisdead64';
  $databaseName = 'grupo64e3';
  $db64 = new PDO("pgsql:dbname=$databaseName;host=localhost;port=5432;user=$user;password=$password");
  $user2 = 'grupo65';
  $password2 = 'naderfranco';
  $databaseName2 = 'grupo65e3';
  $db65 = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2"); 
?>