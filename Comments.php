<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    
</head>
<body>

</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
.btn-cart:hover{
    color:white !important;
}
.btn-cart{
    color:#0b5ed7 !important;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;
    // var product_id = parseInt(<?php //echo $_SESSION['product_id']; ?>);
    var product_id = parseInt(<?php echo $_GET['id']; ?>);
    
//when the user click on the button the code will execute 
    $('#add_review').click(function(){
//pop up model in the page 
        $('#review_modal').modal('show');

    });
//when the mouse over the star icon 
    $(document).on('mouseenter', '.submit_star', function(){
//fetch and store
        //alert(product_id);
        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {
            //change the color of the star icon
            $('#submit_star_'+count).addClass('text-warning');

        }

    });
//when the mouse leave and not clicked on the star
    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }
//
    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });
//when we click on the star 
    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {//data that will be send to the server 
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{product_id:product_id,rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    // header("Location:product_details.php"); 
                
                //     load_rating_data();

                //    alert(data);
                }
                
            })
        }
        
          window.location.href = "product_details.php?id="+product_id ; 
        
        

    });

//    load_rating_data();

//     function load_rating_data()
//     {
//         $.ajax({
//             url:"submit_rating.php",// send the ajax request to this url
//             method:"POST",
//             data:{action:'load_data'},//define the data which we want to send to the server. 
//             dataType:"JSON",//the format 
//             success:function(data) // if it is cemplete successfuly
//             {
//                 $('#average_rating').text(data.average_rating);
//                 $('#total_review').text(data.total_review);

//                 var count_star = 0;

//                 $('.main_star').each(function(){
//                     count_star++;
//                     if(Math.ceil(data.average_rating) >= count_star)
//                     {
//                         $(this).addClass('text-warning');
//                         $(this).addClass('star-light');
//                     }
//                 });
                
//                 $('#total_five_star_review').text(data.five_star_review);

//                 $('#total_four_star_review').text(data.four_star_review);

//                 $('#total_three_star_review').text(data.three_star_review);

//                 $('#total_two_star_review').text(data.two_star_review);

//                 $('#total_one_star_review').text(data.one_star_review);

//                 $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

//                 $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

//                 $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

//                 $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

//                 $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

//                 if(data.TR > 0)
//                 {
//                     var html = '';

//                     for(var count = 0; count < data.TR; count++)
//                     {
//                         html += '<div class="row mb-3">';

//                         html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.user_name.charAt(0)+'</h3></div></div>';

//                         html += '<div class="col-sm-11">';

//                         html += '<div class="card">';

//                         html += '<div class="card-header"><b>'+data.user_name+'</b></div>';

//                         html += '<div class="card-body">';

//                         for(var star = 1; star <= 5; star++)
//                         {
//                             var class_name = '';

//                             if(data.rating >= star)
//                             {
//                                 class_name = 'text-warning';
//                             }
//                             else
//                             {
//                                 class_name = 'star-light';
//                             }

//                             html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
//                         }

//                         html += '<br />';

//                         html += data.user_review;

//                         html += '</div>';

//                         html += '<div class="card-footer text-right">On '+data.datetime+'</div>';

//                         html += '</div>';

//                         html += '</div>';

//                         html += '</div>';
//                     }

//                     $('#review_content').html(html);
//                 }
//             }
//         })
//     }

});

</script>