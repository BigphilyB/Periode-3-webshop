<?php
    
    // onderstaand bestand wordt ingeladen
    include('../core/header.php');
    include('../core/checklogin_admin.php');
?>

<h1>Product toevoegen</h1>

<?php
    if (isset($_POST['name']) && $_POST['name'] != "") {
        $name = $con->real_escape_string($_POST['name']);
        $description = $con->real_escape_string($_POST['description']);
        $category_id = $con->real_escape_string($_POST['category_id']);
        $price = $con->real_escape_string($_POST['price']);
        $color = $con->real_escape_string($_POST['color']);
        $weight = $con->real_escape_string($_POST['weight']);
        $active = $con->real_escape_string($_POST['active']);


        $post_query = $con->prepare("INSERT INTO product (name, description, category_id, price, color, weight, active) VALUES (?,?,?,?,?,?,?)");
        if($post_query === false) {
           echo mysqli_error($con);
        } else{
            $post_query->bind_param('sssdsdd', $name, $description, $category_id, $price, $color, $weight, $active );
            if($post_query->execute()){
                echo "Product met" . $name . " toegevoegd.";
            } else {
                echo '<div style="border: 2px solid red">Product niet toegevoegd</div>';
            }
        }
        $post_query->close();

    }
?>

<!-- ========================== -->
<form action="" method="POST">
<label>name</label><input type="text" name="name"/>
<label>description</label><input type="text" name="description"/>
<label>category_id</label><input type="text" name="category_id"/>
<label>price</label><input type="number" name="price"/>
<label>color</label><input type="text" name="color"/>
<label>weight</label><input type="number" name="weight"/>
<label>active</label><input type="number" name="active"/>
<br>
<input type="submit" name="submit" value="Opslaan">
</form>



<?php
    include('../core/footer.php');
?>