$(document).ready(function(){
 
$("#myForm").on("submit", function (e) {
 
    e.preventDefault();
 
    $(".error").text(""); 
    let isValid = true;
 
    let firstName = $("#firstName").val().trim();
    let lastName = $("#lastName").val().trim();
    let email = $("#email").val().trim();
    let password = $("#password").val();
    let confirmPassword = $("#confirmPassword").val();
    let address = $("#address").val().trim();
    let phoneNumber = $("#phone").val().trim();
    let countryName = $("#country").val();
    let selectedGender = $("input[name='gender']:checked").val();
    let profileImage = $("#profile_image")[0].files[0];
 
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
 
    if(firstName == ""){
        $("#firstNameError").text("First name required");
        isValid = false;
    }
 
    if(lastName == ""){
        $("#lastNameError").text("Last name required");
        isValid = false;
    }
 
    if(email == ""){
        $("#emailError").text("Email required");
        isValid = false;
    } 
    else if(!email.match(emailPattern)){
        $("#emailError").text("Invalid email");
        isValid = false;
    }

  if(password == "") {
    $( "#passwordError" ).text( "Password required" );
    isValid = false;
} else if(password.length < 8) { 
    $( "#passwordError" ).text( "Min 8 characters" );
    isValid = false;
} if (password == "") {
    $("#confirmPasswordError").text("Confirm Password required");
    isValid = false;
}
    if(password != confirmPassword){
        $("#confirmPasswordError").text("Password not match");
        isValid = false;
    }
  if(!profileImage){
    $("#imageError").text("Profile image required");
    isValid = false;
}
 
    if(address == ""){
        $("#addressError").text("Address required");
        isValid = false;
    }
 
    if(!/^[0-9]{10}$/.test(phoneNumber)){
        $("#phoneNumberError").text("Enter valid phone");
        isValid = false;
    }
 
    if(!selectedGender){
        $("#genderError").text("Select gender");
        isValid = false;
    }
 
    if($(".hobby:checked").length == 0){
        $("#hobbyError").text("Select hobby");
        isValid = false;
    }
 
    if(countryName == ""){
        $("#countryError").text("Select country");
        isValid = false;
    }
 
    if(!isValid){
        console.log("VALIDATION FAILED");
        return;
    }
 
 
    let formData = new FormData(this);
 
    $.ajax({
        url: "insert.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
         dataType: "json",
 
 success: function(res) {
    if (res.status === "success") {
         const modalElement = document.getElementById('userModal');
        const modal = bootstrap.Modal.getOrCreateInstance(modalElement);
        modal.hide();
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
       
        $("#myForm")[0].reset(); 
        
      
        localStorage.setItem("userAddedSuccess", "true"); 
        
     
        loadUsers(); 
       
      
    }
}

    });
});

 
});
function loadUsers(){
    $.ajax({
        url: 'fetchuser.php',
        type: 'GET',
        success: function(data){
            $('#userTable tbody').html(data);
            
        }
    });
}
$(document).ready(function(){
    loadUsers();
});





$(document).on("click",".edit-btn",function(){
 
    var id = $(this).data("id");
 
    $.ajax({
        url:"getUser.php",
        type:"POST",
        data:{id:id},
        success:function(data){
 
            var user = JSON.parse(data);
 
            $("#user_id").val(user.user_id);
            $("#firstName").val(user.first_name);
            $("#lastName").val(user.last_name);
            $("#email").val(user.email);
            $("#password").val(user.password);
            $("#confirmPassword").val(user.confirm_password);
            $("#address").val(user.address);
            $("#phone").val(user.phone_no);
            $("#country").val(user.country);
   
            $("#profileimage").attr("src", user.profile_image);
     
            
        
            $("input[name='gender'][value='"+user.gender+"']").prop("checked",true);
        
            let hobbies = user.hobby.split(",");
            $(".hobby").prop("checked",false);
            hobbies.forEach(h => {
                $(".hobby[value='"+h+"']").prop("checked",true);
            });
 
            $("#userModal").modal("show");
        }
    });
});



















    
$(document).on('click', '.delete-btn', function () {
    if (!confirm('Are you sure you want to delete?')) return;

    var recordId = $(this).data('id');
   
    var clickedButton = $(this); 

    $.ajax({
        url: 'delete.php',
        type: 'POST',
        data: { id: recordId },
        success: function (response) {
            var res = JSON.parse(response);
            if (res.success) {
               
                clickedButton.closest('tr').remove(); 

              
                // alert('Record deleted successfully'); 
            } else {
                alert('Delete failed: ' + (res.message || 'Unknown error'));
            }
        },
        error: function (xhr, status, error) {
            alert('AJAX error: ' + error);
        }
    });
});


