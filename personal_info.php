<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['personal_info'] = [
        'fullname' => htmlspecialchars($_POST['fullname']),
        'email' => htmlspecialchars($_POST['email']),
        'phone' => htmlspecialchars($_POST['phone']),
    ];

    header("Location: edu_bg.php"); 
    exit;
}
?>
<form method="post" action="personal_info.php">
    <label>Full Name:</label>
    <input type="text" name="fullname" required>
    
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $_SESSION['user'] ?? ''; ?>" required>
    
    <label>Phone Number:</label>
    <input type="text" name="phone" required>
    
    <button type="submit">Next</button>
</form>
