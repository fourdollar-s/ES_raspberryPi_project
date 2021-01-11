<html>
<head>
<title>傳到OLED</title>
</head>
<body>
<p>
<?php
ini_set('display_errors','1');
error_reporting(E_ALL);
?>
<?php
    $location="localhost"; //連到本機
    $account="user";
    $password="12345678";
    $db="weather";
    $con=mysqli_connect("localhost",$account,$password,$db);
    if($con){
        echo"ok";
    }else{
        echo"error";    
    }
?>
<?php
$var = $_GET["weather"];
$v1='';
$sql_query="select * from data";
$result=mysqli_query($con,$sql_query);
while($row=mysqli_fetch_array($result)){

    foreach($var as $key=>$value)
    {

        $v1=$v1.$row[$value].',';
        //echo $row[$value];
        //echo $v1;

    }
}
//$output=shell_exec("/usr/bin/sudo /etc/rc.d/init.d/named start ; sudo python /var/www/html/finalProject/I2COLED.py ".$v1." 2>&1");
$output=shell_exec("sudo -u www-data python3 /var/www/html/finalProject/I2COLED.py ".$v1." 2>&1");
//shell_exec("$v1");
echo $v1;
?>

</body>
