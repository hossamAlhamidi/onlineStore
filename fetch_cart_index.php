<?php 

include 'config.php';

$quantity = 1;
if(isset($_POST['arr_id'])){
$arr = $_POST['arr_id'];  // has duplicate

$arr_id = array_unique($arr);

foreach($arr_id as $id ){
  
    // $quantity=1;
//   $duplicate =  array_count_values($arr_id);
//   foreach($duplicate as $dup =>$count){
//       if($count ==2){
//       echo $dup;
//       break;
//       }
//   }
  
  $sql = "select * from product where id = $id";
$result = mysqli_query($conn,$sql);
if($result){
while($row = mysqli_fetch_array($result)){
    $id = $row['id'];
    $photo = $row['photo'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    echo <<<END
    <div class="card mb-3 border me-2" >
    <div class="d-flex align-items-center g-0">
      <div class="col-3 com-sm-4 container-img-cart ">
        <img src="$photo" class="img-fluid img-cart rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h3 class="card-title mb-3">$name</h3>
         
          <h3 id="$id" class="card-text price mb-5">$price SR</h3>
          <div class = "cart-btns">
          <button number="$id" class="btn cart-remove text-muted "><i class="mx-2 fa fa-solid fa-trash"></i>remove</button>
          <form class="">
      <select disabled id="sel$id"  class=" select form-select-sm" aria-label=".form-select-sm example" onchange="selectValue(this.value)">
      <option selected value="$quantity" hidden>
      $quantity
      </option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      </select>
      </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    END;
}
}
else {
  echo 'your cart is empty';
}
}
}




// function find_duplicate(){
// $duplicate =  array_count_values($arr);
// foreach($duplicate as $dup =>$count){
//     if($count ==2){
//    return $dup;
   
//     }
//     return 0;
// }
// // $count = 0;
// // $duplicate = array();
// // foreach($arr as $id){

// // }
// }
?>

<script>

var duplicate_id = "<?= implode(",",$arr); ;?>";
console.log(duplicate_id,'dup');
var duplicate_arr = duplicate_id.split(",")
const toFindDuplicates = duplicate_arr => duplicate_arr.filter((item, index) => duplicate_arr.indexOf(item) !== index)
const duplicateElements = toFindDuplicates(duplicate_arr);
console.log(duplicateElements);
for(let select of duplicateElements){
  let temp =  document.querySelector(`#sel${select}`)
    temp.value = ++temp.value;
}
function selectValue(val){
    let id = event.currentTarget.id;
    localStorage[id] = val //save quantity 
    let select = document.querySelector(`#${id}`)
    console.log(select , localStorage.getItem(id));
    select.value = localStorage.getItem(id);


}

let btn_remove = document.querySelectorAll(".cart-remove");
for(let btn of btn_remove){
  btn.addEventListener("click",(event)=>{
    let id = event.currentTarget.getAttribute("number");
  let filtered_storage =   localStorage['productid'].split(",").filter((e)=>e!=id)
  console.log(filtered_storage,"filter");
  if(filtered_storage.length ==0){
    localStorage.removeItem("productid");
  }
  else {
    localStorage['productid'] = filtered_storage;
  }
  console.log(localStorage['productid'],"local");
  // $("#cart").load("fetch_cart_index.php",{arr_id: filtered_storage},function(data,status){
  //      if(status == "success"){
  //       let sum = 0;
  //        let total = document.querySelectorAll(".price");
  //        for(let price of total){
  //          let quantity = document.querySelector(`#sel${price.id}`).value
           
  //           sum += parseInt(price.textContent) * quantity
  //        }
  //        document.querySelector("#price").textContent = sum;
  //      }
  //    })
  location.reload();
  })
}
</script>