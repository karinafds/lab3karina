<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['education'] = [
        'degree' => htmlspecialchars($_POST['degree']),
        'field' => htmlspecialchars($_POST['field']),
        'institution' => htmlspecialchars($_POST['institution']),
        'graduation' => htmlspecialchars($_POST['graduation']),
    ];

    header("Location: work_exp.php"); 
    exit;
}
?>
<form method="post" action="edu_bg.php">
    <label>Highest Degree:</label>
    <input type="text" name="degree" required>
    
    <label>Field of Study:</label>
    <input type="text" name="field" required>
    
    <label>Institution:</label>
    <input type="text" name="institution" required>
    
    <label>Year of Graduation:</label>
    <input type="text" name="graduation" required>
    
    <button type="submit">Next</button>
</form>
