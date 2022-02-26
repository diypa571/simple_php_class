<?php // Skapa en klass
Class Contact
{ // Deklarera privata data medlemmar
private $host ='ltu.se:3308';
private $username  ='diypar1';
private $password ='';
private $dbName ='';
public $conn;

// Standard konstruktor
public function __Construct() {
$this->conn = new mysqli($this->host,$this->username,$this->password,$this->dbName);
if(mysqli_connect_error())
{
   trigger_error('Fel med databas anlutningen'.mysqli_connect_error());
}
else {   // Konstruktor funktionen returnerar anslutningen
   return $this->conn;
}
}

// Metoden för att spara data i tabellen
public function Add() {
$rand1 = $_POST['rand1']; // 
$rand2 = $_POST['rand2'];
// Kontrollera, det får blir error när rand1 och rand2 ej blir ekvivalenta
if(!isset($rand1) || $rand2 != $rand1) {
header("Location:contact.php?contact=error1");
exit();
}
// Referenser
$name = $_POST['name'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$country = $_POST['country'];
$date =  $_POST['date'];
$result = $this->conn->prepare("INSERT INTO tbcontact(name ,email, message, subject, telephone ,address, zip ,city ,country,date) VALUES(?,?,?,?,?,?,?,?,?,?)");
$result->bind_param("ssssssssss", $name ,$email, $message, $subject, $telephone ,$address, $zip ,$city ,$country, $date);
$result->execute();
if($result == true)
{
header("Location:contact.php?contact=success");
}
else
{
header("Location:contact.php?contact=error");
}
$result->close();
$this->conn->close();
}}
?>
