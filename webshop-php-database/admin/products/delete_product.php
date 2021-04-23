<?php
    
    // onderstaand bestand wordt ingeladen
    include('../core/header.php');
    include('../core/checklogin_admin.php');
?>

<h1>Gebruiker verwijderen</h1>

<?php

$id = $_GET['id'];
// $sql = "DELETE FROM product WHERE product_id = $id";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $request =  $con->prepare ("DELETE FROM product WHERE product_id = ?");
    $request->bind_param('d',$id);
    if($request->execute()){
        echo "Product met ID " . $id . " verwijderd.";
    }

} 



        ?>
        <form action="" method="POST">
        <a href="./index.php">Nee ik wil het product niet verwijderen</a>
        <input type="submit" name="submit" value="Ja, verwijderen!">
        </form>
        <?php

    
?>

<?php
    include('../core/footer.php');
?>