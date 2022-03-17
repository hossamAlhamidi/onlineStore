
<?php if(!isset($_SESSION['email'])){ ?>
 <script>
 let btn_cart = document.querySelectorAll('.btn-cart');
 
//  let cart_num = document.querySelector("#cart-num");
//  cart_num.textContent = parseInt('0');
// const d = new Date();
//   d.setTime(d.getTime() + (3*24*60*60*1000));
//   let expires = "expires="+ d.toUTCString();
  let arr_id = [];
let str = localStorage.getItem("productid");
  if(str!=null){

   arr_id = str.split(",");
}
    for(let btn of btn_cart){
     btn.addEventListener("click",(event)=>{
      cart_num.textContent = parseInt(cart_num.textContent)+1; 
      let id = parseInt(event.currentTarget.id);
      arr_id.push(id)
      // document.cookie = "productid" + "=" + id + ";" + expires + ";path=/";
      localStorage["productid"] = arr_id;
     })

    }
    
  </script>

<?php }?>