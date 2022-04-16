<?php 
session_start();

if(isset($_SESSION['name']))
  if(time()-$_SESSION["login_time_stamp"] > (60*60*5)) {
    session_unset();
    session_destroy();
    header("Location:signin.php");
  }
function test_input($var) {
  $var = trim($var);
  $var = stripslashes($var);
  $var = htmlspecialchars($var);
  return $var;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/search.css">
    <link rel="stylesheet" href="./css/FooterStyle.css">
    <link rel="stylesheet" href="./css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2534293444.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php' ?>
   
    <div id="modal" class="modal " tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered container px-5 " role="document" style="max-width:500px;">
    <div class="modal-content mx-auto container">
      <!-- <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button id="close-btn" type="button" class="close btn " data-dismiss="modal" aria-label="Close" style="font-size:2rem;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
      <h2 class="modal-title my-5 text-center">please Sign in</h5>
      <form   id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <div class="form-control-css ">
     <!-- <label for="email">Email</label> -->
     <input type="text" placeholder="Enter your email" id="email" name="email">
     <i class="fas fa-check-circle"></i>
     <i class="fas fa-exclamation-circle"></i>
     <small>error msg</small>
    </div>

    

       <div class="form-control-css ">
        <!-- <label for="password">Password</label> -->
        <input type="password" placeholder="Enter your password" id="password" name="password">
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>
        <small>error msg</small>
       </div>
       <div class="forgot  ">
           <a href="#"> Forgot Password? </a>
        </div>

        <div class="signup  ">
            <span> don't have an account?</span> <a href="signup.php">sign up</a>
         </div>

      

      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
      </div>
    </form>
    </div>
    </div>
  </div>
</div>
    <?php
    include 'config.php';
    $id = $_GET['id'];
    $sql = "select * from product where id = '" . "$id '";
$result = mysqli_query($conn, $sql);

echo ' <div class="container px-5 my-5">



';
while($row = mysqli_fetch_array($result))
{

// echo '< class=" clickable card item  mx-1" id="'.$row['id'].'"'.'>'.
// '<div class="img-height"> <img class="card-img-top img-fluid" src="../' . $row['photo'] . '"/></div> ' .
// ' <div class="card-body">
// <h5 class="card-title">'. $row["name"].'</h5>
// </div>';

 echo ' 
 <div class="card mb-3" >
   <div class="row g-0 align-items-center ">
     <div class="col-sm-6 ">
       <img src="./' .$row['photo']. '" class="img-fluid rounded-start" alt="...">
     </div>
     <div class="col-sm-6">
       <div class="card-body d-flex flex-column">
         <h5 class="card-title">' .$row['name']. '</h5>
         <p class="card-text">'. $row['description']. '.</p>
         <h5 class="card-title">' .$row['price']. 'SR</h5>
         <div class="d-flex justify-content-center">
         
         <a  id="'.$row["id"].'" class="btn btn-outline-primary btn-cart  my-3 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showInfo()"> ADD TO CART</a>
         <button  type="button" id="'.$row["id"].'" class="btn text-danger btn-favorite  ">';

         if(isset($_SESSION['name'])){
          $email = $_SESSION['email'];
        $sql1 = "select pID from wishlist where email ='$email' AND pID =". $row['id'];
         $result1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1) != 0){
        while($row1 = mysqli_fetch_array($result1))
        {
        if($row['id']==$row1['pID']){
          echo ' <i class=" fa fa-light fa-heart display-6"></i>';
          // $isPrinted =true;
        }
        
        // else if(!$isPrinted) {
        
        // echo ' <i class=" far fa-light fa-heart display-6"></i>1';
        // $isPrinted = true;
        // // echo "<script>
        // // console.log( document.querySelectorAll('.btn-favorite')  )
        // // for(let element of document.querySelectorAll('.btn-favorite')){
        // //   console.log(element.children.length,'length')
        // //   if(element.children.length ==2){
        // //     console.log(element.id,'element')
        // //     var id = element.id
        // //     document.querySelector('#'+id).remove()
        // //   }
        // // }
        
        // // </script>";
        // }
        }
        
        }
        else {
          echo ' <i class=" far fa-light fa-heart display-6"></i>';
        }
        }
        else {
          echo ' <i class=" far fa-light fa-heart display-6"></i>';
        }
         
      echo'   </button>
         
         </div>
         
       </div>
     </div>
   </div>
 </div>
 ';

}

