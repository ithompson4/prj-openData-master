        <?php 
          // CODED BY: Iryna Thompson, Nicholas Scherman
          require 'scripts/sessions.php';
          require 'scripts/debugging.php'; // Remove this line on live site.
        ?>
        <nav class="navbar navbar-default navbar-fixed-top" id="header">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Coming Soon</a></li>
                                <li><a href="#">Another blog action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </ul>
                        </li>
						<li class="dropdown"><a href="simple_viz.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Explore <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="simple_viz.php">Simple Search</a></li>
                                <li><a href="adv_viz.php">Advanced Search</a></li>
                            </ul>
                        </li>
                        <li><a href="#about">Compare</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php
                        if (!isset($_SESSION['LoggedIn'])) {
                    ?>
				        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                        }
                        else {
                    ?>
                        <li><a href="#">Welcome, <?php echo $_SESSION['Username'] ?>!</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
