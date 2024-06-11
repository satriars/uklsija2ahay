<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Log-in</h1><br>
        <?php
        if (isset($_GET['pesan']) && $_GET['pesan'] == 'gagal') {
            echo "<p style='color:red;'>Login gagal! Username atau password salah.</p>";
        }
        ?>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br>

            <input type="submit" href="register.php" value="Login">
        </form>
        <div class="forget">
            <p>Belum punya akun? <a href="register.php">Register disini</a></p>
        </div>
    </div>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .container {
            background-color: #fff;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff0000;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 3px;
        }

        input[type="submit"]:hover {
            background-color: #c30000;
        }

        .forget {
            margin-top: 10px;
            text-align: center;
        }

        a {
            color: #ff0000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>