echo ' </div>

';


//  mysqli_close($conn);
    
    ?>
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered container">
    <div class="modal-content  " style="max-width:500px;margin:auto">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body text-center  " style = "min-height:200px;">

      <div class="modal-info">
        <!-- <h3 class="text-success">Added to cart</h3> -->
        
      </div>
      <div class="d-flex my-3 justify-content-center align-items-center">
       <h5 class="text-success me-2">Added to cart</h5>
       <i class="text-success fas fa-check-circle" style="font-size:1.5rem"></i>
    </div>
      <script>
       function showInfo(){
         let id = event.currentTarget.id;
         console.log(id);
        $(".modal-info").load("get_product_modal.php",{id:id})
       
       }
       </script>
       <div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Contiune Shopping</button>
        <a href="cart.php" type="button" class="btn btn-primary">Checkout</a>
      </div>
</div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Contiune Shopping</button>
        <button type="button" class="btn btn-primary">Checkout</button>
      </div> -->
    </div>
  </div>
</div>

     <?php 
   //include 'Footer.php';
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <?php if(isset($_SESSION['email'])){ ?>
    <script src="./js/favorite.js"></script>
    <?php } ?>
    <?php if(!isset($_SESSION['email'])){ ?>
    <script src="./js/signin_popup.js"></script>
    <?php } ?>
    <?php include 'addToCartAjax.php';
     include 'addToCart_non_user.php' ;
    ?>
</body>
</html>


<?php

$average_rating = 0;
$total_review = 0;
$five_star_review = 0;
$four_star_review = 0;
$three_star_review = 0;
$two_star_review = 0;
$one_star_review = 0;
$total_user_rating = 0;

$sql = "
SELECT * FROM review WHERE product_id = '$id'  ORDER BY datetime DESC";
$request = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($request))
	{
		$product_id = $row["product_id"];
		$user_name = $row["user_name"];
		$user_rating = $row['user_rating'];
		$user_review = $row["user_review"];
		$datetime = date('l jS, F Y h:i:s A', $row["datetime"]) ;//function of date
      // echo $user_name;
      // echo $user_rating;
		if($row["user_rating"] == '5')
		{ $five_star_review++;}
		if($row["user_rating"] == '4')
		{	$four_star_review++;}
		if($row["user_rating"] == '3')
		{	$three_star_review++;}
		if($row["user_rating"] == '2')
		{	$two_star_review++;	}
		if($row["user_rating"] == '1')
    {$one_star_review++;	}
		$total_review++;
    $total_user_rating = $total_user_rating + $row["user_rating"];
  }
if($total_review==0){
  $average_rating =0.0;
}else{

 $average_rating = number_format($total_user_rating / $total_review);

}
$FiveBar=0;
$FourBar =0;
$ThreeBar=0;
$TwoBar = 0;
$OneBar =0;
if($total_review!=0){
$FiveBar = ($five_star_review/$total_review)*100;
$FourBar = ($four_star_review/$total_review)*100;
$ThreeBar = ($three_star_review/$total_review)*100;
$TwoBar = ($two_star_review/$total_review)*100;
$OneBar = ($one_star_review/$total_review)*100;

}
echo <<<END
<div class="container">
    	<h1 class="mt-5 mb-5">Review & Rating </h1>
    	<div class="card">
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">$average_rating</span> / 5</b> 
    					</h1>
END;
if($average_rating==5){
  echo <<<END
  <div class="mb-3">
                  <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                </div>
  
  END;
  }
  else if($average_rating==4){
    echo <<<END
  <div class="mb-3">
                  <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                </div>
  
  END;
  
  }
  else if($average_rating==3){
    echo <<<END
  <div class="mb-3">
                  <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                </div>
  
  END;
  }
  else if($average_rating==2){
    echo <<<END
  <div class="mb-3">
                  <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                </div>
  
  END;
  }
  else if($average_rating==1){
    echo <<<END
  <div class="mb-3">
                  <i class="fas fa-star star-light mr-1 main_star text-warning star-light"></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                </div>
  
  END;
  }
  else {
    echo <<<END
  <div class="mb-3">
                  <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                              <i class="fas fa-star star-light mr-1 main_star "></i>
                </div>
  
  END;
  }
  




