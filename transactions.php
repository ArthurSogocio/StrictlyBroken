<?php
include "database/db_functions.php";
include "database/insert_functions.php";

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
} else {
    header("Redirect: index.php");
    die();
}

$error = "";

if (!empty($_POST)) {
    
    $amount = 0;
    if (isset($_POST['amount'])) {
        $amount = $_POST['amount'];
    }
    
    if (isset($_POST['transaction_type']) && $_POST['transaction_type'] == "-") {
        $amount = $amount * -1;
        //var_dump($amount);
    }
    
    $comment = "";
    if (isset($_POST['transaction_comment'])) {
        $comment = stripslashes(htmlspecialchars($_POST['transaction_comment']));
    }
    
    insert_transaction($id, $amount, $comment);
}

$userquery = "SELECT first_name, last_name "
        . "FROM users "
        . "WHERE id = $id LIMIT 1";

$user = db_select($userquery);

$userrow = mysqli_fetch_row($user);

$transactionquery = "SELECT credit_transactions.* "
        . "FROM credit_transactions "
        . "WHERE user_id = $id ORDER BY id DESC";

$test = db_select($transactionquery);

$total = 0;
?>
<!doctype HTML>
<html>
    <head></head>
    <body>
        <div>
            <a href="index.php">Back to Users</a>
            <h2>Transactions for: <?= $userrow[0] . " " . $userrow[1] ?></h2>
            <table width="100%">
                <tr>
                    <td>Amount</td>
                    <td>Transaction Date</td>
                    <td>Transaction Comment</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($test)) {
                    $total += $row['amount'];
                    ?>
                    <tr>
                        <td><?= $row['amount'] ?></a></td>
                        <td><?= $row['transaction_date'] ?></td>
                        <td><?= $row['transaction_comment'] ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <h1>Total Credit: $<?= number_format($total, 2); ?></h1>
        </div>
        <form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . "?id=" . $id ?>">
            <div>
                <h2>Add/Subtract Credit</h2>
                
                <input type="text" name="amount" /> Amount <br />
                
                <input type="radio" name="transaction_type" value="+" checked> Add Credit <br />
                <input type="radio" name="transaction_type" value="-"> Subtract Credit <br />
                
                <textarea name="transaction_comment"></textarea> Comments <br />
                
                <input type="submit" />
            </div>
        </form>
    </body>
</html>
