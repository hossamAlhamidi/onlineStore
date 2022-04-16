<?php

//submit_rating.php
include 'config.php';
if(isset($_POST["rating_data"]))
{
		// $product_id = $_POST["product_id"];
		// $user_name = $_POST["user_name"];
		// $user_rating = $_POST['rating_data'];
		// $user_review = $_POST["user_review"];
		// $datetime = time();

		$product_id = test_input($_POST["product_id"]);
		$user_name = test_input($_POST["user_name"]);
		$user_rating = test_input($_POST['rating_data']);
		$user_review = test_input($_POST["user_review"]);
		$datetime = time();
		 
	  
	
	$sql = "
	INSERT INTO review 
	(product_id,user_name, user_rating, user_review, datetime) 
	VALUES ('$product_id','$user_name','$user_rating' ,'$user_review' ,'$datetime')";
	$statement = mysqli_query($conn, $sql);
	
	//$statement->execute($data);
	
	//echo $_GET['id'];
	
	// echo "Your Review & Rating Successfully Submitted";
	
}

// if(isset($_POST["action"]))
// {//to display the information
// 	$average_rating = 0;
// 	$total_review = 0;
// 	$five_star_review = 0;
// 	$four_star_review = 0;
// 	$three_star_review = 0;
// 	$two_star_review = 0;
// 	$one_star_review = 0;
// 	$total_user_rating = 0;
// 	// $review_content = array();//change

// 	$sql = "
// 	SELECT * FROM review WHERE ORDER BY review_id  DESC";
// 	$request = mysqli_query($conn, $sql);
	
// 	//$result = $conn->query($sql, PDO::FETCH_ASSOC);//execute the above query and return the result in array format
	
	
// 	while($row = mysqli_fetch_array($request))
// 	{
		
// 		$product_id = $row["product_id"];
// 		$user_name = $row["user_name"];
// 		$user_rating = $row['rating_data'];
// 		$user_review = $row["user_review"];
// 		$datetime = date('l jS, F Y h:i:s A', $row["datetime"]) ;//function of date
// 		// $review_content[] = array(
// 		// 	'product_id'	=>  $row["product_id"],
// 		// 	'user_name'		=>	$row["user_name"],
// 		// 	'user_review'	=>	$row["user_review"],
// 		// 	'rating'		=>	$row["user_rating"],
// 		// 	'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"]) 
// 		// );

// 		if($row["user_rating"] == '5')
// 		{
// 			$five_star_review++;
// 		}

// 		if($row["user_rating"] == '4')
// 		{
// 			$four_star_review++;
// 		}

// 		if($row["user_rating"] == '3')
// 		{
// 			$three_star_review++;
// 		}

// 		if($row["user_rating"] == '2')
// 		{
// 			$two_star_review++;
// 		}

// 		if($row["user_rating"] == '1')
// 		{
// 			$one_star_review++;
// 		}

// 		$total_review++;

// 		$total_user_rating = $total_user_rating + $row["user_rating"];

// 	}

// 	$average_rating = number_format($total_user_rating / $total_review);

// 	// $output = array(
// 	// 	'average_rating'	=>	number_format($average_rating, 1),
// 	// 	'total_review'		=>	$total_review,
// 	// 	'five_star_review'	=>	$five_star_review,
// 	// 	'four_star_review'	=>	$four_star_review,
// 	// 	'three_star_review'	=>	$three_star_review,
// 	// 	'two_star_review'	=>	$two_star_review,
// 	// 	'one_star_review'	=>	$one_star_review,
// 	// 	'review_data'		=>	$review_content//change
// 	// );
// 	echo json_encode($TR);
// 	echo json_encode($average_rating);
// 	echo json_encode($total_review);
// 	echo json_encode($five_star_review);
// 	echo json_encode($four_star_review);
// 	echo json_encode($three_star_review);
// 	echo json_encode($two_star_review);
// 	echo json_encode($one_star_review);
// 	echo json_encode($product_id);
// 	echo json_encode($user_name);
// 	echo json_encode($user_rating);
// 	echo json_encode($user_review);
// 	echo json_encode($datetime);
	
// }
function test_input($var) {
	$var = trim($var);
	$var = stripslashes($var);
	$var = htmlspecialchars($var);
	return $var;
  }
  
?>