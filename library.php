<?php

require 'db_cd.php';

function saveInUser($data) {
    $con = init_db();
    if ($con != null) {
        $user_name = $data['lgid'];
        $user_password = $data['psd'];
        $query = 'INSERT INTO user (name, password, join_date) VALUES("' . $user_name . '","' . $user_password . '","' . date('d-m-Y') . '")';
        if (!mysqli_query($con, $query)) {
            mysqli_close($con);
            return 0;
        }

        mysqli_close($con);
        return 1;
    }
}

function isInputOk($data) {
    if (empty($data)) {
        header('location:index.php?err=202');
    }
    $regex = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
    preg_match($regex, $data, $matches);
    if (empty($matches)) {
        return true;
    } else {
        return false;
    }
}

function isUserExist($user) {
    $con = init_db();
    if ($con) {
        $query = 'SELECT id,password FROM user WHERE name = "' . $user . '"';
        $result = mysqli_query($con, $query);
        if ($result) {
            $row = mysqli_fetch_array($result);
            mysqli_close($con);
            if ($row) {
                return $row;
            }
        } else {
            mysqli_close($con);
            return 0;
        }
    }
    return 0;
}

function getError($code) {
    switch ($code) {
        case '500':
            return '<td class="success">user created succesfully, now you can login</td>';
        case '501':
            return '<td class="danger">Can not create user. unknown error occured</td>';
        case '502':
            return '<td class="danger">user id or password is incorrect</td>';
        case '504':
            return '<td class="danger">sql prepration failed</td>';
        case '506':
            return '<td class="danger">error in sql querry</td>';
        case '507':
            return '<td class="success">Header added succesfully ^_^</td>';
        case '508':
            return '<td class="success">Expanse added succesfully ^_^</td>';
        case '208':
            return '<td class="warning">direct access not allowed</td>';
        case '208':
            return '<td class="warning">Empty string given</td>';
        case '210':
            return '<td class="success">Successfully logout</td>';
        default:
            return '';
    }
}

function getListOfHeader($user) {
    $con = init_db();
    if ($con) {
        $query = 'SELECT id,name FROM headers WHERE user_id = "' . $user . '"';
        $result = mysqli_query($con, $query);
        if ($result) {
            $outptu = '';
            while ($row = mysqli_fetch_array($result)) {
                $output = $output . '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
            }
            mysqli_close($con);
            return $output;
        } else {
            mysqli_close($con);
            return 0;
        }
    }
    return 0;
}

function checkUserLogin($session) {
    if (!isset($session['logid']) || empty($session['logid'])) {
        header('location:index.php?err=208');
        die();
    }
}

function saveHeader($head, $userid) {
    $con = init_db();
    if ($con) {

        if (!($stmt = $con->prepare("INSERT INTO headers (user_id, name) VALUES (?,?)"))) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
            mysqli_close($con);
            header('location:headeradd.php?err=504');
            die();
        }
        $stmt->bind_param("ss", $userid, $head);

        if (!$stmt->execute()) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
            $stmt->close();
            mysqli_close($con);
            header('location:headeradd.php?err=506');
            die();
        }
        mysqli_close($con);
        header('location:headeradd.php?err=507');
        die();
    }
}

function saveExpenditure($data, $user_id) {
    $con = init_db();
    if ($con) {

        if (!($stmt = $con->prepare("INSERT INTO expanditure (user_id, header_id,expanditure,Day,Month) VALUES (?,?,?,?,?)"))) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
            mysqli_close($con);
            header('location:addIn.php?err=504');
            die();
        }
        $stmt->bind_param("sssss", $user_id, $data['head'], $data['amount'], $data['month'], $data['date']);

        if (!$stmt->execute()) {
            echo "Prepare failed: (" . $con->errno . ") " . $con->error;
            $stmt->close();
            mysqli_close($con);
            header('location:addIn.php?err=506');
            die();
        }
        mysqli_close($con);
        header('location:addIn.php?err=508');
        die();
    }
}

function readExpanditure($userid) {
    $con = init_db();
    if ($con) {
        $query = 'SELECT expanditure.id,headers.name,expanditure.expanditure,expanditure.day,expanditure.month 
                    FROM expanditure
                    JOIN headers ON headers.id = expanditure.header_id
                    WHERE expanditure.user_id = "' . $userid . '"';
        $result = mysqli_query($con, $query);

        if ($result) {
            $output = '';
            while ($row = mysqli_fetch_array($result)) {
                $output = $output . ' <tr>'
                        . '<td>' . $row['name'] . '</td>'
                        . '<td>' . $row['expanditure'] . '</td>'
                        . '<td>' . $row['day'] . '-' . $row['month'] . '</td>'
                        . '<td><a href="edit.php/?id=' . $row['id'] . '" class="btn btn-warning btn-xs">edit</a> <a href="delete.php/?id=' . $row['id'] . '" class="btn btn-danger btn-xs">delete</a>'
                        . '</td>'
                        . '</tr>';
            }
            mysqli_close($con);
            return $output;
        } else {
            mysqli_close($con);
            return 0;
        }
    }
    return 0;
}
?>