<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $users = json_decode(file_get_contents('users.json'), true) ?? [];
    $newUser = ['username' => $username, 'email' => $email, 'password' => $password];
    $users[] = $newUser;

    file_put_contents('users.json', json_encode($users));

    echo "The Registration is complete";
}
?>
<form method="post" action="register.php">
    <label>Username:</label>
    <input type="text" name="username" required>
    
    <label>Email:</label>
    <input type="email" name="email" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Register</button>
</form>
