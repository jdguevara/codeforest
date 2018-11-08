<?php

include_once 'Dao.php';
/**
 * Created by IntelliJ IDEA.
 * User: jguevara
 * Date: 11/3/18
 * Time: 8:50 PM
 */

session_start();
$dao = new Dao();
$project_name = $_POST['project-name'];
$user = $_SESSION['user'];
$program_language = $_POST['program-language'];

if (empty($project_name)) {
    $project_name = "New Project";
}

$dao->saveProject($project_name, $user, $program_language);
$_SESSION['message'] = 'Project Saved!';
// May need to replace the next line with AJAX if I don't
// want to keep sending people out of their current work
// every time they save.
header('Location: projects.php');
exit;