<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$username = $_SESSION['username'];
$password = $_SESSION['password'];
unset($_SESSION['message']);
unset($_SESSION['username']);
unset($_SESSION['password']);
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
        <script type="text/javascript" src="js/home.js"></script>
        <link href="./styles/homeLayout.css" rel= "stylesheet" type="text/css" />
        <title>CodeForest - Home</title>
        <link rel="shortcut icon" type="image/x-icon" href="./images/Forest_favicon.ico"/>
    </head>

    <body>
        <div id="banner">
            <div class="logoBox">CodeForest</div>
            <div id="main-buttons">
                <table>
                    <tr>
                        <td class="menu-button" id="login-button">
                            <input type="image" title="Log In"alt="Log In" src="./images/loginIcon.png" width="35" height="35" border="0"/>
                        </td>
                        <td class="menu-button">
                            <a href="/signup.php">
                            <img alt="Sign Up" src="./images/signUpIcon.png" width="35" height="35" border="0"/>
                            </a>
                        </td>
                        <?php if(isset($_SESSION['user'])) {
                            echo "<td class='menu-button'>".
                                "<a href='/projects.php'>" .
                                "<img alt='Projects' src='./images/projectIcon.png' width='35' height='35' border='0'/>" .
                                "</a></td>";
                        } ?>
                        <td class="menu-button">
                            <a href="/support.php">
                            <img alt="Support" src="./images/questionIcon.png" width="35" height="35" border="0"/>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="login" class="hidden">
            <form id="form" method="post" action="home_login_handler.php">
                <table id="login-table">
                    <tr>
                        <td>
                            <div id="usernameField">
                                <p id="usernameTitle">Username / Email</p>
                                <br/>
                                <input title="username/email" id="username" name="username" type="text" value="<?php echo $username ?>"/>
                            </div>
                        </td>
                        <td>
                            <div id="passwordField">
                                <p id="passwordTitle">Password</p>
                                <br/>
                                <input title="password" id="password" name="password" type="password" value="<?php echo $password ?>"/>
                            </div>
                        </td>
                        <td>
                            <input id="submit" name="submit" value="LOG IN" type="submit"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        
        <div id="nav-buttons">
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

        <div id="content" style="text-align: center">
            <h2 class="notice-message">Code Sharing Made Easy!</h2>
            <!-- <h2 class="smaller-notice-message">(Under Construction)</h2> -->
            <p class="content-paragraphs">
                CodeForest is a rudimentary code share that gives you the freedom of collaborator input<br>
                and language-specific syntax highlighting thanks to the use of Prism.js ▲
            </p>
            <img id="project-screenshot-L" src="images/Project-screenshot2.png">
            <img id="project-screenshot-R" src="images/Project-screenshot1.png">
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
    </body>
</html>
