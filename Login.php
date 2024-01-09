<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="2.css">
    <title>Admin Login</title>
    
</head>
<body>
    <div class="header">
    <header>
        <h1>Welcome to the Inventory Managmnet System</h1>
    </header>
</div>
<nav>
        <div class="right-section">
            <button><a href="about1.html" class="about-us-link">About Us</a></button>
            <button><a href="contact1.html" class="about-us-link">Contact Us</a></button>
            <button><a href="cust_order.php" class="about-us-link">Order Product</a></button>
        </div>
</nav>
<div class="container">
    <div class="login-container">
        <div class="login-header">
            <h2><strong>Admin Login</strong></h2>
        </div>

        <div class="login-form">
            <form id="loginForm" onsubmit="login(event)">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</div>

    <script>
        function login(event) {
            event.preventDefault(); // prevent form submission

            // Get the values entered by the user
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // For demonstration purposes, check if both fields are non-empty
            if (username && password) {
                // Simulate a server request (replace this with an actual AJAX request)
                setTimeout(function() {
                    // Check credentials for admin login (replace this with actual server-side authentication)
                    if (username === "Momin@123" && password === "123") {
                       
                        // Redirect to the specified page
                        window.location.href = "1.html";
                    } else {
                        alert('Invalid username or password for admin.');
                    }
                }, 500);
            } else {
                alert('Please enter both username and password.');
            }
        }
    </script>
</body>
</html>