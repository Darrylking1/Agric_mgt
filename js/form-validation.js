function validateForm() {
  // Get form fields
  var username = document.getElementById('username').value.trim();
  var farmName = document.getElementById('farmName').value.trim();
  var location = document.getElementById('location').value.trim();
  var email = document.getElementById('email').value.trim();
  var password = document.getElementById('password').value.trim();
  var retypePassword = document.getElementById('retypePassword').value.trim(); // New line to get the value of retypePassword field

  // Check if any field is empty
  if (username === '' || farmName === '' || location === '' || email === '' || password === '' || retypePassword === '') { // Updated condition to include retypePassword
    alert('Please fill in all fields.');
    return false;
  }

  // Check email format using regex
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert('Please enter a valid email address.');
    return false;
  }

  // Check password length
  if (password.length < 6) {
    alert('Password must be at least 6 characters long.');
    return false;
  }

  // Check if passwords match
  if (password !== retypePassword) {
    alert('Passwords do not match. Please retype your password.');
    return false;
  }

  // If all validations pass, return true
  return true;
}

// Function to validate passwords match
function validatePasswordsMatch() {
  var password = document.getElementById('password').value.trim();
  var retypePassword = document.getElementById('retypePassword').value.trim();

  if (password !== retypePassword) {
    alert('Passwords do not match. Please retype your password.');
    return false;
  }

  return true;
}
