<?php
date_default_timezone_set("Etc/GMT+8");
require_once 'class.php';

if (isset($_POST['save'])) {
    $db = new db_class();
    $loan_id = $_POST['loan_id'];
    $payee = $_POST['payee'];
    $penalty = $_POST['penalty'];
    $payable = str_replace(",", "", $_POST['payable']);
    $payment = $_POST['payment'];
    $month = $_POST['month'];

    $overdue = ($penalty == 0) ? 0 : 1;

    if ($payable != $payment) {
        echo "<script>alert('Please enter the correct amount to pay!')</script>";
        echo "<script>window.location='payment.php'</script>";    
    } else {
        if ($db->save_payment($loan_id, $payee, $payment, $penalty, $overdue)) {
            echo "Payment saved successfully.<br>";
        } else {
            echo "Failed to save payment.<br>";
        }

        $count_pay = $db->conn->query("SELECT * FROM `payment` WHERE `loan_id`='$loan_id'");
        if ($count_pay) {
            $num_rows = $count_pay->num_rows;
        } else {
            echo "Error in counting payments: " . $db->conn->error . "<br>";
        }

        if ($num_rows === (int)$month) {
            if ($db->conn->query("UPDATE `loan` SET `status`='3' WHERE `loan_id`='$loan_id'")) {
                echo "Loan status updated.<br>";
            } else {
                echo "Failed to update loan status.<br>";
            }
        }

        header("location: payment.php");
    }
}
?>
