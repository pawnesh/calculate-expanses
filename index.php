<html>
    <head>
        <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet"/>
        <style>
            body{
                margin: 0 auto;
                width: 500px;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_GET['err'])) {
            include 'library.php';
            ?>
            <table class="table">
                <tr>
                    <?php
                    echo getError($_GET['err']);
                    ?>
                </tr>
            </table>
            <?php
        }
        if (isset($_GET['cd'])) {
            include 'library.php';
            ?>
            <table class="table">
                <tr>
                    <?php
                    echo getError($_GET['cd']);
                    ?>
                </tr>
            </table>
            <?php
        }
        ?>
        <form class="form-horizontal" role="form" action="login.php" method="post">
            <center>
                <div class="form-group">
                    <div class="col-sm-12">
                        <h2>login to Continue</h2>
                    </div>
                </div>
            </center>
            <div class="form-group">
                <label class="col-sm-2 control-label">Login Id</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputId" name="lgid" placeholder="Login Id">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword"name="psd" placeholder="Password">
                </div>
            </div>
            <center>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="signup.php" class="btn btn-primary">sign up</a>
                    </div>			
                </div>
            </center>
        </form>
    </body>
</html>