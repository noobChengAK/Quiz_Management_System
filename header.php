<?php include 'connectdb.php';?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Online Quiz</a>
        </div>
        <div>
            <ul class="nav navbar-nav" style="float: right;">
                <li><a href="/">Home</a></li>
                <?php if (isset($_SESSION['uid']) == false) { ?>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <?php } ?>
                <?php if (isset($_SESSION['uid'])) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Center
                        <b class="caret"></b>
                    </a>
                    <?php if ($user['role'] == '0') { ?>
                    <ul class="dropdown-menu">
                        <li><a href="quiz.php">quiz</a></li>
                        <li><a href="changepassword.php">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <?php } ?>
                    <?php if ($user['role'] == '1') { ?>
                    <ul class="dropdown-menu">
                        <li><a href="student_quiz.php">Answer Quiz</a></li>
                        <li><a href="changepassword.php">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <?php } ?>                    
                </li>
                <?php } ?>
            </ul>
        </div>
        </div>
    </nav>