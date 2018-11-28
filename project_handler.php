<?php
/**
 * Created by IntelliJ IDEA.
 * User: jguevara
 * Date: 11/3/18
 * Time: 8:50 PM
 */

include_once 'Dao.php';

session_start();
$dao = new Dao();
$project_name = $_POST['project-name'];
$user = $_SESSION['user'];
$program_language = $_POST['language-select'];
$program = $_POST['code_input'];

if (empty($project_name)) {
    $project_name = "New Project";
}

if ($program_language == 'cpp') {
    $program_language = 'C++';
}

if (isset($_POST['save'])) {
    $dao->saveProject($project_name, $user, $program_language, $program);
    $_SESSION['message'] = 'Project Saved!';
} elseif (isset($project_name)) {
    $_SESSION['project-name'] = $project_name;
}
// May need to replace the next line with AJAX if I don't
// want to keep sending people out of their current work
// every time they save.
header('Location: projects.php');
exit;