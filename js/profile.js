const form = document.getElementById("form");
const userName = document.querySelector("#name")
const email = document.querySelector("#email")
const phoneNumber = document.querySelector("#phone-number")
const address = document.querySelector("#address")
const city = document.querySelector("#city")
const submit_btn = document.getElementById("submit");



let userValid = false;
let emailValid = false;
let phoneValid = false;
let addressValid = false;
let cityValid = false;
form.addEventListener("submit",(event)=>{
    // event.preventDefault();
    checkInput()
    if(!userValid || !emailValid || !phoneValid || !addressValid || !cityValid ){
    event.preventDefault();
    }

  
})

function checkInput(){
    if(userName.value.trim() == ""){
        // userName.parentElement.classList.add("error");
        // userName.parentElement.querySelector("small").textContent = "User Name can not be empty"
        setError(userName,"User Name can not be empty")
    }
    else{
        setSuccess(userName);
        userValid = true;
    }

    if(email.value.trim()==""){
        setError(email,"Email can not be empty")
    }
    else if(!validateEmail(email.value.trim())){
         setError(email,"Email is not valid")
    }
    else{
       setSuccess(email);
       emailValid = true
    }


    if(phoneNumber.value.trim()==""){
        setError(phoneNumber,"phone number can not be empty")
    }
    else if(!validatePhone(phoneNumber.value.trim())){
        setError(phoneNumber,"phone number must be 10 numbers including zero")
    }
    else {
        setSuccess(phoneNumber);
       phoneValid = true
    }
  
    if(address.value.trim() == ""){
        // address.parentElement.classList.add("error");
        // address.parentElement.querySelector("small").textContent = "User Name can not be empty"
        setError(address,"Address can not be empty")
    }
    else{
        setSuccess(address);
        addressValid = true;
    }

    if(city.value.trim() == ""){
        // city.parentElement.classList.add("error");
        // city.parentElement.querySelector("small").textContent = "User Name can not be empty"
        setError(city,"city can not be empty")
    }
    else{
        setSuccess(city);
        cityValid = true;
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

const validateEmail = (email) => {
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };

  function validatePhone(phone){
  
      return phone.match(/^\d+$/) && phone.match(/^\d+$/).join(",").length == 10 ;
  }