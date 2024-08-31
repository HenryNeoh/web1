<?php
$uploadDir = 'uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['note_text'];
    
    // Handle file upload
    if (!empty($_FILES['file']['name'])) {
        $fileName = basename($_FILES['file']['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'mp4', 'avi', 'mov');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                echo "The file " . $fileName . " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        } else {
            echo 'Sorry, only JPG, JPEG, PNG, GIF, MP4, AVI & MOV files are allowed to upload.<br>';
        }
    }
    
    // Save text note
    if (!empty($text)) {
        $textFileName = $uploadDir . 'note_' . date('Y-m-d_H-i-s') . '.txt';
        if (file_put_contents($textFileName, $text)) {
            echo "Text note has been saved as " . basename($textFileName) . "<br>";
        } else {
            echo "Sorry, there was an error saving your text note.<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #FFFFCC;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        textarea, input[type="file"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        ::selection {
            background: #ffcc00;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Notes</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <textarea name="note_text" rows="4" placeholder="Enter your text note here"></textarea>
            <input type="file" name="file"><br><br>
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</body>
</html>