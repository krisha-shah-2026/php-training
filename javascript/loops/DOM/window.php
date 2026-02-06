<html>
<head>
    <title>Interactive Window Event Handlers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
            height: 2000px;
            transition: background-color 0.3s ease;
        }
​
        #message {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            padding: 10px;
        }
​
        #keyPressDisplay {
            font-size: 24px;
            font-weight: bold;
            margin-top: 30px;
            color: #333;
        }
    </style>
</head>
<body>
​
    <h1>Interact with the Page!</h1>
    <div id="message">Resize the window, scroll down, or press a key!</div>
    <div id="keyPressDisplay"></div>
​
    <script>
        const message = document.getElementById('message');
        const keyPressDisplay = document.getElementById('keyPressDisplay');
​
        // Window Resize Event
        window.addEventListener('resize', function () {
            const width = window.innerWidth;
            const height = window.innerHeight;
            message.innerText = `Window resized! New dimensions: ${width}x${height}`;
​
            message.style.fontSize = (width / 50) + 'px';
        });
        window.addEventListener('scroll', function () {
            const scrollY = window.scrollY;
            document.body.style.backgroundColor = `rgb(${scrollY % 255}, ${255 - (scrollY % 255)}, 150)`;
​
            message.innerText = `You have scrolled! Scroll position: ${scrollY}px`;
        });
​
        // Window Keydown Event
        window.addEventListener('keydown', function (event) {
            keyPressDisplay.innerText = `You pressed the "${event.key}" key!`;
​
            if (event.key === 'Enter') {
                keyPressDisplay.style.color = 'green';
            } else if (event.key === 'Escape') {
                keyPressDisplay.style.color = 'red';
            } else {
                keyPressDisplay.style.color = '#333';
            }
        });
    </script>
​
</body>
</html>