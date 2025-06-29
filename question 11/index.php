<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Submission</title>
    <style>
        .container {
            margin: 50px auto;
            width: 400px;
            padding: 30px;
            background-color: #f5f5f5;
            border-radius: 10px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.5);
        }
        textarea {
            font-size: 14px;
            padding: 10px;
            margin: 5px 0;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
            resize: vertical;
        }
        input[type="submit"], input[type="reset"] {
            font-size: 14px;
            background-color: #ccc;
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #8bc34a;
            color: white;
        }
        input[type="reset"]:hover {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Your Information</h2>
    <form action="" method="POST">
        <label for="info">Information:</label><br />
        <textarea id="info" name="info" rows="6" required></textarea><br /><br />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset" />
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $info = trim($_POST["info"]);

    if (!empty($info)) {
        // Append the information to form.txt
        $file = fopen("form.txt", "a");
        fwrite($file, $info . PHP_EOL);
        fclose($file);

        // Use json_encode to safely output text in JS alert
        $js_info = json_encode($info);

        echo "<script>alert('Information submitted successfully!\\n' + $js_info);</script>";
    } else {
        echo "<script>alert('Please enter some information before submitting.');</script>";
    }
}
?>

</body>
</html>
