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
                    <h2>Sign UP</h2>
                    <form action="process_signup.php" method="POST">
                    <input  type="username" placeholder="Username" name="username" require>
                    <input  type="email" placeholder="Email" name="email" require>
                    <input  type="password" placeholder="Password" id="password" name="password" require>
                    <input  type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" require>
                    <button type="submit" class="btn-contact"> Sumbit </button>  
                    </form>
                </div>
                
                <div class="form-photo">
                    <img src="images/loading1.gif" alt="">
                </div>
        </div>
    </div> 
</body>
</html>
