<!DOCTYPE html>
<html>
    <head>
        <title>Welcome Page</title>
    </head>
    <body>
        <h1>Welcome</h1>
<?php
    $servername = "localhost";
    $db = "reservations";
    $db_username = "root";
    $db_password = "";
    $connection;
 
    try {
        $connection = new PDO(
            "mysql:host=$servername;dbname=$db",
            $db_username,
            $db_password
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 
    $sql = "SELECT * FROM user_credentials";
    $userDataResult = $connection->query($sql);
    $users = $userDataResult->fetchAll();
 
    echo "<table>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
    ";
 
    foreach($users as $user) {
 
        echo "<tr>
                <td>".$user["username"]."</td>
                <td>".$user["password"]."</td>
            </tr>";
        
    }
 
    echo "</table>";
?>
    </body>
</html>