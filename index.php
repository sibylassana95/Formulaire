<!DOCTYPE html>
<html>
<head>
	<title>formulaire </title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container">
<form method="POST" class="form">
	NOM:<input type="text" name="nom" class="box-input"> <br>
	PRENOM:<input type="text" name="prenom" class="box-input"><br>
	NUMERO:<input type="number" name="numero" class="box-input"><br>
	EMAIL:<input type="text" name="email" class="box-input"><br>
	CODE POSTAL:<input type="number" name="codepostal" class="box-input"><br>
    <input type="submit" value="VALIDER" name="valid" class="box-button1">	
    <input type="submit" value="Afficher" name="affich" class="box-button">



</form>
<?php
error_reporting(E_ALL ^ E_NOTICE); 
//stocker les données du formulaire dans des variables
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$numero=$_POST['numero'];
$email=$_POST['email'];
$codepostal=$_POST['codepostal'];
$valider=$_POST['valid'];
$afficher=$_POST['affich'];
//les donnéé de la base
$host='localhost';
$dbname='ecole';
$username='root';
$password='siby';
  //connexion a la base de donnéé  
try{
  $connexion=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    echo "connexion avec succes";

}
//afficher le message d'erreur en cas d'echec de connexion 
catch(PDOException $e){
  die("impossible de se connecter à la base:" .$e->getMessage());
}
//si on clic sur le bouton valider
if (isset($valider)) {

//requette insertion 
$requette="INSERT INTO users(nom,prenom,numero,email,codepostal)VALUES('$nom','$prenom','$numero','$email','$codepostal')";
$execute=$connexion->query($requette);
	
}
//si on clic sur le bouton valider
if (isset($afficher)) {
	//requette affichage
	$requette="SELECT * FROM users";
$execute=$connexion->query($requette);
 echo "<table border=\"1\"class=\"table\"style=\"border-collapse:collapse;text-align:center;\">
<tr>
        <th>Id</th>
        <th> Nom</td>
        <th> Prenom</th>
        <th> Numero</th>
        <th> Email</th>
        <th> Code postal</th>
       
    </tr>";
 while ($ligne = $execute->fetch())

{
//recuperer les données dans la base
echo "
 <tr>
 <td>".$ligne['id']." </td>
      <td>".$ligne['nom']." </td>
      <td>".$ligne['prenom']." </td>
      <td>".$ligne['numero']." </td>
      <td>".$ligne['email']." </td>
      <td>".$ligne['codepostal']." </td>
    
         </tr>";


     
  }
}
   ?>
</table>



</div>
</body>
</html>