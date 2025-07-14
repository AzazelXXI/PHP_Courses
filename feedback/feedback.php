
<?php include 'inc/header.php'; ?>
<?php require_once  'config/database.php'; ?>

<h2>Feedback</h2>

<?php
// Fetch all feedback from DB and store in array
$sql = "SELECT name, body, date FROM feedback ORDER BY date DESC";
$result = $conn->query($sql);

$feedbacks = [];
// [
//   [ 'id' => 1, 'name' => 'John', 'body' => 'Great website!' ,'date'=>' '],
//   [ 'id' => 2, 'name' => 'Alice', 'body' => 'Loved the UI.','date' =>' ' ]
// ]

if ($result && $result->num_rows > 0) {
    $feedbacks = $result->fetch_all(MYSQLI_ASSOC); // store all rows as associative array
}
?>



<?php if (!empty($feedbacks)): ?>
    <?php foreach ($feedbacks as $feedback): ?>
        <div class="card my-3">
            <div class="card-body">
                <p class="mb-1"><strong><?= htmlspecialchars($feedback['name']) ?></strong></p>
                <p class="mb-1"><?= nl2br(htmlspecialchars_decode($feedback['body'])) ?></p>
                <small class="text-muted">Submitted at: <?= $feedback['date'] ?></small>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-muted">No feedback available yet.</p>
<?php endif; ?>

<?php include 'inc/footer.php'; ?>