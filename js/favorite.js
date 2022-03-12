
      // const xhttp = new XMLHttpRequest();
//         xhttp.onload = function() {
//         document.body.innerHTML += this.responseText
//     }
//     xhttp.open("POST", "wishlist.php");
// xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// xhttp.send("fname=Henry&lname=Ford");
// $.get("wishlist.php?id=3",function(data,status,xhr){
// console.log(data);

// })
      btn_favorite = document.querySelectorAll(".btn-favorite");

      for(let btn of btn_favorite){
      btn.addEventListener("click",(event)=>{
          console.log(event.currentTarget.id,"id")
         
//           $.get(`wishlist.php?id=${event.currentTarget.id}`,function(data,status,xhr){
//         console.log(data);
       

// })
$.post(`wishlist.php`,{id:event.currentTarget.id},function(data,status,xhr){
        console.log(data);
       

})

      
        if(event.currentTarget.children[0].classList.contains("far")){
        event.currentTarget.children[0].className = "fa fa-light fa-heart display-6 "
        console.log(event.currentTarget,"if")
        }
        else{
          event.currentTarget.children[0].classList.remove("fa")
          event.currentTarget.children[0].classList.add("far")
        }
        
      }
      )
    }
  
    