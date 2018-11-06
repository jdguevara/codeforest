<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch" rel="stylesheet">
        <link href="./styles/forgotPassword.css" rel= "stylesheet" type="text/css" />
        <title>CodeForest - Forgot Password</title>
        <link rel="shortcut icon" type="image/x-icon" href="./images/Forest_favicon.ico"/>
    </head>

    <body>
        <div id="banner">
            <div class="logoBox">CodeForest</div>
            <div id="separator"> | </div>
            <div class="page-title">Forgot Password</div>
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
                        <td class="menu-button">
                            <a href="/signup.php">
                            <img alt="Sign Up" src="./images/signUpIcon.png" width="35" height="35" border="0">
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

        <!-- For the sake of the skeleton page assignment this has been made to send anyone straight to the projects page -->
        <!-- (This should be updated once a login implementation is done so as to not just send anyone to projects on button press -->
        <div id="content">
            <div id="forgotPasswordBox">
                <form id="submitButton" method="get" action="/login.php">
                    <input class="button-style" value="Send Recovery Link" type="submit">
                </form>
                <!--- This section needs to be updated so that it seeks out the user based on information given -->
                <form id="userField">
                    <p id="userFieldTitle">Username / Email</p>
                    <br>
                    <input type="text" id="userInput" name="user" />
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
    </body>
</html>
