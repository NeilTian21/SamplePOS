<?php

  $serverName = "LAPTOP-0IBBFBHM\SQLEXPRESS";
  $uid        = 'sa';
  $pwd        = 'password123';

  $connectionInfo = array( "UID"      =>  $uid        ,
                          "PWD"      =>  $pwd        ,
                          "Database" =>  "Signopsys"
                        );

  $oConn = sqlsrv_connect( $serverName, $connectionInfo);
  ?>

