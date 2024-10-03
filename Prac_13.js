function displayInfo() {
    // Get values from the form fields
    let name = document.getElementById("name").value;
    let dob = document.getElementById("dob").value;
    let gender = document.querySelector('input[name="gender"]:checked') ? document.querySelector('input[name="gender"]:checked').value : '';
    let email = document.getElementById("email").value;
    let mobile = document.getElementById("mobile").value;
    let address = document.getElementById("address").value;
    let state = document.getElementById("state").value;
    let education = document.getElementById("education").value;

    // Validate that all fields are filled (simple validation)
    if (!name || !dob || !gender || !email || !mobile || !address || !state || !education) {
        alert("Please fill out all the fields!");
        return;
    }

    let outputText = `Name: ${name}\n
    Date of Birth: ${dob}\n
    Gender: ${gender}\n
    Email: ${email}\n
    Mobile: ${mobile}\n
    Address: ${address}\n
    State: ${state}\n
    Education: ${education}`;

// Display the combined information in the "output" textarea
document.getElementById("output").value = outputText;
}