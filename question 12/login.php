<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e0f7fa;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            width: 360px;
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #00796b;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            color: #004d40;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1.5px solid #00796b;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #004d40;
            outline: none;
        }
        button {
            margin-top: 25px;
            width: 100%;
            background-color: #00796b;
            border: none;
            padding: 12px;
            font-size: 18px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #004d40;
        }
        .error, .success {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
        }
        .error {
            background-color: #ffcdd2;
            color: #c62828;
        }
        .success {
            background-color: #c8e6c9;
            color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="" method="POST" novalidate>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required autocomplete="off" />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required autocomplete="off" />

        <button type="submit">Login</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = trim($_POST["username"] ?? '');
        $pass = $_POST["password"] ?? '';

        if ($uname === '' || $pass === '') {
            echo '<div class="error">Please enter both username and password.</div>';
        } else {
            $file = fopen("login.txt", "r");
            $is_valid = false;

            while (($line = fgets($file)) !== false) {
                $line = trim($line);
                if (empty($line)) continue;

                list($file_uname, $file_hash) = explode(":", $line, 2);

                if ($file_uname === $uname && password_verify($pass, $file_hash)) {
                    $is_valid = true;
                    break;
                }
            }
            fclose($file);

            if ($is_valid) {
                echo '<div class="success">Access granted! Welcome, ' . htmlspecialchars($uname) . '.</div>';
            } else {
                echo '<div class="error">Invalid username or password.</div>';
            }
        }
    }
    ?>
</div>

</body>
</html>
