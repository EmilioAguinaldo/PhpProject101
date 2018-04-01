<!DOCTYPE html>
<html>
<body>

<h2>Text Input</h2>
<form method="post" action="<?php echo htmlspecialchars($current_page) ?>">
    First name:<br>
    <input type="text" name="username" value="<?php echo $li_uname ?>">
    <?php echo $li_unameErr ?>
    <br>
    Password:<br>
    <input type="text" name="pass"  value="<?php echo $li_pass ?>">
    <?php echo $li_passErr ?>
    <br>
    <input type = "submit" name = "submit" value = "Log In">
    <input type = "reset" name = "reset" value = "Reset">
</form>
<a href="register.php">Register</a>
<a href="profile.php">Profile</a>
</body>
</html>

<!-- An ideal login form: https://www.w3schools.com/howto/howto_css_login_form.asp -->