<?php
    session_start();
    require 'library.php';
    checkUserLogin($_SESSION);
    $rows = readExpanditure($_SESSION['logid']);
?>
<html>
    <head>
        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <h1>Your Expanditure</h1>
            <a href="logout.php" class="btn btn-info">Logout</a>
            <div class="clearfix"><br/></div>
            <div class="row">
                <div class="col-md-4">
                    <select id="month" class="form-control">
                        <option value="">--Select Month--</option>
                    </select>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <a href="#" class="btn btn-info">View In Chart</a>
                    <a href="addIn.php" class="btn btn-info">Add</a>
                    <a href="headeradd.php" class="btn btn-info">Add Header</a>
                </div>
            </div>
            <div class="clearfix"><br/></div>
            <div class="row">
                <table class="table table-bordered">
                    <tr><th>Spent In</th><th>Amount</th><th>On Date</th><th></th></tr>
                    <?php
                        echo $rows;
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>