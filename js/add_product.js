const form = document.getElementById("form");
const name = document.querySelector("#name")
const description = document.querySelector("#description")
const price = document.querySelector("#price")
const img = document.querySelector("#img")

const submit_btn = document.getElementById("submit");
console.log(document.querySelector('#modal'))
// console.log(name,description,price,confirmprice)

let nameValid = false;
let descriptionValid = false;
let priceValid = false;
let confirmValid = false;
form.addEventListener("submit",(event)=>{
    
    console.log("yes")
    checkInput()
    console.log(nameValid,descriptionValid,priceValid,confirmValid)
    if(!nameValid || !descriptionValid || !priceValid){
        console.log("im inside")
    event.preventDefault();
    }

  
})

function checkInput(){
    if(name.value.trim() == ""){
        // name.parentElement.classList.add("error");
        // name.parentElement.querySelector("small").textContent = "User Name can not be empty"
        setError(name," Name can not be empty")
    }
    else{
        setSuccess(name);
        nameValid = true;
    }

    if(price.value.trim() == ""){
        // price.parentElement.classList.add("error");
        // price.parentElement.querySelector("small").textContent = "User price can not be empty"
        setError(price," price can not be empty")
    }
    else{
        setSuccess(price);
        priceValid = true;
    }



    if(description.value.trim()==""){
        setError(description,"description can not be empty")
    }

    else{
       setSuccess(description);
       descriptionValid = true
    }

  

   
}

function setError(input,text){
    const form_control = input.parentElement;
    form_control.classList.remove("success")
    form_control.classList.add("error");
    form_control.querySelector("small").textContent = text;

}

function setSuccess(input){
    const form_control = input.parentElement;
    form_control.classList.remove("error");
    form_control.classList.add("success")
}



