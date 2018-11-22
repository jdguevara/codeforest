<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
//unset($_SESSION['message']);
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
        <link href="./styles/loginLayout.css" rel= "stylesheet" type="text/css" />
        <title>CodeForest - Login</title>
        <link rel="shortcut icon" type="image/x-icon" href="./images/Forest_favicon.ico"/>
    </head>

    <body>
        <div id="banner">
            <div class="logoBox">CodeForest</div>
            <div id="separator"> | </div>
            <div class="page-title">Login</div>
            <div id="main-buttons">
                <table>
                    <tr>
                        <td class="menu-button">
                            <a href="home.php">
                            <img title="Home" src="./images/homeIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                        <td class="menu-button">
                            <a href="signup.php">
                                <img title="Sign Up" src="./images/signUpIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                        <td class="menu-button">
                            <a href="support.php">
                            <img title="Support" src="./images/questionIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
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

        <div id="content">
            <div id="loginBox">
                <form id="form" method="post" action="login_handler.php">
                    <div id="usernameField">
                        <p id="usernameTitle">Username / Email</p>
                        <br/>
                        <input title="username/email" id="username" name="username" type="text"/>
                    </div>
                    <div id="passwordField">
                        <p id="passwordTitle">Password</p>
                        <br/>
                        <input title="password" id="password" name="password" type="password"/>
                    </div>
                    <input id="submit" name="submit" value="LOG IN" type="submit"/>
                </form>

                <a id="forgotPasswordLink" href="/forgotPassword.php">
                    <p id="secondaryLink">Forgot Password</p>
                </a>

                <a id="createAccountLink" href="/signup.php">
                    <p id="secondaryLink">Create Account</p>
                </a>
            </div>
        </div>

        <?php if(!empty($message)) { ?>
            <div class="notice-message" id="failed-login">
                <?php echo $message; ?>
            </div>
        <?php } ?>

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
