<?php

function calculateDeposit($balance, $amount)
{
    $depositBalance = $balance + $amount;
    return $depositBalance;
}

function calculateWithdrawal($balance, $amount)
{
    $withdrawalBalance = $balance - $amount;
    return $withdrawalBalance;
}

function calculateTransactionFee($transaction_type, $amount)
{
    $fee = 0;

    if ($transaction_type == "Deposit") {
        $fee = 0;
    } else if ($transaction_type == "Withdrawal" && $amount < 500) {
        $fee = 2;
    } else if ($transaction_type == "Withdrawal" && $amount >= 500) {
        $fee = 5;
    } else {
        $fee = 0;
    }

    return $fee;
}

function calculateInterest($finalBalance, $account_type, $duration)
{
    $rate = 0;

    if ($account_type == "Savings") {
        $rate = 0.05;
    } else if ($account_type == "Current") {
        $rate = 0.02;
    } else if ($account_type == "Business") {
        $rate = 0.03;
    } else {
        $rate = 0;
    }

    $interest = $finalBalance * $rate * $duration;
    return $interest;
}

function calculateTotalCharges($fee)
{
    $totalCharges = $fee;
    return $totalCharges;
}

function calculateFinalBalance($balance, $transaction_type, $amount, $totalCharges)
{
    $finalBalance = 0;

    if ($transaction_type == "Deposit") {
        $finalBalance = calculateDeposit($balance, $amount) - $totalCharges;
    } else {
        $finalBalance = calculateWithdrawal($balance, $amount) - $totalCharges;
    }

    return $finalBalance;
}

function checkAccountStatus($finalBalance)
{
    $status = "";

    if ($finalBalance >= 5000) {
        $status = "High Balance";
    } else if ($finalBalance >= 1000) {
        $status = "Medium Balance";
    } else {
        $status = "Low Balance";
    }

    return $status;
}

function calculateFutureBalance($finalBalance, $account_type, $duration = 1)
{
    $interest = calculateInterest($finalBalance, $account_type, $duration);
    $futureBalance = $finalBalance + $interest;
    return $futureBalance;
}
?>