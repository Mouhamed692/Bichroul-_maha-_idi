
  
  
  
  
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> cellule BMH</title>
    <link rel="stylesheet" href="style.css">
    
   
 
</head>
<body>  
       
<?php
require_once("connect.php");
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $profession = trim($_POST['profession'] ?? '');

    if ($nom === '' || $prenom === '') {
        $message = 'Veuillez renseigner le nom et le prénom.';
    } else {
        $stmt = mysqli_prepare($con, "INSERT INTO personne (nom, prenom, telephone, profession) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssss', $nom, $prenom, $tel, $profession);
            if (mysqli_stmt_execute($stmt)) {
                $message = 'Insertion réussie avec succès.';
            } else {
                $message = 'Erreur d\'insertion : ' . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $message = 'Erreur préparation requête : ' . mysqli_error($con);
        }
    }
}
?>
    <form id="form" method="post">
        <header id="header">
            <img src="https://i.pinimg.com/736x/2e/e0/dd/2ee0ddbd0150ad8c956102b3327ef6bb.jpg" alt="img" width="100" height="100" id="img"><img src="https://i.pinimg.com/736x/66/f7/7f/66f77f7c9b829475172d96bd12679f8e.jpg" alt="img1" width="100" height="100" id="img1">
            <h1>Bienvenue dans la cellule Bichroul maha idi de la fédération Hadaa ihoul fada il</h1>
        </header>
        <div id="formulaire">
        <h1>Darraa Bichroul maha idi vous remercie et vous souhaite la bienvenue </h1>
        <label for="nom">nom</label><br>
        <input type="text" name="nom" id="nom" placeholder="votre nom" ><br>
        <label for="prenom">prénom</label><br>
        <input type="text" name="prenom" id="prenom" placeholder="votre prénom"><br>
        <label for="tel">N° Téléphone</label><br>
        <input type="tel" name="tel" id="tel" placeholder="votre N° de téléphone"><br>
        <label for="profession">professions/métiers</label> <br>
        <input type="text" name="profession" id="profession" placeholder="votre professions/métiers"><br>
         <button type="submit" name="submit" value="submit">envoyé</button>
         <a href="view.php">
         <button type="button"> voir la liste </button></a>
       
        </div>   

           




       
    </form>
    <?php if (!empty($message)) : ?>
        <p class="message"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>
    
</body>
</html>