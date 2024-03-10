<?php
    session_start();
    include("connection.php");

    // Display feedbacks in a table
$feedbackTable = '';
$feedbackQuery = "SELECT * FROM feedback";
$feedbackResult = $conn->query($feedbackQuery);

if ($feedbackResult->num_rows > 0) {
    $feedbackTable .= '<table>
                        <tr>
                            <th>User ID</th>
                            <th>Feedback</th>
                            <th>Action</th>
                        </tr>';
    while ($feedbackRow = $feedbackResult->fetch_assoc()) {
        $feedbackTable .= '<tr>
                            <td>' . $feedbackRow['user_id'] . '</td>
                            <td>' . $feedbackRow['feedback_text'] . '</td>
                            <td><a style="color:#03131A; background-color:snow; text-decoration:none;" href="?deletefeedback=' . $feedbackRow['user_id'] . '">Cancel</a></td>
                        </tr>';
    }
    $feedbackTable .= '</table>';
}

// delete feedback logic
if (isset($_GET['deletefeedback'])) {
    $deletefeedback = intval($_GET['deletefeedback']);
    $deletefeedbackquery = "DELETE FROM feedback WHERE user_id = $deletefeedback";
    if ($conn->query($deletefeedbackquery) === TRUE) {
        // Set the message variable after canceling booking
        $deletefeedbackmsg = "Feedback deleted successfully";
    } else {
        $deletefeedbackmsg = "Error deleting feedback: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/feedback.css">
    <title>Feedbacks</title>
</head>
<body>
    <?php
        include("navbar.php");
    ?>
<div class="feedback">
        <!-- feedback Details Message Box -->
        <div class="message-container">
            <?php
            if (!empty($deleteBookingMessage)) {
                echo '<div class="success-message">' . $deleteBookingMessage . '</div>';

                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div class="fbwrapper">
            <h2 id="fb">Feedbacks</h2>
            <?php echo $feedbackTable; ?>
        </div>
    </div>
</body>
</html>