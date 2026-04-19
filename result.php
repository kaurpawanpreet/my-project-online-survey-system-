<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Survey Results</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">

        <h2 class="text-center mb-4">Survey Results</h2>

        <?php
        $total = $conn->query("SELECT COUNT(*) as total FROM responses")->fetch_assoc()['total'];

        $q = $conn->query("SELECT * FROM options");

        while ($row = $q->fetch_assoc()) {
            $oid = $row['id'];

            $count = $conn->query("SELECT COUNT(*) as c FROM responses WHERE option_id=$oid")->fetch_assoc()['c'];

            $percent = $total > 0 ? round(($count/$total)*100,2) : 0;
        ?>

            <div class="mb-4">
                <h5><?php echo $row['option_text']; ?></h5>

                <div class="progress">
                    <div class="progress-bar" role="progressbar"
                        style="width: <?php echo $percent; ?>%;">
                        <?php echo $percent; ?>%
                    </div>
                </div>

                <small><?php echo $count; ?> votes</small>
            </div>

        <?php } ?>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Back to Survey</a>
        </div>

    </div>
</div>

</body>
</html>