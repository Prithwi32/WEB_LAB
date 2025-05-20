function validateForm(event) {
      event.preventDefault(); // prevent form reload

      const name = document.getElementById("name").value.trim();
      const email = document.getElementById("email").value.trim();
      const mobile = document.getElementById("mobile").value.trim();
      const gender = document.getElementById("gender").value;
      const color = document.getElementById("color").value.trim();
      const result = document.getElementById("result");

      // Validation
      if (!name || !email || !mobile || !gender || !color) {
        alert("Please fill out all fields.");
        return false;
      }

      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      const mobilePattern = /^[0-9]{10}$/;

      if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
      }

      if (!mobilePattern.test(mobile)) {
        alert("Please enter a valid 10-digit mobile number.");
        return false;
      }

      // Combine info
      const info = `
Name: ${name}
Email: ${email}
Mobile: ${mobile}
Gender: ${gender}
Favorite Color: ${color}
      `;
      result.value = info.trim();
      return true;
    }