<!DOCTYPEhtml>
<!DOCTYPE html>
<html>
<head>
	<title>Membre</title>
	<meta charset="utf-8">

</head>
<body>  


<div class=p>
	<div class=a><a href=""><h1><em>my</em>prof</h1></a></div>

 <?php
session_start();
if($_SESSION["pseudo"]){

 $pseudo=$_SESSION["pseudo"];
 $mdp=$_SESSION["mdp"];
 try{
 $bdd=new PDO("mysql:host=localhost;dbname=projet","root","");
 $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $reponse=$bdd->prepare("SELECT * FROM prof WHERE Pseudo='$pseudo' AND Mdp='$mdp'");
 $reponse->execute();
while($donnee=$reponse->fetch()){ 
 echo "<div class=a>Bienvenue  ".$donnee['Nom'] .'  '.$donnee['Prenom']."</div><br>";
}
}
 catch(PDOException $e){
    echo "erreur".$e->getMessage();
  }
}
else
{
	header("location:Connecter.php");
}

try{      
          $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
           $affichage=$bdd->prepare("SELECT *FROM prof WHERE Pseudo='$pseudo' AND mdp='$mdp'");
           $affichage->execute();
            echo "<div class='b'>";
            while($donnee=$affichage->fetch()){
                echo '<form action="membre.php" methode="POST">';
                echo '<div class=t>Pseudo :'.$donnee['Pseudo'].'</div><label for="pseudo" class=o>Pseudo</label><input class=o type="text" id="pseudo" value='.$donnee['Pseudo'].' name="pseudo"><br>';
            	echo '<div class=t>Nom :'.$donnee['Nom'].'</div><label class=o for="nom">Nom</label><input class=o type="text" id="nom" value='.$donnee['Nom'].' name="nom"><br>';
            	echo '<div class=t>Prénom :'.$donnee['Prenom'].'</div><label class=o for="prenom">Prénom</label><input type="text" class=o id="prenom" value='.$donnee['Prenom'].' name="prenom"><br>';
            	echo '<div class=t>Email :'.$donnee['Email'].'</div><label for="email" class=o>Email</label><input class=o type="text" id="email" value='.$donnee['Email'].' name="email"><br>';
            	echo '<div class=t>Matière :'.$donnee['Matiere'].'</div><label class=o for="matiere">Matière</label><input type="text" class=o id="matiere" value='.$donnee['Matiere'].' name="matiere"><br>';
            	echo '<div class=t>Adresse :'.$donnee['Adresse'].'</div><label for="adresse" class=o>adresse</label><input type="text" class=o id="adresse" value='.$donnee['Adresse'].'" name="adresse"><br>';
            	echo '<div class=t>Niveau :'.$donnee['Niveau'].'</div><label for="niveau"class=o >Niveau</label><input type="text"class=o id="niveau" value='.$donnee['Niveau'].' name="niveau"><br>';
            	echo "<button class=t >modifier</button> <button class=o>Valider</button>";
            	echo "</form>";
              
               
              }
             
             echo "</div>";
            }
        catch(PDOException $e){
          echo "erreur ".$e->getMessage();
        }


  
echo "<br><a href='deconnecter.php'>Deconnecter</a><br>";


?>

</div>
</body>
</html>