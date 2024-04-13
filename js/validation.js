// Function to validate form
function validateForm() {
    // Get form fields
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value.trim();

    // Check if any field is empty
    if (email === '' || password === '') {
        // Display alert for empty fields
        alert('Please fill in all fields.');
        return false;
    }

    // If all validations pass, display success alert
    alert('You are logged in!'); // Alert for successful login

    // If all validations pass, return true
    return true;
}
