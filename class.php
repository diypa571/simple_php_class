<?php
/*
diyar.parwana@gmail.com
PHP OOP
https://www.php.net/manual/en/mysqli.construct.php
*/

// Skapa en klass
Class Contact
{ // Deklarera privata data medlemmar
private $host ='host';
private $username  ='diypar1';
private $password ='';
private $dbName ='';
public $conn;

// Standard konstruktor
public function __Construct() {
 //För anslutningen, privata medlemmarna ska anges som parametrar.
$this->conn = new mysqli($this->host,$this->username,$this->password,$this->dbName);
   // Villkor om det blir error
if(mysqli_connect_error())
{     // Använd funktionern trigger_error för att informerar om error
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
// Referenserna
$name = $_POST['name']; // Referens till namnet
$email = $_POST['email'];  // Referens till mail
$telephone = $_POST['telephone']; // Referens telefon
$message = $_POST['message']; // Referens meddelandet
$subject = $_POST['subject']; // Referens ämne
$address = $_POST['address']; // Referens till adress
$zip = $_POST['zip']; // Referens till postnr
$city = $_POST['city'];  // Referens till stad
$country = $_POST['country']; // Referens till land
$date =  $_POST['date']; // Referens till datum
// Har tittat på 
// https://www.w3schools.com/php/php_mysql_prepared_statements.asp
// för prepare() och bind_param()
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
