<!-- Include header -->
<?php include 'inc/header.php'; ?>

<?php 
    // mysql query and fetching data from mysql
    $query = 'SELECT * FROM feedback';
    // $conn variable is comming from inc/header -> inc/database
    $result = mysqli_query($conn, $query);
    // feedbacks from database in ASSOC(Associative array)
    $feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Past Feedback</h2>

<!-- check feedbacks array is empty or not -->
<!-- php if and endif -->
<?php if(empty($feedbacks)): ?>
    <h3>There is no feedback</h3>
<?php endif; ?>

<div class="feedbacks">
    <!-- php foreach and endforeach -->
    <?php foreach($feedbacks as $feedback): ?>
    <div id="feedback-<?php echo $feedback['id']; ?>">
        <p><?php echo $feedback['feedback']; ?></p>
        <h5>
            By <?php echo $feedback['name']; ?> on <?php echo $feedback['date'] ?>
        </h5>
    </div>
    <?php endforeach; ?>
</div>


<!-- Include footer -->
<?php include 'inc/footer.php'; ?>