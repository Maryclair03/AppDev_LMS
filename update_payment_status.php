<?php
require 'database_connection.php'; // Make sure to include your actual database connection script

if (isset($_POST['loan_id']) && isset($_POST['payment_status'])) {
    $loan_id = $_POST['loan_id'];
    $payment_status = $_POST['payment_status']; // 1 for Paid, 0 for Not Paid

    // Update the payment status in the database
    $stmt = $db->conn->prepare("UPDATE loan_schedule SET payment_status = ? WHERE loan_id = ?");
    $stmt->bind_param("ii", $payment_status, $loan_id);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    
    $stmt->close();
}
?>
