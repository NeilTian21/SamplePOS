<?php

  $serverName = "DESKTOP-994D4RT\SQLEXPRESS";
  $uid        = 'sa';
  $pwd        = 'Haha!!';

  $connectionInfo = array( "UID"      =>  $uid        ,
                          "PWD"      =>  $pwd        ,
                          "Database" =>  "SampleDB"
                        );

  $oConn = sqlsrv_connect( $serverName, $connectionInfo);
  if( $oConn === false ) {
    print_r(sqlsrv_errors());
    die ('Unable to connect to the database'); # Unable to connect to the database
  }

?>