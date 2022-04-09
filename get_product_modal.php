<?php 

include 'config.php';

// function test_input($var) {
//     $var = trim($var);
//     $var = stripslashes($var);
//     $var = htmlspecialchars($var);
//     return $var;
// }

$id = $_POST['id'];
$sql = "select * from product where id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
    $photo = $row['photo'];
    $name = $row['name'];
    echo <<<END
    <div class="row align-items-center"> 
    <img class="img-fluid col-4" src="$photo" alt="photo" />
    <h5 class="col-8"> $name </h5>
    </div>
    END;
}

?>