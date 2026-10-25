<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Account and Transaction Management System</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <form class="form-box" action="process.php" method="post" enctype="multipart/form-data">

            <h2>Banking Account Form</h2>
            <p class="subtitle">Enter the customer's details and transaction (fictional data only).</p>

            <label for="name">Customer Full Name</label>
            <input type="text" id="name" name="name" placeholder="e.g. Ahmed Ali">

            <label for="account_number">Account Number</label>
            <input type="text" id="account_number" name="account_number" placeholder="e.g. C1230218">

            <label>Gender</label>
            <div class="options two">
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
            </div>

            <label for="account_type">Account Type</label>
            <select name="account_type" id="account_type">
                <option value="">Select account type</option>
                <option value="Savings">Savings</option>
                <option value="Current">Current</option>
                <option value="Business">Business</option>
            </select>

            <label for="balance">Opening Balance ($)</label>
            <input type="number" id="balance" name="balance" step="any" placeholder="e.g. 1000">

            <label>Transaction Type</label>
            <div class="options two">
                <input type="radio" id="deposit" name="transaction_type" value="Deposit">
                <label for="deposit">Deposit</label>

                <input type="radio" id="withdrawal" name="transaction_type" value="Withdrawal">
                <label for="withdrawal">Withdrawal</label>
            </div>

            <label for="amount">Transaction Amount ($)</label>
            <input type="number" id="amount" name="amount" step="any" placeholder="e.g. 200">

            <label for="duration">Account Duration (Years)</label>
            <input type="number" id="duration" name="duration" step="1" placeholder="e.g. 2">

            <label for="document">Identification Document</label>
            <input type="file" id="document" name="document">

            <div class="buttons">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" name="register" class="btn btn-primary">Process Transaction</button>
            </div>

        </form>
    </div>
</body>

</html>