document.getElementById("Form").addEventListener('submit',function(e) {
  e.preventDefault()
  
  console.log("hi")
  const name = document.getElementById("name").value;
  const phonenumber = document.getElementById("phone").value;
  const email = document.getElementById("email").value;
  const pass = document.getElementById("password").value;
  
  const nameError = document.getElementById("nError")
  const numberError = document.getElementById("pError")
  const passwordError = document.getElementById("passError")
  const emailError = document.getElementById("eError")
 
    nameError.innerText = "";
    numberError.innerText = "";
    emailError.innerText = "";
    passwordError.innerText = "";
  
  let valid = true
  if (name ==="") {
      nameError.innerText="Fill the name";
      valid=false;
  }

     phonpat=/^[0-9]{10}$/;
  if (!phonpat.test(phonenumber) ) {
      numberError.innerText="Enter a valid phone number"
      valid=false;
  }

    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if ( !emailPattern.test(email)) {
      emailError.innerText="enter a valid email address";
      valid=false;
  }
  
  if ( pass==="" || pass.length<6) {
      passwordError.innerText="Enter valid password(length must be greater than 6)";
      valid=false;
  }
  if (valid) {
      alert("successfully submitted!");
      return true;

  } else
   {
      return false; 
  }
  });