<!-- Include header -->
<?php include 'inc/header.php'; ?>

<?php 
    // set empty string variables for inputs
    $name = $email = $feedback = '';
    $nameErr = $emailErr = $feedbackErr = '';

    // form submit
    // check button or input with name="submit"
    if(isset($_POST['submit'])){
        // validate name
        if(empty($_POST['name'])){
            $nameErr = 'Name is required';
        } else {
            // check if name is not empty then its not javascript code
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // validate email
        if(empty($_POST['email'])){
            $emailErr = 'Email is required';
        } else {
            // check if email is not empty then its not javascript code & email is valid
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        }

        // validate feedback
        if(empty($_POST['feedback'])){
            $feedbackErr = 'Feedback is required';
        } else {
            // check if feedback is not empty then its not javascript code
            $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // check all inputs are not empty
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['feedback'])){
            
            // Add all inputs to database
            $query = "INSERT INTO feedback (name, email, feedback) VALUES('$name', '$email', '$feedback')";

            if(mysqli_query($conn, $query)){
                // Success
                header('Location: feedback.php');
            } else {
                // Error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
?>

        <!-- <form action="index.php" method="post"> -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h3 class="form-heading">Sign Up</h3>
            <div class="form-div">
                <div class="group-input">
                    <label for="name">Name:</label>
                    <br>
                    <input class="<?php echo $nameErr ? 'invalid': null ?>" type="text" name="name" placeholder="John Doe" aria-placeholder="John Doe">
                    <div class="invalid-text">
                        <?php echo $nameErr ?>
                    </div>
                </div>
                <div class="group-input">
                    <label for="email">Email:</label>
                    <br>
                    <input class="<?php echo $emailErr ? 'invalid': null ?>" type="email" name="email" placeholder="john@gmail.com" aria-placeholder="john@gmail.com">
                    <div class="invalid-text">
                        <?php echo $emailErr ?>
                    </div>
                </div>
                <div class="group-input">
                    <label for="password">Feedback:</label>
                    <br>
                    <textarea class="<?php echo $feedbackErr ? 'invalid': null ?>" name="feedback" rows="4"></textarea>
                    <div class="invalid-text">
                        <?php echo $feedbackErr ?>
                    </div>
                </div>
            </div>
            <button name="submit" type="submit" class="primary-btn">Sign Up</button>
        </form>
    

<!-- Include footer -->
<?php include 'inc/footer.php'; ?>