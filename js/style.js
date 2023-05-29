function popup() {
    swal({
      title: "Good job!",
      text: "Product Added To Cart",
      icon: "success",
    });
  }


// const form =document.getElementById('form')
// const username = document.getElementById('username')
// const email = document.getElementById('email')
// const pass = document.getElementById('password')


// form.addEventListener('submit',e=>{
//   e.preventDefault();
//   ValiditeInputs();
// })

// const setError = (element,message) =>{
//     const inputControl = element.parentElement;
//     const errorDisplay = element.querySelector('.error');
    
//     errorDisplay.innerText = message;
//     inputControl.classList.add('success');
//     inputControl.classList.remove('error');
//   }

// const setSuccess = (element) =>{
//   const inputControl = element.parentElement;
//   const errorDisplay = element.querySelector('.error');
  
//   errorDisplay.innerText = '';
//   inputControl.classList.add('error');
//   inputControl.classList.remove('success');
// }

// function ValiditeInputs(){
//   const usernameValue = username.value.trim();
//   const passwordValue =  password.value.trim();
  
  
//   if(usernameValue == ''){
//       setError(username,'UserName is not valid')
//   }else{
//     setSuccess(username);
//   }

//   if(passwordValue == ''){
//       setError(pass,'password is required')
//   }else if(passwordValue.legth < 3){
//     setError(password,'password length at least 4 charcters');
//   }else{
//     setSuccess(password);
//   }
// }