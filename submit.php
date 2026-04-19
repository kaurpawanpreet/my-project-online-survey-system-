<?php include "db.php"; ?>

<?php
foreach ($_POST as $ans) {
    $conn->query("INSERT INTO responses (option_id) VALUES ($ans)");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submission</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 text-center">

        <h2 class="text-success mb-3"> Submitted Successfully</h2>

        <p class="mb-4">Thank you for your response!</p>

        <a href="result.php" class="btn btn-primary me-2">View Results</a>
        <a href="index.php" class="btn btn-secondary">Back to Survey</a>

    </div>
</div>

</body>
</html>