<?php
include_once(dirname(__FILE__) . "/includes/main.php");

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
    <head>
        <?php include_once(dirname(__FILE__) . "/includes/main-head.php"); ?>
    </head>
    <body>
        <div>
            <h1>Test Users</h1>
            <table width="100%" id="maintable">
                <thead>
                    <tr>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Total Credit</td>
                        <td>Creation Date</td>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
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
    <footer>
        <?php include_once(dirname(__FILE__) . "/includes/main-foot.php"); ?>
        <script>
            $(function () {
                $("#maintable").DataTable({
                    processing: false,
                    serverSide: false
                });
            });
        </script>
    </footer>
</html>