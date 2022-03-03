const form = document.getElementById("form");
const email = document.querySelector("#email")
const password = document.querySelector("#password")
const submit_btn = document.getElementById("submit");


let emailValid = false;
let passwordValid = false;
form.addEventListener("submit",(event)=>{
    checkInput()
    // if(!emailValid ||  !passwordValid ){
    // event.preventDefault();
    // }

  
})

function checkInput(){
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