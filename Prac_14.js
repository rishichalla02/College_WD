function validateForm() {
    let valid = true;

    // Clear previous error messages
    clearErrors();

    // Validate Name
    let name = document.getElementById("name").value;
    if (name === "") {
        showError("nameError", "Name is required.");
        valid = false;
    }

    // Validate Date of Birth
    let dob = document.getElementById("dob").value;
    if (dob === "") {
        showError("dobError", "Date of birth is required.");
        valid = false;
    }

    // Validate Gender
    let gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        showError("genderError", "Gender is required.");
        valid = false;
    }

    // Validate Email
    let email = document.getElementById("email").value;
    if (email === "") {
        showError("emailError", "Email is required.");
        valid = false;
    } else if (!validateEmail(email)) {
        showError("emailError", "Please enter a valid email address.");
        valid = false;
    }

    // Validate Mobile No.
    let mobile = document.getElementById("mobile").value;
    if (mobile === "") {
        showError("mobileError", "Mobile number is required.");
        valid = false;
    } else if (!validateMobile(mobile)) {
        showError("mobileError", "Please enter a valid 10-digit mobile number.");
        valid = false;
    }

    // Validate Address
    let address = document.getElementById("address").value;
    if (address === "") {
        showError("addressError", "Address is required.");
        valid = false;
    }

    // Validate State
    let state = document.getElementById("state").value;
    if (state === "") {
        showError("stateError", "State is required.");
        valid = false;
    }

    // Validate Education
    let education = document.getElementById("education").value;
    if (education === "") {
        showError("educationError", "Education is required.");
        valid = false;
    }

    // Prevent form submission if validation fails
    return valid;
}

// Helper function to display error messages
function showError(id, message) {
    document.getElementById(id).innerHTML = message;
}

// Helper function to clear previous errors
function clearErrors() {
    let errorElements = document.querySelectorAll(".error");
    errorElements.forEach((el) => (el.innerHTML = ""));
}

// Helper function to validate email format
function validateEmail(email) {
    let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// Helper function to validate mobile number (must be 10 digits)
function validateMobile(mobile) {
    let re = /^\d{10}$/;
    return re.test(String(mobile));
}
