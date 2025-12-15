  
<?php
require_once("connect.php");
$ReadSql = "SELECT * FROM `personne`";
$res = mysqli_query($con, $ReadSql);
if ($res === false) {
    die('Erreur requête: ' . mysqli_error($con));
}
?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <div id="tableau">
         <table border="1" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nom</th>
                    <th>prénom</th>
                    <th>N° Téléphone</th>
                    <th>professions</th>
                </tr>
            </thead>

            <tbody id="tbody">
                <?php
                if (mysqli_num_rows($res) > 0) {
                    while ($m = mysqli_fetch_assoc($res)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($m['id'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><?php echo htmlspecialchars($m['nom'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($m['prenom'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($m['telephone'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($m['profession'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5">Aucune donnée trouvée.</td>
                    </tr>
                <?php } ?>
            </tbody>
         </table>
           

        </div>
    
</body>
</html>