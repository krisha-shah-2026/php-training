document.getElementById("userForm").addEventListener("submit", function(e) {
    e.preventDefault(); // stop page reload
 
    let form = document.getElementById("userForm");
    let formData = new FormData(form); 
 
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insert.php", true);
 
    xhr.onload = function() {
        if (this.status == 200) {
            alert(this.responseText); 
            form.reset(); 
        }
    };
 
    xhr.send(formData);
});