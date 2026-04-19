<?php 
session_start();

//  LOGIN CHECK
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php"; 

//  SAVE LOGIC (TOP PAR)
if (isset($_POST['save'])) {

    $q = $_POST['question'];
    $opt1 = $_POST['opt1'];
    $opt2 = $_POST['opt2'];

    // Insert question
    if ($conn->query("INSERT INTO questions (question) VALUES ('$q')")) {

        $qid = $conn->insert_id;

        // Insert options
        $conn->query("INSERT INTO options (question_id, option_text) VALUES ($qid, '$opt1')");
        $conn->query("INSERT INTO options (question_id, option_text) VALUES ($qid, '$opt2')");

        header("Location: index.php");
        exit();
    } else {
        $error = $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- Logout -->
    <div class="text-end mb-3">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Add Survey Question</h2>

        <!-- ERROR -->
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <!-- FORM -->
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Question</label>
                <input type="text" name="question" class="form-control" placeholder="Enter Question" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Option 1</label>
                <input type="text" name="opt1" class="form-control" placeholder="Option 1" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Option 2</label>
                <input type="text" name="opt2" class="form-control" placeholder="Option 2" required>
            </div>

            <button name="save" class="btn btn-danger w-100">Save</button>
        </form>

    </div>

</div>

</body>
</html>