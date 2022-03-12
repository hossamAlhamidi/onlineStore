var btn_favorite = document.querySelectorAll('.btn-favorite');
for(let btn of btn_favorite){
    btn.addEventListener('click',()=>{
        document.querySelector('div.modal').style.display = "block";
    })
}

document.querySelector('#close').addEventListener('click',()=>{
    document.querySelector('#modal').style.display = 'none';
   });
//    document.querySelector('#close-btn').addEventListener('click',()=>{
//     document.querySelector('#modal').style.display = 'none';
//    });