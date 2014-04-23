<?php
session_start();
require 'library.php';
checkUserLogin($_SESSION);
if(isset($_POST['head'])){
    saveExpenditure($_POST,$_SESSION['logid']);
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
        <div class="container">
            <h1>Add Expanditure</h1>
            <div class="clearfix"><br/></div>
            <form class="form-horizontal" role="form" action="addIn.php" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Select Head</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="head" require>
                            <option value="">----</option>
                            <?php
                            echo getListOfHeader($_SESSION['logid']);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Amount</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" name="amount" placeholder="Expanded" require>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">On Month</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="month" require>
                            <option value="">--select month--</option>
                            <option value="1">Jan</option>
                            <option value="2">Feb</option>
                            <option value="3">Mar</option>
                            <option value="4">Apr</option>
                            <option value="5">May</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Aug</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>

                    </div>
                    <div class="col-sm-5">
                        <select class="form-control" name="date" require>
                            <option value="">--select day--</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
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