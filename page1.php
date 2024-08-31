<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #66FFB2;
        }

        header {
            background: linear-gradient(45deg, rgba(204, 255, 204, 0.6), #ffb3ba, #bae1ff);
            border-radius: 20px;
            border: 2px solid #FF99CC;
            color: white;
            padding: 10px;
        }

        nav {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 20px auto;
            background-color: rgba(204, 255, 204, 0);
            border-radius: 10px;
            overflow: hidden;           
        }        

        nav ul {
            list-style: none;
            margin: 0;
            padding: 10px;
            flex: 1;
            background: linear-gradient(45deg, rgba(204, 255, 204, 0.6), #ffb3ba, #bae1ff);
        }

        nav ul li {
            display: inline-block;
            margin-right: 15px;
        }

        main {
            margin: 20px;
        }

        article {
            background-color: rgba(0, 255, 255, 0.5);           
            border: 1px solid #ccc;
            border-radius: 20px;
            border: 2px solid #FF99CC;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.5;
        }

        footer {
            text-align: center;
            padding: 10px;
        }

        .bgVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
            width: auto; 
            height: auto; 
            z-index: -100;
            background-size: cover;
            overflow: hidden;
        }

        ::selection {
            background: #ffcc00; /* Background color for the selected text */
            color: #000000; /* Text color for the selected text */
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="project.php">PROJECT</a></li>
                <li><a href="p1.php">p1</a></li>
                <li><a href="p2.php">p2</a></li>
                <li><a href="notes.php">NOTES</a></li>
                <li><a href="links.php">LINKS</a></li>
                <li><a href="#guides">GUIDES</a></li>
                <li><a href="#almanac">ALMANAC</a></li>
                <li><a href="#shuffle">SHUFFLE</a></li>
                <li><a href="q.php">Q</a></li>
            </ul>
        </nav>
        <video autoplay muted loop class="bgVideo">
            <source src="s2.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </header>

    <main>
        <article>
            <section>
                <h1>Basic keyboard shortcut support for focused links</h1>
                <p>Eric gifting us with his research on all the various things that anchors (not links) do when they are in [...]</p>
            </section>
            <footer>
                <p>PROJECT on Aug 23, 2024</p>
            </footer>
        </article>
    </main>

    <footer>
        <p>&copy; PROJECT 2024</p>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var audio = new Audio('bs1.mp3?v=' + new Date().getTime());
        audio.preload = 'auto';

        audio.addEventListener('error', function() {
            console.error('Audio failed to load.');
        });

        audio.addEventListener('loadeddata', function() {
            console.log('Audio loaded successfully');
        });

        audio.addEventListener('play', function() {
            console.log('Audio started playing');
        });

        audio.addEventListener('ended', function() {
            console.log('Audio finished playing');
        });

        var links = document.querySelectorAll('nav a');

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                var href = this.getAttribute('href'); // Store the href attribute of the clicked link

                audio.currentTime = 0;
                audio.play().then(function() {
                    // Navigate to the new page shortly after the audio starts
                    setTimeout(function() {
                        window.location.href = href;
                    }, 350); // Adjust the timeout value as needed
                }).catch(function(error) {
                    console.error('Audio play error:', error);
                    window.location.href = href; // Navigate to the new page if there's an error playing audio
                });
            });
        });
    });
</script>

</body>
</html>