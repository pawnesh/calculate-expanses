<?php
session_start();
require 'library.php';
checkUserLogin($_SESSION);

if (isset($_POST['tittle'])) {
    saveHeader($_POST['tittle'], $_SESSION['logid']);
}
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <?php
        if (isset($_GET['err'])) {
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
        <div class="container">
            <h1>Add Expanditure Heads</h1>
            <div class="clearfix"><br/></div>
            <form class="form-horizontal" role="form" action="headeradd.php" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Head</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="tittle" placeholder="Heade Title" require>
                    </div>
                </div>
                <center>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="dashboard.php" class="btn btn-primary">Cancel</a>
                        </div>			
                    </div>
                </center>
            </form>
        </div>
    </body>
</html>