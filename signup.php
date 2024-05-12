<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/signup.css">
</head>
<body>

<div class="box">
    <div class="container">
        <div class="content">
            <h2>Sign Up</h2>
            <form action="process_signup.php" method="POST"> 
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" id="password" name="password" required>
                <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required> <br>
                <button type="submit" class="sumbit" name="submit">Submit</button>
            </form>
        </div>
        
        <div class="form-photo">
            <img src="images/loading1.gif" alt="">
        </div>

    </div>
</div>

</body>
</html>
