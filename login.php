<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    $rememberMe = isset($_POST['remember']);

    $users = json_decode(file_get_contents('users.json'), true) ?? [];

    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];

           
            if ($rememberMe) {
                setcookie('username', $username, time() + (7 * 24 * 60 * 60)); 
            }

            header("Location: personal_info.php");
            exit;
        }
    }
    echo "Login failed. Please try again.";
}
?>
<form method="post" action="login.php">
    <label>Username:</label>
    <input type="text" name="username" value="<?php echo $_COOKIE['username'] ?? ''; ?>" required>
    
    <label>Password:</label>
    <input type="password" name="password" required>
    
    <label>Remember Me:</label>
    <input type="checkbox" name="remember">
    
    <button type="submit">Login</button>
</form>
