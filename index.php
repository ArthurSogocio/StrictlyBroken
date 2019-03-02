<?php
include "database/db_functions.php";
include "database/insert_functions.php";

$query = "SELECT users.*, SUM(credit_transactions.amount) as total "
        . "FROM USERS "
        . "LEFT JOIN credit_transactions ON credit_transactions.user_id = users.id "
        . "GROUP BY users.id "
        . "ORDER BY first_name ASC";


if (!empty($_POST)) {
    
    $first_name = "";
    if (isset($_POST['first_name'])) {
        $first_name = $_POST['first_name'];
    }
    $last_name = "";
    if (isset($_POST['last_name'])) {
        $last_name = $_POST['last_name'];
    }
    
    insert_user($first_name, $last_name);
}

$test = db_select($query);
?>
<!doctype HTML>
<html>
    <head></head>
    <body>
        <div>
            <h1>Test Users</h1>
            <table width="100%">
                <tr>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Total Credit</td>
                    <td>Creation Date</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($test)) {
                    ?>
                    <tr>
                        <td><a href="transactions.php?id=<?= $row['id'] ?>"><?= $row['first_name'] ?></a></td>
                        <td><?= $row['last_name'] ?></td>
                        <td>$<?= number_format($row['total'], 2) ?></td>
                        <td><?= $row['creation_date'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
        <div>
            <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div>
                    <h2>Add Users</h2>

                    <input type="text" name="first_name" /> First Name <br />

                    <input type="text" name="last_name" /> Last Name <br />

                    <input type="submit" />
                </div>
            </form>
        </div>
    </body>
</html>