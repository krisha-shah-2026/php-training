<html>

<head>
    <title>Multiple Event Listeners Example</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        #myButton {
            padding: 15px 30px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            transition: background-color 0.3s ease;
        }

        #myButton:hover {
            background-color: #45a049;
        }

        #message {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div>
        <button id="myButton">Click me!</button>
        <h1 id="message"></h1>
    </div>

    <script>
        const button = document.getElementById("myButton");
        const message = document.getElementById("message");

        button.addEventListener("click", function () {
            button.style.backgroundColor = "lightblue";
            message.innerText = "Button was clicked!";
        });


        button.addEventListener("mouseenter", function () {
            message.innerText = "Mouse is over the button!";
        });


        button.addEventListener("mouseleave", function () {
            message.innerText = "Mouse left the button!";
        });


        document.addEventListener("keydown", function (event) {
            if (event.key === "Enter") {
                message.style.color = "green";
                message.innerText = "Enter key pressed!";
            }
        });
    </script>

</body>
</html>