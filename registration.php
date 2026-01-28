<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<h2>Registration page</h2>

<form action="insert.php" method="POST" enctype="multipart/form-data">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

   
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

   
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>

 
    <label for="profile_image">Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" accept="uploads/*"><br><br>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
        

    <!-- Address -->
    <label for="address">Address:</label><br>
    <textarea id="address" name="address" rows="4" cols="50"></textarea><br><br>

    <!-- Phone Number -->
    <label for="phone_no">Phone Number:</label>
    <input type="number" id="phone_no" name="phone_no"><br><br>

    <!-- Gender -->
    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label><br><br>

    <!-- Hobby (Checkbox) -->
    <label>Hobbies:</label><br>
    <input type="checkbox" id="hobby1" name="hobbies[]" value="reading">
    <label for="hobby1"> Reading</label><br>
    <input type="checkbox" id="hobby2" name="hobbies[]" value="gaming">
    <label for="hobby2"> Gaming</label><br>
    <input type="checkbox" id="hobby3" name="hobbies[]" value="coding">
    <label for="hobby3"> Coding</label><br><br>

    <!-- Country (Dropdown) -->
    <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="">Select a country</option>
        <option value="usa">USA</option>
        <option value="canada">Canada</option>
        <option value="india">India</option>
 
    </select><br><br>


    <input type="submit" name="submit" value="Register">
</form>

</body>
</html>
=======

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<h2>Registration page</h2>

<form action="insert.php" method="POST" enctype="multipart/form-data">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

   
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

   
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>

 
    <label for="profile_image">Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" accept="uploads/*"><br><br>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
        

    <!-- Address -->
    <label for="address">Address:</label><br>
    <textarea id="address" name="address" rows="4" cols="50"></textarea><br><br>

    <!-- Phone Number -->
    <label for="phone_no">Phone Number:</label>
    <input type="number" id="phone_no" name="phone_no"><br><br>

    <!-- Gender -->
    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label><br><br>

    <!-- Hobby (Checkbox) -->
    <label>Hobbies:</label><br>
    <input type="checkbox" id="hobby1" name="hobbies[]" value="reading">
    <label for="hobby1"> Reading</label><br>
    <input type="checkbox" id="hobby2" name="hobbies[]" value="gaming">
    <label for="hobby2"> Gaming</label><br>
    <input type="checkbox" id="hobby3" name="hobbies[]" value="coding">
    <label for="hobby3"> Coding</label><br><br>

    <!-- Country (Dropdown) -->
    <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="">Select a country</option>
        <option value="usa">USA</option>
        <option value="canada">Canada</option>
        <option value="india">India</option>
 
    </select><br><br>


    <input type="submit" name="submit" value="Register">
</form>

</body>
</html>
>>>>>>> 07d84f53fadea864880f2cac57f5fd2a4869f4f7
