<?php 
namespace MySQL;
use mysqli;
$username = "root";
$password = "password";
$database = "test";
$mysqli = new mysqli("localhost", $username, $password, $database);
$mysqli->select_db($database) or die( "Unable to select database");

$test = array("these", "words", "alway", "haves", "smore");
$test_num = array("6", "3", "2", "92", "58");

for ($x = 0; $x < count($test); $x++) {
    $sql = "DELETE FROM test_table WHERE first_c = '$test[$x]';";
    $mysqli->query($sql);
    $sql = "INSERT INTO test_table (first_c, second_d) VALUES ('$test[$x]', '$test_num[$x]');";
    $mysqli->query($sql);
}
//$sql .= "INSERT INTO test_table (first_c, second_d) VALUES ('Fives', '5')";
//$mysqli->multi_query($sql);

$sql = "SELECT * FROM test_table";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    echo "string: " . $row["first_c"]. " - Number: " . $row["second_d"]. " " . "<br>";
}
$mysqli->close();
?>

<html>
    <style>
        .column {
            float: left;
            width: 15%;
            padding-top: 0px;
            padding-bottom: 30px;
        }
        .row:after{
            content: "";
            display: table;
            clear: both;
        }
        h1 {align-self: center;}
        input {align-self: center;}
    </style>
    <body>
        <div class ="row">
        <form action="" method="post">
            5 char:
            <input type=text name="t1">
            <br>
            Number:
            <input type=text name="t2">
            <br>
            <div class= "column" style="background-color:#aaa;">
                <h2>Addition Box</h2>
                <br>
                <input type=submit name="asub">
                <br>
            </div>
            <div class= "column" style="background-color:#bbb;">
                <h2>Search Box</h2>
                <br>
                <input type=submit name="ssub">
                <br>
            </div>
            <div class= "column" style="background-color:#aaa;">
                <h2>Delete Box</h2>
                <br>
                <input type=submit name="dsub">
                <br>
            </div>
        </div>
            <?php
if(isset($_POST['asub']) || isset($_POST['ssub']) || isset($_POST['dsub'])) // here isset function is using to check where a variable is set or not
{
    $mysqli = new mysqli("localhost", $username, $password, $database);
    $mysqli->select_db($database) or die( "Unable to select database");
    $v1=$_POST['t1'];// accessing value from first text field 
    $v2=$_POST['t2'];// accessing value from second text field
    $action = "Search: ";
    if(isset($_POST['asub']) || isset($_POST['dsub'])){
        $sql = "DELETE FROM test_table WHERE first_c = '$v1';";
        $mysqli->query($sql);
        if(isset($_POST['asub'])){
            $sql = "INSERT INTO test_table (first_c, second_d) VALUES ('$v1', '$v2');";
            $mysqli->query($sql);
            $action = "Added: ";
        }
    }
    if(isset($_POST['dsub'])){
        echo "Deleted: string: " . $v1 . " - Number: " . $v2. " " . "<br>";
    }
    else{
        $sql = "SELECT * FROM test_table";
        $result = $mysqli->query($sql);
        $track = 0;
        while($row = $result->fetch_assoc()) {
            if ($row["first_c"] == $v1 && $row["second_d"] == $v2){
                $track = 1;
                echo "$action" . "string: " . $row["first_c"]. " - Number: " . $row["second_d"]. " " . "<br>";
            }
        }
        if ($track == 0){
            echo "Search did not find " . $v1 . " : " . $v2 . "<br>";
        }
    }
    $mysqli->close();
}
            ?>
        </form>
    </body>
</html>