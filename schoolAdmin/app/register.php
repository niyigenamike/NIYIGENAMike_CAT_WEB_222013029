<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('myImages/milk.jpg');
        background-repeat: no-repeat;
    }

    h2 {
        text-align: center;
        color: #fff;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }

    input.error {
        border-color: red;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<h2>User Form</h2>

<form id="userForm" method="POST" action="adduser.php" enctype="multipart/form-data">
    <div>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname">
        <div id="firstname-error" class="error-message"></div>
    </div>
    <div>
        <label for="middlename">Middle Name:</label>
        <textarea id="middlename" name="middlename"></textarea>
    </div>
    <div>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname">
        <div id="lastname-error" class="error-message"></div>
    </div>
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <div id="username-error" class="error-message"></div>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <div id="password-error" class="error-message"></div>
    </div>
    <div>
        <label for="image">Profile Image:</label>
        <input type="file" id="image" name="image" accept="image/*">
    </div>
    <button type="submit">Register</button>
</form>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("userForm").addEventListener("submit", function(event) {
        var isValid = true;

        // Reset error messages and borders
        document.querySelectorAll('.error-message').forEach(function(element) {
            element.textContent = '';
        });
        document.querySelectorAll('input').forEach(function(element) {
            element.classList.remove('error');
        });

        // Validate each input field
        var firstName = document.getElementById('firstname').value;
        if (firstName.trim() === '') {
            document.getElementById('firstname-error').textContent = 'First name is required.';
            document.getElementById('firstname').classList.add('error');
            isValid = false;
        }

        var lastName = document.getElementById('lastname').value;
        if (lastName.trim() === '') {
            document.getElementById('lastname-error').textContent = 'Last name is required.';
            document.getElementById('lastname').classList.add('error');
            isValid = false;
        }

        var username = document.getElementById('username').value;
        if (username.trim() === '') {
            document.getElementById('username-error').textContent = 'Username is required.';
            document.getElementById('username').classList.add('error');
            isValid = false;
        }

        var password = document.getElementById('password').value;
        if (password.trim() === '') {
            document.getElementById('password-error').textContent = 'Password is required.';
            document.getElementById('password').classList.add('error');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if there are validation errors
        }
    });
});
</script>

</body>
</html>
