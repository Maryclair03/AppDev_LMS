<?php
if(isset($_POST['save'])){
    $loan_id = $_POST['loan_id'];
    $pay_amount = $_POST['pay_amount'];
    $penalty = $_POST['penalty'];
    $pay_date = date('Y-m-d H:i:s');
    
    // Save the payment record
    $db->conn->query("INSERT INTO payment (loan_id, pay_amount, penalty, pay_date) VALUES ('$loan_id', '$pay_amount', '$penalty', '$pay_date')");
    
    // Update the loan_schedule to mark as paid
    // Assuming that payment_status 1 means paid, and 0 means not paid
    $update_schedule_query = "UPDATE loan_schedule SET payment_status = 1 WHERE loan_id = '$loan_id' AND payment_status = 0 LIMIT 1";
    if($db->conn->query($update_schedule_query) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }
    
    // Redirect or give feedback
    header('Location: userhomepage.php');
}
?>
