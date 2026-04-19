<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Survey Form</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h2 class="text-center mb-4">Survey Form</h2>

        <form action="submit.php" method="POST">

        <?php
        $q = $conn->query("SELECT * FROM questions");

        while ($row = $q->fetch_assoc()) {
            echo "<div class='mb-4'>";
            echo "<h5 class='fw-bold'>".$row['question']."</h5>";

            $qid = $row['id'];
            $opt = $conn->query("SELECT * FROM options WHERE question_id=$qid");

            while ($o = $opt->fetch_assoc()) {
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='radio' name='q$qid' value='".$o['id']."' id='opt".$o['id']."'>
                    <label class='form-check-label' for='opt".$o['id']."'>
                        ".$o['option_text']."
                    </label>
                </div>";
            }

            echo "</div>";
        }
        ?>

        <button type="submit" class="btn btn-danger w-100">Submit</button>
        </form>

    </div>
</div>

<script>
document.querySelector("form").onsubmit = function() {
    let checked = document.querySelector("input[type=radio]:checked");
    if (!checked) {
        alert("Please select an option");
        return false;
    }
};
</script>

</body>
</html>