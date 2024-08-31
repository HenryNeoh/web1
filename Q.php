<?php
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset'])) {
        // Reset user information
        unset($_SESSION['user_info']);
    } else {
        // Store user information in session
        $_SESSION['user_info'] = [
            'name' => htmlspecialchars($_POST['name']),
            'age' => (int) $_POST['age'],
            'blood_type' => htmlspecialchars($_POST['blood_type']),
            'occupation' => htmlspecialchars($_POST['occupation'])
        ];
    }
}

// Determine whether to show user information
$show_info = isset($_GET['show_info']) && $_GET['show_info'] === 'true';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #CCFFFF;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #e74c3c;
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        input[type="text"], input[type="number"], select {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #3498db;
            text-decoration: none;
        }
        .info {
            background-color: #eaf2f8;
            padding: 10px;
            border-radius: 5px;
        }

        .reset-btn {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👤 Personal Information</h1>
        
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo isset($_SESSION['user_info']['name']) ? htmlspecialchars($_SESSION['user_info']['name']) : ''; ?>"><br>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required value="<?php echo isset($_SESSION['user_info']['age']) ? (int) $_SESSION['user_info']['age'] : ''; ?>"><br>
            
            <label for="blood_type">Blood Type:</label>
            <select id="blood_type" name="blood_type" required>
                <?php
                $blood_types = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                foreach ($blood_types as $type) {
                    $selected = (isset($_SESSION['user_info']['blood_type']) && $_SESSION['user_info']['blood_type'] === $type) ? 'selected' : '';
                    echo "<option value=\"$type\" $selected>$type</option>";
                }
                ?>
            </select><br>
            
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required value="<?php echo isset($_SESSION['user_info']['occupation']) ? htmlspecialchars($_SESSION['user_info']['occupation']) : ''; ?>"><br>
            <input type="submit" value="Submit">
            <input type="submit" name="reset" value="Reset Information" class="reset-btn">
        </form>

        <a href="?show_info=<?php echo $show_info ? 'false' : 'true'; ?>">
            <?php echo $show_info ? '🙈 Hide Information' : '👀 Show Information'; ?>
        </a>

        <?php if ($show_info && isset($_SESSION['user_info'])): ?>
            <div class="info">
                <h2>Your Information:</h2>
                <p>Name: <?php echo htmlspecialchars($_SESSION['user_info']['name']); ?></p>
                <p>Age: <?php echo htmlspecialchars($_SESSION['user_info']['age']); ?></p>
                <p>Blood Type: <?php echo htmlspecialchars($_SESSION['user_info']['blood_type']); ?></p>
                <p>Occupation: <?php echo htmlspecialchars($_SESSION['user_info']['occupation']); ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
