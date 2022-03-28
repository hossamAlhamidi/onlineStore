<?php 

include 'config.php';
$id = $_POST['id'];
$sql = "select * from product where id = $id";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
    $photo = $row['photo'];
    $name = $row['name'];
    echo <<<END
    <div class="row align-items-center"> 
    <img class="img-fluid col-3" src="$photo" alt="photo" />
    <h5 class="col-9"> $name </h5>
    </div>
    END;
}

?>