<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=TestDataBase;host=mysql-server;';
$user = 'root';
$password = 'secret';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo 'SUCCESSFULLY CONNECTED TO MYSQL </br>';
    
    $sql = 'SELECT * FROM test';
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $arr = $sth->fetchAll();
    
    // TestDataBase -> test -> idx:1,name:Alice,age:22
    echo $arr[0][1] . ' is ' . $arr[0][2] . ' years old.';
    echo '</br>';

    // TestDataBase -> test -> idx:2,name:Bob,age:23
    echo $arr[1][1] . ' is ' . $arr[1][2] . ' years old.';
    echo '</br>';

    phpinfo();
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<?php 
// This is for the display images
// leaving it commented out with what it should be, minus specific names
 // require_once ('.mysql-data/TestBlackmail/blackmail.ibd');   //the path to the database is not working

 $sql = "SELECT * FROM TestBlackmail";  //not exactly sure of the from
$result = mysqli_query($dbc, $sql) or die ("Bad Insert: $sql");

// I think head.html is the header? 
// require 'head.html';
?>



<html>
<!-- Testing out some stuff  -->
<header>
<h1> Blackmail </h1>
<h3> Everyone Has A Price </h3>
</header>

<table>
<?php
$i=0;
// drawing a dynamic table to call above query one row at a time
while($row = mysqli_fetch_assoc($result)){
    // creates a pair of TD's with an image in it
    // make a new row every 3 images (can change to more per row)
    // opens row
    if ($i%3==0){
        echo"<tr>";
    }
    // folder uploads, table with img and cost
    echo"<td><img src='uploads/{$row['img']}' alt = '{$row['cost']}' class='gallery'></td>";
    // closes row
    if ($i%3 ==2){
        echo"</tr>";
    }
    $i++;

}

?>
</table>



<?php
// not sure if we need this nav either
// require 'nav.html';
?>

// Pop up login form
<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" class="btn">Login</button>
    <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>





</HTML>