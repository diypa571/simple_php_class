<?php
// Inkludera klassen
include("class.php");
// Skapa en objekt
$objContact = new Contact();

if(isset($_POST['submit'])) { // Kontrollera om data är skickat
$objContact->Add(); // Använda objektet för att Anropa metoden Add
}


?>





<!-- Kontakt formulär--->
<section class="my-1 px-2 container bgfgrey rounded">
<form class="bg-gray-400 p-4 m-2"  action="contact.php" method="POST">
<div class="row">
<div class="col-6">
<label class="ftn ftn20 fblack">Namn:</label>
<input type="text" class="form-control  mb-4" name="name" minlength="2" required> </div>

<div class="col-6">
<label class="ftn ftn20 fblack"> Telefon:</label>
<input type="number" class="form-control mb-4" name="telephone" minlength="5" required></div>


<div class="col-12">
<label class="ftn ftn20 fblack">Email:</label>
<input type="email" class="form-control  mb-4" name="email" required></div>

<label class="ftn ftn20 fblack">Ämne:</label>
<input type="subject" class="form-control mb-4" name="subject" minlength="2" required>

<label class="ftn ftn20 fblack">Meddelande:</label> <br>
<textarea class="form-control" id="message" name="message" rows="5" cols="33"></textarea>
<br>
<?php
$varRand1 =  rand(1,10);
$varRand2 =  rand(1,10);
$varRand3 = $varRand1 + $varRand2;
?>
<span class="ftn ftn8 strong my-1">
  Ange rätt kontrollnummer:<span class="ftn10">
  <?php echo $varRand2; ?></span> + <span class="ftn10"><?php echo $varRand1; ?></span> = ?  </span>
</div>
<input type="text"  name="rand1" class="form-control" placeholder="Resultatet av beräkningen skrivs här.">
<input type="hidden"  name="rand2" value="<?php echo $varRand3; ?>">
<input type="hidden"  name="date" value="<?php echo date("Y/m/d H:i:s"); ?>">
<input type="submit" name="submit" class="ftn ftn20 py-2 px-4 rounded"  value="Skicka">

</form>
</section>
