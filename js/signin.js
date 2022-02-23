const form = document.getElementById("form");
const userName = document.querySelector("#userName")
const password = document.querySelector("#password")
const submit_btn = document.getElementById("submit");


form.addEventListener("submit",(event)=>{
    let userValid = false;
    let passwordValid = false;
    checkInput()
    // if(!userValid ||  !passwordValid ){
    // event.preventDefault();
    // }

  
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