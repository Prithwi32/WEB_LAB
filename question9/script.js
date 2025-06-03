function validateForm() {
  var userId = document.getElementById("userid").value.trim();
  var name = document.getElementById("name").value.trim();
  var password = document.getElementById("password").value;
  var email = document.getElementById("email").value.trim();

  // Validate User ID (5 to 12 characters)
  if (userId.length < 5 || userId.length > 12) {
    alert("User ID must be between 5 and 12 characters.");
    return false;
  }

  // Validate Name (only letters, at least 15 characters)
  var nameRegex = /^[A-Za-z\s]+$/;
  if (!nameRegex.test(name) || name.length < 15) {
    alert("Name must contain only alphabets and be at least 15 characters long.");
    return false;
  }

  // Validate Password
  // At least 8 characters, 1 uppercase, 1 special character, alphanumeric
  var passwordRegex = /^(?=.*[A-Z])(?=.*[a-zA-Z0-9])(?=.*[\W_]).{8,}$/;
  if (!passwordRegex.test(password)) {
    alert("Password must be at least 8 characters, include one uppercase letter, one special character, and be alphanumeric.");
    return false;
  }

  // Validate Email
  var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }

  alert("Form submitted successfully!");
  return true;
}
