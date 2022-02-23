const form = document.getElementById("form");
const userName = document.querySelector("#userName")
const email = document.querySelector("#email")
const password = document.querySelector("#password")
const confirmPassword = document.querySelector("#confirm-password")
const submit_btn = document.getElementById("submit");

console.log(userName,email,password,confirmPassword)

let userValid = false;
let emailValid = false;
let passwordValid = false;
let confirmValid = false;
form.addEventListener("submit",(event)=>{
    checkInput()
    if(!userValid || !emailValid || !passwordValid || !confirmValid){
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

    if(password.value.trim() == ""){
        setError(password,"Password can not be empty")
    }
    else if(!validatePassword(password.value.trim())){
          setError(password,"password should be at least 8 characters and a lowercase character and a number")
    }
    else{
        setSuccess(password)
        passwordValid = true;
    }

    if(confirmPassword.value.trim() == ""){
        setError(confirmPassword,"Confirm your password");
    }
    else if(password.value.trim() != confirmPassword.value.trim()){
        setError(confirmPassword,"Passwords does not match")
    }
    else{
        setSuccess(confirmPassword)
        confirmValid = true;
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

  function validatePassword(password){
      return String(password).toLocaleLowerCase()
      .match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/);
  }