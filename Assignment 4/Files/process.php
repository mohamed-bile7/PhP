<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Transaction Receipt</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="container">
        <?php

        require_once "functions.php";

        if (isset($_POST['register'])) {

            $upload_folder = __DIR__ . "/uploads/";

            $name             = "";
            $account_number   = "";
            $gender           = "";
            $account_type     = "";
            $balance          = "";
            $transaction_type = "";
            $amount           = "";
            $duration         = "";
            $errors           = "";
            $fee              = 0;

            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            if (isset($_POST['account_number'])) {
                $account_number = $_POST['account_number'];
            }
            if (isset($_POST['gender'])) {
                $gender = $_POST['gender'];
            }
            if (isset($_POST['account_type'])) {
                $account_type = $_POST['account_type'];
            }
            if (isset($_POST['balance'])) {
                $balance = $_POST['balance'];
            }
            if (isset($_POST['transaction_type'])) {
                $transaction_type = $_POST['transaction_type'];
            }
            if (isset($_POST['amount'])) {
                $amount = $_POST['amount'];
            }
            if (isset($_POST['duration'])) {
                $duration = $_POST['duration'];
            }

            $fee = calculateTransactionFee($transaction_type, $amount);

            if (empty($name)) {
                $errors = $errors . "Customer full name must not be empty.<br>";
            }
            if (empty($account_number)) {
                $errors = $errors . "Account number must not be empty.<br>";
            }
            if (empty($gender)) {
                $errors = $errors . "Please select a gender.<br>";
            }
            if (empty($account_type)) {
                $errors = $errors . "Please select an account type.<br>";
            }
            if ($balance === "") {
                $errors = $errors . "Opening balance must be entered.<br>";
            } else if ($balance < 0) {
                $errors = $errors . "Opening balance must be zero or greater.<br>";
            }
            if (empty($transaction_type)) {
                $errors = $errors . "Please select a transaction type.<br>";
            }
            if ($amount === "") {
                $errors = $errors . "Transaction amount must be entered.<br>";
            } else if ($amount <= 0) {
                $errors = $errors . "Transaction amount must be greater than zero.<br>";
            }
            if ($duration === "") {
                $errors = $errors . "Account duration must be entered.<br>";
            } else if ($duration < 0 || $duration != floor($duration)) {
                $errors = $errors . "Account duration must be a non-negative whole number.<br>";
            }
            if ($transaction_type == "Withdrawal" && $amount !== "" && $balance !== "") {
                if ($amount + $fee > $balance) {
                    $errors = $errors . "Withdrawal amount plus transaction fee must not exceed the opening balance.<br>";
                }
            }
            if (empty($_FILES['document']['name'])) {
                $errors = $errors . "Please select an identification document.<br>";
            }

            $file_name = "";
            $file_type = "";
            $file_size = 0;
            $file_temp = "";

            if ($errors === "") {

                $file_name = $_FILES['document']['name'];
                $file_type = $_FILES['document']['type'];
                $file_size = $_FILES['document']['size'];
                $file_temp = $_FILES['document']['tmp_name'];
                $file_error = $_FILES['document']['error'];

                $destination = $upload_folder . $file_name;

                if ($file_error != 0) {
                    $errors = $errors . "Upload error: PHP upload error code " . $file_error . ".<br>";
                } else if ($file_size > 2 * 1024 * 1024) {
                    $errors = $errors . "Upload error: the file is too large. The maximum size is 2 MB.<br>";
                } else if (file_exists($destination)) {
                    $errors = $errors . "Upload error: a file with that name already exists.<br>";
                } else if (!move_uploaded_file($file_temp, $destination)) {
                    $errors = $errors . "Upload error: the file could not be saved to " . $upload_folder . "<br>";
                }
            }

            if ($errors !== "") {

                echo "<div class='result-box'>";
                echo "<h3>Validation Errors</h3>";
                echo "<p style='color:red;'>" . $errors . "</p>";
                echo "<a href='lab1.php'>Back to Banking Form</a>";
                echo "</div>";
            } else {

                $totalCharges  = calculateTotalCharges($fee);
                $finalBalance  = calculateFinalBalance($balance, $transaction_type, $amount, $totalCharges);
                $status        = checkAccountStatus($finalBalance);
                $interest      = calculateInterest($finalBalance, $account_type, $duration);
                $futureBalance = calculateFutureBalance($finalBalance, $account_type, $duration);

                if ($account_type == "Savings") {
                    $rate = "5%";
                } else if ($account_type == "Current") {
                    $rate = "2%";
                } else if ($account_type == "Business") {
                    $rate = "3%";
                } else {
                    $rate = "0%";
                }

                echo "<div class='result-box'>";
                echo "<h3>Banking Transaction Receipt</h3>";
                echo "<table>";

                echo "<tr><th colspan='2'>Customer Information</th></tr>";
                echo "<tr><td><strong>Customer Full Name</strong></td><td>" . $name . "</td></tr>";
                echo "<tr><td><strong>Account Number</strong></td><td>" . $account_number . "</td></tr>";
                echo "<tr><td><strong>Gender</strong></td><td>" . $gender . "</td></tr>";
                echo "<tr><td><strong>Account Type</strong></td><td>" . $account_type . "</td></tr>";

                echo "<tr><th colspan='2'>Transaction Details</th></tr>";
                echo "<tr><td><strong>Opening Balance</strong></td><td>$" . number_format($balance, 2) . "</td></tr>";
                echo "<tr><td><strong>Transaction Type</strong></td><td>" . $transaction_type . "</td></tr>";
                echo "<tr><td><strong>Transaction Amount</strong></td><td>$" . number_format($amount, 2) . "</td></tr>";
                echo "<tr><td><strong>Transaction Fee</strong></td><td>$" . number_format($fee, 2) . "</td></tr>";
                echo "<tr><td><strong>Total Banking Charges</strong></td><td>$" . number_format($totalCharges, 2) . "</td></tr>";
                echo "<tr><td><strong>Final Balance</strong></td><td>$" . number_format($finalBalance, 2) . "</td></tr>";
                echo "<tr><td><strong>Account Status</strong></td><td>" . $status . "</td></tr>";

                echo "<tr><th colspan='2'>Interest and Projection</th></tr>";
                echo "<tr><td><strong>Account Duration</strong></td><td>" . $duration . " year(s)</td></tr>";
                echo "<tr><td><strong>Interest Rate</strong></td><td>" . $rate . "</td></tr>";
                echo "<tr><td><strong>Calculated Interest</strong></td><td>$" . number_format($interest, 2) . "</td></tr>";
                echo "<tr><td><strong>Projected Future Balance</strong></td><td>$" . number_format($futureBalance, 2) . "</td></tr>";

                echo "<tr><th colspan='2'>Identification Document</th></tr>";
                echo "<tr><td><strong>Document Name</strong></td><td>" . $file_name . "</td></tr>";
                echo "<tr><td><strong>File Type</strong></td><td>" . $file_type . "</td></tr>";
                echo "<tr><td><strong>File Size</strong></td><td>" . $file_size . " bytes</td></tr>";
                echo "<tr><td><strong>Upload Status</strong></td><td>Successful</td></tr>";

                echo "</table>";
                echo "<p><a href='lab1.php'>Back to Banking Form</a></p>";
                echo "</div>";
            }
        }
        ?>

    </div>

</body>

</html>