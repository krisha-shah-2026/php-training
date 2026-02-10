$("#myForm").on("submit", function (e) {
    e.preventDefault();
 
    $(".error").text(""); // Clear previous errors
    let isValid = true;
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let email = $("#email").val();
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    let password = $("#password").val();
    let confirmPassword = $("#confirmPassword").val();
    let address = $("#address").val();
    let phoneNumber = $("#phone").val();
    let countryName = $("#country").val();
    let selectedGender = $("input[name='gender']:checked").val();
 
    // Validation
    if (firstName == "") {
      $("#firstNameError").text("First Name is required");
      isValid = false;
    }
    if (lastName == "") {
      $("#lastNameError").text("Last Name is required");
      isValid = false;
    }
    if (email == "") {
      $("#emailError").text("Email is required");
      isValid = false;
    } else if (!email.match(emailPattern)) {
      $("#emailError").text("Invalid email format");
      isValid = false;
    }
 
    if (password) {
      if (password.length < 8) {
        $("#passwordError").text("Password must be at least 8 characters");
        isValid = false;
      }
      if (confirmPassword == "") {
        $("#confirmPasswordError").text("Confirm Password is required");
        isValid = false;
      } else if (password != confirmPassword) {
        $("#confirmPasswordError").text("Passwords do not match");
        isValid = false;
      }
    }
 
    if (phoneNumber == "" || !$.isNumeric(phoneNumber) || phoneNumber.length != 10) {
      $("#phoneNumberError").text("Enter a valid 10-digit phone number");
      isValid = false;
    }
 
    if (address == "") {
      $("#addressError").text("Address is required");
      isValid = false;
    }
 
    if (!selectedGender) {
      $("#genderError").text("Please select a gender");
      isValid = false;
    }
 
    if ($(".hobby:checked").length == 0) {
      $("#hobbyError").text("Select at least one hobby");
      isValid = false;
    }
 
    if (countryName == "") {
      $("#countryError").text("Please select a country");
      isValid = false;
    }
 
    if (isValid) {
    let formData = new FormData(this); // "this" refers to #myForm

    $.ajax({
        url: "ajaxAddUser.php",
        type: "POST",
        data: formData,
        processData: false, // Required for FormData
        contentType: false, // Required for FormData
        success: function(response) {
            console.log("Success:", response);
        }
    });
}
 
  
  });

 
 
 

function deleteUser(user_Id) {
   
    window.location.href = "delete.php?id=" + user_Id;
}
var editUserModal = document.getElementById('editUserModal');
editUserModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget;
  // Extract info from data-id attribute
  var userId = button.getAttribute('data-id');
  
  // Update the modal's hidden input
  var modalInputId = editUserModal.querySelector('#edit_user_id');
  modalInputId.value = userId;

  // Optional: Use AJAX to fetch current user details and populate fields
  // fetch('get_user.php?id=' + userId).then(...)
});