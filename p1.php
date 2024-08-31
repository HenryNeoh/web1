<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 1rem;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="file"] {
            margin-bottom: 1rem;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 1rem;
            padding: 0.5rem;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload File" name="submit">
        </form>

        <?php
        if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $message = "";
            $messageClass = "";

            // Check if file already exists
            if (file_exists($target_file)) {
                $message = "Sorry, file already exists.";
                $uploadOk = 0;
                $messageClass = "error";
            }

            // Check file size (limit to 5MB)
            if ($_FILES["fileToUpload"]["size"] > 5000000) {
                $message = "Sorry, your file is too large.";
                $uploadOk = 0;
                $messageClass = "error";
            }

            // Upload the file
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    $messageClass = "success";
                } else {
                    $message = "Sorry, there was an error uploading your file.";
                    $messageClass = "error";
                }
            }

            if ($message) {
                echo "<div class='message $messageClass'>$message</div>";
            }
        }
        ?>
    </div>
</body>
</html>