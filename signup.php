<html>
    <head>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
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
        <div class="content">
            <div class="row">
                <h1>Enter Your details to register</h1><br>
            </div>
            <div class="row">
                <form class="form-horizontal" role="form" action="register.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Login Id</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="lgid" name="lgid" placeholder="One you will use">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="psd" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>