<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Submission</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      color: #FFD700;
      font-weight: bold;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('a.jpg');
      background-size: cover;
      background-position: center;
      position: relative; /* Allow absolute positioning of child elements */
    }

    .video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    form {
      background-color: rgba(204, 255, 255, 0.5);
      border: 1px solid #000;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 30px;
      border-width: 2px;
      border-color: #99FFFF;
    }
    .form-group {
      margin-bottom: 10px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      color: #000000;
      font-weight: bold;
      padding: 5px;
      box-sizing: border-box;
      border-radius: 100px;
    }
    
    input[type="submit"] {
      background-color: #99FFFF;
      font-weight: bold;
      color: #0000FF;
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, color 0.3s ease;
      display: block;
      margin: 0 auto;
      border-radius: 30px;
    }

    input[type="submit"]:hover, 
    input[type="submit"]:focus{
      background-color: #FFFF00;
      color: #FF0000;
      border-radius: 30px;
    }

    .typewriter h1 {
      color: #FFFF00;
      font-size: 35px;
      font-family: monospace;
      overflow: hidden; /* Ensures the content is not revealed until the animation */
      border-right: .15em solid orange; /* The typwriter cursor */
      white-space: nowrap; /* Keeps the content on a single line */
      margin: 0 0 40px 0;
      letter-spacing: .15em; /* Adjust as needed */
      
      animation: 
        typing 3.5s steps(30, end),
        blink-caret .5s step-end infinite;
      }

        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange }
        }

        @media (max-width: 600px) {
      form {
        width: 90%;
      }
    }

    ::selection {
            background: #ffcc00; /* Background color for the selected text */
            color: #000000; /* Text color for the selected text */
        }

  </style>
</head>
<body>
  <video class="video-background" autoplay muted loop>
    <source src="s.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Typewriter text element -->
  <div class="typewriter">
    <h1>WELCOME...</h1>
  </div>

  <form action="submit.php" method="post">
    <div class="form-group">
      <label for="firstname">First name:</label>
      <input type="text" id="firstname" name="firstname" required>
    </div>
    <div class="form-group">
      <label for="lastname">Last name:</label>
      <input type="text" id="lastname" name="lastname" required>
    </div>
    <input type="submit" value="Submit">
  </form>
</body>
</html>