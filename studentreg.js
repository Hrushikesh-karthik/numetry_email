function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var address = document.getElementById("address").value;
  var dob = document.getElementById("dob").value;
  var branch = document.getElementById("branch").value;
  var isValid = true;

  // Reset error messages
  document.getElementById("nameError").innerHTML = "";
  document.getElementById("emailError").innerHTML = "";
  document.getElementById("phoneError").innerHTML = "";
  document.getElementById("addressError").innerHTML = "";
  document.getElementById("dobError").innerHTML = "";
  document.getElementById("branchError").innerHTML = "";

  // Validation checks
  if (name === "") {
    document.getElementById("nameError").innerHTML = "Name is required";
    isValid = false;
  }
  if (email === "") {
    document.getElementById("emailError").innerHTML = "Email is required";
    isValid = false;
  } else if (!/\S+@\S+\.\S+/.test(email)) {
    document.getElementById("emailError").innerHTML = "Invalid email format";
    isValid = false;
  }
  if (phone === "") {
    document.getElementById("phoneError").innerHTML = "Phone is required";
    isValid = false;
  } else if (!/^\d{10}$/.test(phone)) {
    document.getElementById("phoneError").innerHTML = "Phone number must be 10 digits";
    isValid = false;
  }
  if (branch === "") {
    document.getElementById("branchError").innerHTML = "Branch is required";
    isValid = false;
  }
  if (dob === "") {
    document.getElementById("dobError").innerHTML = "DOB is required";
    isValid = false;
  }
  if (address === "") {
    document.getElementById("addressError").innerHTML = "Address is required";
    isValid = false;
  }

  if (isValid) {
    alert("Successfully Registered");
  }
  return isValid;
}

// EmailJS initialization
(function() {
  emailjs.init("6jBUT0xhmtIq-jTmg"); // Replace with your EmailJs user ID
})();

// Handle form submission
document.getElementById('myForm').addEventListener('submit', function(event) {
  event.preventDefault();

  const emailPot = document.getElementById('emailPot').value;

  // Check if email pot is filled out (indicating a bot)
  if (emailPot) {
      console.log("Spam detected");
      return;
  }

  // Send the form data using EmailJs
  emailjs.sendForm('service_gvcjhk9', 'template_mepclld', this)
      .then(function(response) {
          console.log('SUCCESS!', response.status, response.text);
      }, function(error) {
          console.log('FAILED...', error);
      });
});
