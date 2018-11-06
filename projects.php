<?php
session_start();
if(!isset($_SESSION['logged_in'])) {
    header("Location:login.php");
}
require_once 'Dao.php';
$dao = new Dao();
$user = $_SESSION['user'];
$projects = $dao->getProjects($user);
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/projects.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
        <link href="./styles/projectLayout.css" rel= "stylesheet" type="text/css" />
        <link href="./styles/prism.css" rel= "stylesheet" type="text/css" />
        <title>CodeForest - Projects</title>
        <link rel="shortcut icon" type="image/x-icon" href="./images/Forest_favicon.ico"/>
    </head>

    <body>
        <div id="banner">
            <div class="logoBox">CodeForest</div>
            <div id="separator"> | </div>
            <div class="page-title">Projects</div>
            <div id="main-buttons">
                <table>
                    <tr>
                        <td class="menu-button">
                            <a href="/home.php">
                            <img alt="Home" src="./images/homeIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                        <td class="menu-button">
                            <a href="/logout.php">
                            <img alt="Logout" src="./images/logoutIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                        <td class="menu-button">
                            <a href="/support.php">
                            <img alt="Support" src="./images/questionIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div id="nav-buttons">
            <table id="project-creation">
                <tr>
                    <td>
                        <a class="menuTab" href="#" id="new-project">
                            <p id="secondaryLink"> New Project </p>
                        </a>
                    </td>
            </table>
            <table id="secondary-nav-selection">
                <tr>
                    <td>
                        <a href="/marketplace.php">
                            <p id="secondaryLink"> Marketplace </p>
                        </a>
                    </td>
                    <td>
                        <a href="/forum.php">
                            <p id="secondaryLink"> Forum </p>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
       
        <div id="menuBar">
            <div class="projectButtons">
                <a class="menuTab" href="#" id="all-projects">All Projects</a>
             </div>
            <div class="projectButtons">
                <a class="menuTab" href="#" id="my-projects">My Projects</a>
            </div>
             <div class="projectButtons">
                <a class="menuTab" href="#" id="shared-projects">Shared Projects</a>
             </div>
        </div>


        <div id="content" style="text-align: center">
            <!-- <h2 class="notice-message">Projects Go Here</h2> -->
            <div id="projects">
                 <table id="project-table" class="project-table">
                     <tr id="title-bar" class="title-bar">
                         <td>
                             <p id="project-name">Project Name</p>
                         </td>
                         <td>
                             <p id="project-owner">Project Owner</p>
                         </td>
                         <td>
                             <p id="date-modified">Date Modified</p>
                         </td>
                         <td>
                             <p id="collaborators">Collaborators</p>
                         </td>
                         <td>
                             <p id="program-language">Program Language</p>
                         </td>
                     </tr>
                     <?php
                        foreach ($projects as $project) {
                            echo "<tr id='project-div'><td id='project-name'>" . $project['project_name'] . "</td>" .
                                    "<td id='project-owner'>" . $project['project_owner'] . "</td>" .
                                    "<td id='date-modified'>" . $project['date_modified'] . "</td>" .
                                    "<td id='collaborators'>" . $project['collaborators'] . "</td>" .
                                    "<td id='program-language'>" . $project['program_language'] . "</td></tr>";
                        }
                    ?>
                 </table>

                 <table id="all-projects-table" style="display: none" class="project-table">
                     <tr id="title-bar">
                         <td>
                            <p id="project-name">Project Name</p>
                         </td>
                         <td>
                             <p id="project-owner">Project Owner</p>
                         </td>
                         <td>
                            <p id="date-modified">Date Modified</p>
                         </td>
                         <td>
                            <p id="collaborators">Collaborators</p>
                         </td>
                         <td>
                            <p id="program-language">Program Language</p>
                         </td>
                     </tr>
                    <?php
                    $projects = $dao->getProjects($user);
                    foreach ($projects as $project) {
                        echo "<tr id='project-div'><td id='project-name'>" . $project['project_name'] . "</td>" .
                            "<td id='project-owner'>" . $project['project_owner'] . "</td>" .
                            "<td id='date-modified'>" . $project['date_modified'] . "</td>" .
                            "<td id='collaborators'>" . $project['collaborators'] . "</td>" .
                            "<td id='program-language'>" . $project['program_language'] . "</td></tr>";
                    }
                    ?>
                </table>

                <table id="my-projects-table" style="display: none" class="project-table">
                    <tr id="title-bar">
                        <td>
                            <p id="project-name">Project Name</p>
                        </td>
                        <td>
                            <p id="project-owner">Project Owner</p>
                        </td>
                        <td>
                            <p id="date-modified">Date Modified</p>
                        </td>
                        <td>
                            <p id="collaborators">Collaborators</p>
                        </td>
                        <td>
                            <p id="program-language">Program Language</p>
                        </td>
                    </tr>
                    <?php
                    $projects = $dao->getMyProjects($user);
                    foreach ($projects as $project) {
                        echo "<tr id='project-div'><td id='project-name'>" . $project['project_name'] . "</td>" .
                            "<td id='project-owner'>" . $project['project_owner'] . "</td>" .
                            "<td id='date-modified'>" . $project['date_modified'] . "</td>" .
                            "<td id='collaborators'>" . $project['collaborators'] . "</td>" .
                            "<td id='program-language'>" . $project['program_language'] . "</td></tr>";
                    }
                    ?>
                </table>

                <table id="shared-projects-table" style="display: none" class="project-table">
                    <tr id="title-bar">
                        <td>
                            <p id="project-name">Project Name</p>
                        </td>
                        <td>
                            <p id="project-owner">Project Owner</p>
                        </td>
                        <td>
                            <p id="date-modified">Date Modified</p>
                        </td>
                        <td>
                            <p id="collaborators">Collaborators</p>
                        </td>
                        <td>
                            <p id="program-language">Program Language</p>
                        </td>
                    </tr>
                    <?php
                    $projects = $dao->getSharedProjects($user);
                    foreach ($projects as $project) {
                        echo "<tr id='project-div'><td id='project-name'>" . $project['project_name'] . "</td>" .
                            "<td id='project-owner'>" . $project['project_owner'] . "</td>" .
                            "<td id='date-modified'>" . $project['date_modified'] . "</td>" .
                            "<td id='collaborators'>" . $project['collaborators'] . "</td>" .
                            "<td id='program-language'>" . $project['program_language'] . "</td></tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="program" style="display:none">
                <table id="program-toolbar">
                    <tbody><tr>
                        <td>
                            <form>
                                <select title="code-language" id="code-language-menu">
                                    <option value="python">Python</option>
                                    <option value="html">HTML</option>
                                    <option value="java">Java</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a class="menuTab" href="#" id="save-project">
                                <p id="secondaryLink"> Save </p>
                            </a>
                        </td>
                    </tr>
                    </tbody></table>

                <form id="code-form">
                    <p id="code-text">
                        <textarea></textarea>
                    </p>
                    <div class="code-toolbar"><pre id="syntaxed-code" class="  language-c">                        <code id="code" class="  language-c"></code>
                    </pre><div class="toolbar"><div class="toolbar-item"><span>C</span></div></div></div>
                </form>
            </div>
        </div>

        <div id="footer">
            <footer>
                <li id="first">© 2018 Jaime Guevara</li>
                <li><a href="http://www.boisestate.edu">Boise State University</a></li>
                <li><a href="http://coen.boisestate.edu">College of Engineering</a></li>
                <li><a href="http://coen.boisestate.edu/cs/">Computer Science Department</a></li>
                <li>Email: <a id="adminEmail" href="mailto:jaimeguevara@u.boisestate.edu">jaimeguevara@u.boisestate.edu</a></li>
            </footer>
        </div>

        <script src="js/prism.js"></script>
    </body>
</html>
