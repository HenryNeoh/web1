<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;

// Set the PDF renderer path
Settings::setPdfRendererPath('vendor/tecnickcom/tcpdf');
Settings::setPdfRendererName('TCPDF');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['docxFile'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["docxFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a DOCX
    if ($fileType !== "docx") {
        echo "Sorry, only DOCX files are allowed.";
        exit;
    }

    if (move_uploaded_file($_FILES["docxFile"]["tmp_name"], $targetFile)) {
        // Load DOCX file
        $phpWord = IOFactory::load($targetFile);

        // Save as PDF
        $pdfWriter = IOFactory::createWriter($phpWord, 'PDF');
        $pdfFile = $targetDir . pathinfo($targetFile, PATHINFO_FILENAME) . '.pdf';
        $pdfWriter->save($pdfFile);

        echo "File converted successfully. <a href='$pdfFile' download>Download PDF</a>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCX to PDF Converter</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        color: #333;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f4f4f4;
    }
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }
    form {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #e0e0e0;
    }
    input[type="file"] {
        display: block;
        margin-bottom: 20px;
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #3498db;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }
    input[type="submit"]:hover {
        background-color: #2980b9;
    }
    .success-message, .error-message {
        text-align: center;
        padding: 15px;
        margin-top: 20px;
        border-radius: 4px;
        font-weight: bold;
    }
    .success-message {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    .success-message a {
        color: #155724;
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <h1>DOCX to PDF Converter</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="docxFile" accept=".docx" required>
        <input type="submit" value="Convert to PDF">
    </form>
</body>
</html>