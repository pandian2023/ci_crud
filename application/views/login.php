<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <?php echo form_open('auth/login'); ?>
    
    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <br>

    <input type="submit" value="Login">

    <?php echo form_close(); ?>

</body>
</html>
