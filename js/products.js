const products = [
  {
    ProductId: 1,
    image: "data:image/jpeg;base64,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",
    name: "Quant tinor headphone",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 325.99,
    status: "Free Shopping",
  },
  {
    ProductId: 2,
    image: "https://cdn.shopify.com/s/files/1/1859/8979/files/CPI-0158-inline-img-01.jpg?v=1553883913",
    name: "Watch Quant tinor",
    description: "Adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 178.25,
    status: "Free Shopping",
  },
  {
    ProductId: 3,
    image: "https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZHVjdHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&w=1000&q=80",
    name: "Red Nike",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 1000,
    status: "Free Shopping",
  },
  {
    ProductId: 4,
    image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-zrVKSRPf9ZNiqVtxpxKLIk2eE9JmJZ086w&usqp=CAU",
    name: "t-shirt Quant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 50.41,
    status: "Free Shopping",
  },
  {
    ProductId: 5,
    image: "data:image/jpeg;base64,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",
    name: "t-shirt Muant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 30.50,
    status: "Free Shopping",
  },
  {
    ProductId: 6,
    image: "https://imgs.michaels.com/MAM/assets/1/726D45CA1C364650A39CD1B336F03305/img/91F89859AE004153A24E7852F8666F0F/10093625_r.jpg?fit=inside|540:540",
    name: "t-shirt Kuant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 45.90,
    status: "Free Shopping",
  },
  {
    ProductId: 7,
    image: "data:image/jpeg;base64,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",
    name: "t-shirt Zuant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 99.45,
    status: "Free Shopping",
  },

  {
    ProductId: 6,
    image: "https://imgs.michaels.com/MAM/assets/1/726D45CA1C364650A39CD1B336F03305/img/91F89859AE004153A24E7852F8666F0F/10093625_r.jpg?fit=inside|540:540",
    name: "t-shirt Kuant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 45.90,
    status: "Free Shopping",
  },

  {
    ProductId: 6,
    image: "https://imgs.michaels.com/MAM/assets/1/726D45CA1C364650A39CD1B336F03305/img/91F89859AE004153A24E7852F8666F0F/10093625_r.jpg?fit=inside|540:540",
    name: "t-shirt Kuant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 45.90,
    status: "Free Shopping",
  },

  {
    ProductId: 6,
    image: "https://imgs.michaels.com/MAM/assets/1/726D45CA1C364650A39CD1B336F03305/img/91F89859AE004153A24E7852F8666F0F/10093625_r.jpg?fit=inside|540:540",
    name: "t-shirt Kuant",
    description: "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam, soluta. Eius, eveniet aliquid. Atque, doloribus Cum cupiditate eum reiciendis debitis modi illo, expedita laudantium non, amet voluptatem minus quod impedit",
    price: 45.90,
    status: "Free Shopping",
  },

  
];


let newIn = document.querySelector(".new");
// products.map((card)=>{
//    cards.innerHTML += ` <div class="card mb-3 p-3 id="${card.ProductId}"" >
//    <div class="row g-0">
//      <div class="col-md-3 text-center">
//        <img src="${card.image}" class="img-fluid rounded-start" alt="...">
//      </div>
//      <div class="col-md-6">
//        <div class="card-body">
//          <h5 class="card-title">${card.name}</h5>
//          <p class="card-text">${card.description}</p>
//          </p>
//        </div>
//      </div>
//      <div class="col-md-3 text-center">
//        <h5 class="price">${card.price}$</h5>
//        <h5 class="price">${card.status}</h5>
//        <button type="button" class="btn btn-primary w-75 my-3 ">Products</button>
//        <button type="button" class="btn btn-danger w-75">Delete</button>

//      </div>
//    </div>
//  </div>`
    

// })

products.map((card)=>{
  newIn.innerHTML += 
  ` <div class=" item  p-3 id="${card.ProductId}"" >
  
    <div class=" text-center item-img">
      <img src="${card.image}" class=" rounded-start" alt="..."> 
      <h6 class="price mt-3">${card.price}$</h6>
  </div>
</div>`
   

})

let popular = document.querySelector(".popular");

products.map((card)=>{
  popular.innerHTML += ` <div class=" item  p-3 id="${card.ProductId}"" >
  <div class="row g-0">
    <div class=" text-center item-img">
      <img src="${card.image}" class=" rounded-start" alt="...">
    </div>
    
    <div class=" text-center">
      <h6 class="price mt-3">${card.price}$</h6>
      
     

    </div>
  </div>
</div>`
   

})

let currentScrollPosition = 0;
let scrollAmount = 120;
let scont = document.querySelector(".story-container")
const hScroll = document.querySelector(".horizontal-scroll")
let maxScroll = -scont.offsetWidth + hScroll.offsetWidth;

console.log(hScroll.offsetWidth)
const btn_scroll_right = document.querySelectorAll(".btn-scroll-right");
const btn_scroll_left = document.querySelectorAll(".btn-scroll-left");

// function scrollHorizontally(val){
//   console.log("yes")
//   currentScrollPosition += (val * scrollAmount);
//   scont.style.left = currentScrollPosition + "px"
// }

function scrollLeft(wrapper){
  wrapper.scrollLeft += 120;
}

function scrollRight(wrapper){
  wrapper.scrollLeft -=120;
}


// btn_scroll_right.onclick = function(){
 
//   newIn.scrollLeft += 120;
// }

for(let btn of btn_scroll_right){
  btn.addEventListener("click",()=>{
    let data = btn.getAttribute('data')
    let wrapper = document.querySelector("."+data)
    scrollLeft(wrapper)
  })
}
// btn_scroll_left.onclick = function(){
  
//   newIn.scrollLeft -= 120;
// }

for(let btn of btn_scroll_left){
  btn.addEventListener("click",()=>{
    let data = btn.getAttribute('data')
    let wrapper = document.querySelector("."+data)
    scrollRight(wrapper)
  })
}

