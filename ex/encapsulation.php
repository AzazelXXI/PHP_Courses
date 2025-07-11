<?php
session_start();
class BankAccount
{
    private $balance;

    public function __construct($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount < 0) {
            echo 'Only Positive Number';
        } else {
            $this->balance += $amount;
            echo 'Deposit Successfully';
        }
    }

    public function withdraw($amount)
    {
        if ($amount > $this->balance) {
            echo 'Your withdraw can not bigger than your balance';
        } else {
            $this->balance -= $amount;
            echo 'Withdraw Successfully';
        }
    }

}
// TODO: Fix this research about the session to store
$BA = new BankAccount(1000);
function receiveInput() {
    global $BA;
    if (isset($_POST['depositBtn'])) {
        $BA->deposit($_POST['deposit']);
    }
    else if (isset($_POST['withdrawBtn'])) {
        $BA->withdraw($_POST['withdraw']);
    }
}

receiveInput();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Account</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h2>🏦 Bank Account 🏦</h2>
        <div>
            <label>💰 Your balance: <?php echo $BA->getBalance() ?></label>
        </div>

        <div>
            <label>💵 Deposit: </label>
            <input type="number" name="deposit">
        </div>
        <br>
        <div>
            <label>💸 Withdraw:</label>
            <input type="number" name="withdraw">
        </div>
        <br>
        <div>
            <input type="submit" name="depositBtn" value="Deposit">
            <input type="submit" name="withdrawBtn" value="Withdraw">
        </div>

    </form>
</body>

</html>