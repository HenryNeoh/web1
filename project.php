<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Blood Donation Project</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 2000px; /* Make the page scrollable */
            padding: 20px;
        }
        .content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .bgVideo {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            object-fit: cover;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            font-family: SFMono-Regular, Consolas, Liberation Mono, Menlo, monospace;
            color: #ffdfc7;
        }
        p {
            font-size: 1.2em;
            line-height: 1.6;
            font-family: 'GT Standard Mono', monospace;
        }
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff4136;
            color: #FFFF00;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            border: 2px solid #00FFFF;
            font-size: 1.2em;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }
        .cta-button:hover {
            background-color: #00FFFF;
            color: #FF0000;
            font-weight: bold;
            border: 2px solid #00FFFF;
        }
        .benefits {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
        }
        .benefit-item {
            flex-basis: 30%;
            background-color: rgba(255, 51, 51, 0.6);
            padding: 20px;
            border-radius: 10px;
        }
        #musicButton {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 2;
            padding: 9px 10px;
            background-color: rgba(255, 255, 255, 0.6);
            border: none;
            border-radius: 50%; /* Changed to make the button circle */
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 40px; /* Adjusted width to make the button smaller */
            height: 35px; /* Adjusted height to make the button smaller */
        }
        #musicButton i {
            font-size: 20px; /* Adjust size as needed */
           
        }
        #musicButton:hover {
            background-color: rgba(255, 255, 255, 0.9);
        }
        #donationForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #FFCCE5;
            font-weight: bold;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #FF0000;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 3;
            max-width: 450px;
            width: 90%;
        }
        #donationForm h2 {
            color: #FF0000;
            text-align: center;
            font-weight: bold;
            font-family: Tahoma, Verdana, sans-serif;
        }
        #donationForm label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #000000;
        }
        #donationForm input[type="text"],
        #donationForm input[type="email"],
        #donationForm input[type="tel"],
        #donationForm select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        #donationForm input[type="submit"] {
            background-color: #ff4136;
            color: #99FFCC;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 15px;
            display: block;
            margin: 15px auto;
            border: 2px solid #FF8000;
            font-weight: bold;
            font-size: 1.2em;
        }
        #donationForm input[type="submit"]:hover {
            background-color: #FF007F;
        }
        #closeForm {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 25px;
        }
        ::selection {
            background: #ffcc00;
            color: #000000;
        }
        #scrollToTopBtn {
            position: fixed;
            bottom: 0px;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none; /* Hidden by default */
            border: none;
            padding: 5px 10px; /* Adjusted padding to make the button smaller */
            background-color: rgba(153, 0, 0, 0.6);
            color: #FFFF00;
            border-radius: 50px; /* Changed to make the button circle */
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 1000; /* Ensure button is on top */
            transition: background-color 0.3s ease;
            font-size: 14px; /* Adjusted font size to make the button smaller */
            text-align: center;
            width: 40px; /* Adjusted width to make the button smaller */
            height: 40px; /* Adjusted height to make the button smaller */
        }
        #scrollToTopBtn i {
            font-size: 16px; /* Adjust size as needed */
        }
        #scrollToTopBtn:hover {
            background-color: rgba(204, 0, 0, 0.9);
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Donate Blood, Save Lives</h1>
        <p>Your donation can make a difference. Join us in our mission to save lives through blood donation.</p>
        <button class="cta-button" onclick="showDonationForm()">Donate Now</button>
        <div class="benefits">
            <div class="benefit-item">
                <h3>Why Donate?</h3>
                <p>Blood donation is a vital practice that saves millions of lives each year. Donating blood helps maintain an adequate supply of blood for patients in need, including those undergoing surgeries, cancer treatments, and emergency medical situations. Each donation can help multiple people, as blood can be separated into its components—red cells, platelets, and plasma—each serving different medical needs. Regular blood donation also ensures that hospitals have a steady and diverse supply of blood types to match the needs of their patients. By donating blood, you contribute to a critical, life-saving resource and play an essential role in the healthcare system.</p>
                <img src="i1.png" alt="Blood Donation" style="width: 100%; border-radius: 10px;">
            </div>
            <div class="benefit-item">
                <h3>Who Can Donate?</h3>
                <p>Most blood donation centers accept donors aged 17 to 65, though some may have different age limits or allow younger donors with parental consent. Donors should be in good health and weigh at least 110 pounds (50 kg). Certain medical conditions, medications, and recent travel to high-risk disease areas may affect eligibility. Pregnant women cannot donate, but breastfeeding women can, with healthcare provider approval. Donors generally need to wait 56 days between whole blood donations. For specific eligibility questions, consult your local blood donation center.</p>
                <img src="i2.png" alt="Blood Donation" style="width: 100%; border-radius: 10px;">
            </div>
            <div class="benefit-item">
                <h3>Donation Process</h3>
                <p>The process of donating blood is straightforward and safe. It typically begins with a health screening where a blood pressure check and a brief medical history review are conducted. Once cleared, the actual donation takes about 10-15 minutes. A sterile needle is used to collect about a pint of blood from your arm, which is a small portion of your total blood volume. After the donation, you'll be asked to rest for a few minutes and have a light snack to help replenish your energy. The entire process, including registration and recovery, usually takes about an hour. Donating blood is a simple procedure with minimal risk and can make a significant difference in someone's life.</p>
                <img src="i3.png" alt="Blood Donation" style="width: 100%; border-radius: 10px;">
            </div>
        </div>
    </div>

    <video autoplay muted loop playsinline class="bgVideo">
        <source src="s8.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <audio id="backgroundAudio" loop>
        <source src="bm1.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <audio id="successSound">
        <source src="applause.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <button id="musicButton"><i class="fas fa-play"></i></button>
    <button id="scrollToTopBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <div id="donationForm">
        <span id="closeForm" onclick="closeDonationForm()">&times;</span>
        <h2>Basic Information of Donate Blood</h2>
        <?php if (isset($success)): ?>
            <p style="color: green;">Thank you for scheduling your donation!</p>
        <?php elseif (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required style="background-color: #FFFF99; font-weight: bold;">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required style="background-color: #FFFF99; font-weight: bold;">

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required style="background-color: #FFFF99; font-weight: bold;">

            <label for="bloodType">Blood Type:</label>
            <select id="bloodType" name="bloodType" required style="background-color: #FFFF99; font-weight: bold;">
                <option value="" style="font-weight: bold;">Select Blood Type</option>
                <option value="A+" style="font-weight: bold;">A+</option>
                <option value="A-" style="font-weight: bold;">A-</option>
                <option value="B+" style="font-weight: bold;">B+</option>
                <option value="B-" style="font-weight: bold;">B-</option>
                <option value="AB+" style="font-weight: bold;">AB+</option>
                <option value="AB-" style="font-weight: bold;">AB-</option>
                <option value="O+" style="font-weight: bold;">O+</option>
                <option value="O-" style="font-weight: bold;">O-</option>
            </select>

            <input type="submit" value="Schedule Donation">
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const audio = document.getElementById('backgroundAudio');
        const musicButton = document.getElementById('musicButton');
        const donationForm = document.getElementById('donationForm');
        const successSound = document.getElementById('successSound');
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

        musicButton.addEventListener('click', () => {
            if (audio.paused) {
                audio.play();
                musicButton.innerHTML = '<i class="fas fa-pause"></i>';
            } else {
                audio.pause();
                musicButton.innerHTML = '<i class="fas fa-play"></i>';
            }
        });

        window.showDonationForm = () => {
            donationForm.style.display = 'block';
        };

        window.closeDonationForm = () => {
            donationForm.style.display = 'none';
        };

        function resetForm() {
            donationForm.querySelector('form').reset();
        }

        donationForm.querySelector('form').addEventListener('submit', (event) => {
            event.preventDefault();
            fetch(event.target.action, {
                method: 'POST',
                body: new FormData(event.target)
            })
            .then(response => response.text())
            .then(data => {
                if (data.includes('Thank you for scheduling your donation!')) {
                    closeDonationForm();
                    successSound.play();
                    alert('Thank you for scheduling your donation!');
                    resetForm();
                } else {
                    console.error('Form submission failed');
                    alert('Form submission failed. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });

        window.onscroll = function() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollToTopBtn.style.display = "block";
            } else {
                scrollToTopBtn.style.display = "none";
            }
        };

        scrollToTopBtn.onclick = function() {
            window.scrollTo({top: 0, behavior: 'smooth'});
        };

        <?php if (isset($success)): ?>
        showDonationForm();
        successSound.play();
        alert('Thank you for scheduling your donation!');
        resetForm();
        <?php endif; ?>
    });
    </script>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bloodType = $_POST['bloodType'];

    $sql = "INSERT INTO donors (name, email, phone, blood_type) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $bloodType);

    if ($stmt->execute()) {
        $success = true;
    } else {
        $error = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>