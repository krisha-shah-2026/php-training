<html>
<head>
    <title>Event Bubbling vs Capturing</title>
    <style>
        #parent {
            background-color: lightblue;
            padding: 20px;
            margin: 20px;
        }

        #child {
            background-color: lightgreen;
            padding: 20px;
            margin: 20px;
        }
    </style>
</head>
<body>

    <div id="parent">
        <p id="child">Click me!</p>
    </div>

    <script>
        const parent = document.getElementById('parent');
        const child = document.getElementById('child');
        parent.addEventListener('click', function () {
            alert('Parent Div Clicked (Capturing)');
        }, true);

        child.addEventListener('click', function () {
            alert('Child Div Clicked (Bubbling)');
        });
    </script>

</body>
</html>