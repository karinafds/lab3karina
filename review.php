<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application = [
        'personal_info' => $_SESSION['personal_info'],
        'education' => $_SESSION['education'],
        'work' => $_SESSION['work'],
    ];
    $applications = json_decode(file_get_contents('applications.json'), true) ?? [];
    $applications[] = $application;

    file_put_contents('applications.json', json_encode($applications));

    echo "Your application has been submitted successfully!";
    session_destroy(); 
}
?>
<h3>Review Your Application</h3>
<p>Full Name: <?php echo $_SESSION['personal_info']['fullname']; ?></p>
<p>Email: <?php echo $_SESSION['personal_info']['email']; ?></p>
<p>Phone: <?php echo $_SESSION['personal_info']['phone']; ?></p>
<p>Highest Degree: <?php echo $_SESSION['education']['degree']; ?></p>
<p>Field of Study: <?php echo $_SESSION['education']['field']; ?></p>
<p>Job Title: <?php echo $_SESSION['work']['job_title']; ?></p>
<p>Company: <?php echo $_SESSION['work']['company']; ?></p>

<form method="post" action="review.php">
    <button type="submit">SUBMIT</button>
</form>
