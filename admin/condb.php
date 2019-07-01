<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_condb = "localhost";
$database_condb = "hoshi";
$username_condb = "root";
$password_condb = "14052540";
$condb = mysql_pconnect($hostname_condb, $username_condb, $password_condb) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");
?>