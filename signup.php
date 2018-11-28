<?php
session_start();
$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
$duplicate = isset($_SESSION['duplicate']) ? $_SESSION['duplicate'] : '';
$success = isset($_SESSION['success']) ? $_SESSION['success'] : '';
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
unset($_SESSION['message']);
unset($_SESSION['duplicate']);
unset($_SESSION['success']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['password']);
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
        <link href="./styles/signupLayout.css" rel= "stylesheet" type="text/css" />
        <title>CodeForest - Sign Up</title>
        <link rel="shortcut icon" type="image/x-icon" href="./images/Forest_favicon.ico"/>
    </head>

    <body>
        <div id="banner">
            <div class="logoBox">CodeForest</div>
            <div id="separator"> | </div>
            <div class="page-title">Sign Up</div>
            <div id="main-buttons">
                <table>
                    <tr>
                        <td class="menu-button">
                            <a href="/home.php">
                            <img alt="Home" src="./images/homeIcon.png" width="35" height="35" border="0">
                            </a>
                        </td>
                        <td class="menu-button">
                            <a href="/login.php">
                            <img alt="Login" src="./images/loginIcon.png" width="35" height="35" border="0">
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
                            <img alt="Support" src="./images/questionIcon.png" width="35" height="35" border="0">
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
            <div id="signupBox">
                    <form id="form" action="signup_handler.php" method="POST">
                        <div id="usernameField">
                            <p id="usernameTitle">Username</p>
                            <br/>
                            <input id="username" name="username" type="text" value="<?php echo $username ?>"/>
                        </div>
                        <div id="emailField">
                            <p id="emailTitle">Email</p>
                            <br>
                            <input id="email" name="email" type="text" value="<?php echo $email ?>"/>
                        </div>
                        <div id="passwordField">
                            <p id="passwordTitle">Password</p>
                            <br/>
                            <input id="password" name="password" type="password" value="<?php echo $password ?>"/>
                        </div>
                        <!-- Will take out the Occupation Field for the moment
                        <div id="occupationField">
                            <p id="occupationTitle">Occupation (Select One)</p>
                            <br>
                            <select id="occupation" name="occupation">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="programmer">Programmer</option>
                                <option value="hobbyist">Hobbyist</option>
                            </select>
                        </div> -->
                        <input id="submit" name="submit" value="SIGN UP" type="submit"/>
                    </form>
                    <a id="memberLink" href="/login.php">
                        <p id="secondaryLink">Already Have an Account?</p>
                    </a>
            </div>
        </div>

        <?php if($duplicate == 1) { ?>
            <div class="missing-credential">
                <?php echo $message; ?>
            </div>
        <?php } elseif(!empty($message) && $_GET['success'] == 1) { ?>
            <div class="notice-message" id="user-creation-success">
                <?php echo $message; ?>
            </div>
        <?php } elseif(!empty($message)) { ?>
            <div class="notice-message" id="missing-credential">
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