echo <<<W
<h3><span id="total_review">$total_review</span> Review</h3>
    				</div>
    				<div class="col-sm-4"> <!-- column star -->
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div><!-- display one to five star wise total review in number -->

                            <div class="progress-label-right">(<span id="total_five_star_review">$five_star_review</span>)</div> <!-- dispaly total number of five star rating -->
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress" style =" width:$FiveBar%;"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div><!-- same above but change it to 4  -->
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">$four_star_review</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress" style =" width:$FourBar%;"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">$three_star_review</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress" style =" width:$ThreeBar%;"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">$two_star_review</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"style =" width:$TwoBar%;"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">$one_star_review</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"style =" width:$OneBar%;"></div>
                            </div>               
                        </p>
    				</div>
W;

$CheckPaidProduct = "SELECT email FROM orders_history WHERE pID = '$id' ";
$Send = mysqli_query($conn, $CheckPaidProduct);
$Traget = false;

while($col = mysqli_fetch_array($Send))
	{
    if(isset($_SESSION["email"])){
    if($col["email"]==$_SESSION["email"]){
      if($Traget == false){
      $Traget = true;
    }
    }
  }}
if($Traget !=false ){
  $email = $_SESSION['email'];
  $review_only_one = "select * from review where email = '$email' and product_id =$id";
  $review_onlye_one_result = mysqli_query($conn,$review_only_one);
  if(mysqli_num_rows($review_onlye_one_result)==0)
  {
echo <<<W
    				<div class="col-sm-4 text-center" id = "Hide">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary" >Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div> 
    
W;
  }

}
else{
  echo <<<W
    			
    			</div>
    		</div>
    	</div>
    	
    </div> 
W;

}

    ?>
    
<?php 


  if($Traget==true){
   include 'Comments.php';
  }
  $Traget = false;
	$sql = "
	SELECT * FROM review WHERE product_id = '$id'  ORDER BY datetime DESC";
	$request = mysqli_query($conn, $sql);
	
	
	
	while($row = mysqli_fetch_array($request))
	{
		$product_id = $row["product_id"];
		$user_name = $row["user_name"];
		$user_rating = $row['user_rating'];
		$user_review = $row["user_review"];
		$datetime = date('l jS, F Y h:i:s A', $row["datetime"]) ;//function of date
  
    echo <<<End
    <div class="container">
     <div class="row mb-3">
        <div class="col-sm-11">
           <div class="card">
              <div class="card-header"><b>$user_name</b></div>
                <div class="card-body">
    End;
    if($user_rating == 1)
    echo'<span style="font-size:30px;color:#FDCC0D;"> ★</span><br>';
  elseif($user_rating == 2)
    echo'<span style="font-size:30px;color:#FDCC0D;"> ★★</span><br>';
  elseif($user_rating == 3)
    echo'<span style="font-size:30px;color:#FDCC0D;">★★★</span><br>';
  elseif($user_rating == 4)
    echo'<span style="font-size:30px;color:#FDCC0D;"> ★★★★</span><br>';
  elseif($user_rating == 5)
    echo'<span style="font-size:30px;color:#FDCC0D;"> ★★★★★</span><br>';
         
    echo <<<END
    $user_review 
    </div>
    <div class="card-footer text-right">On $datetime</div>
      </div>
      </div>
      </div>
      </div>
    END;

	}

	


       

  ?>
  <script>
    var hidden = false;
    function action() {
        // hidden = !hidden;
        // if(hidden) {
        //     document.getElementById('Hide').style.visibility = 'hidden';
        //     document.getElementById('add_review').style.visibility = 'hidden';
        // } 
    }
</script>
<?php 
   include 'Footer.php';
  ?>