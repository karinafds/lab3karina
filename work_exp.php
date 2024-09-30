<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['work'] = [
        'job_title' => htmlspecialchars($_POST['job_title']),
        'company' => htmlspecialchars($_POST['company']),
        'experience' => htmlspecialchars($_POST['experience']),
        'responsibilities' => htmlspecialchars($_POST['responsibilities']),
    ];

    header("Location: review.php"); 
    exit;
}
?>
<form method="post" action="work_exp.php">
    <label>Job Title:</label>
    <input type="text" name="job_title" required>
    
    <label>Company Name:</label>
    <input type="text" name="company" required>
    
    <label>Years of Experience:</label>
    <input type="text" name="experience" required>
    
    <label>Key Responsibilities:</label>
    <textarea name="responsibilities" required></textarea>
    
    <button type="submit">Next</button>
</form>
