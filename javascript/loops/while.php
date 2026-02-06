<!DOCTYPE html>
<html>
<body>
<h1>JavaScript Loops</h1>
<h2>The While Loop</h2>

<p id="demo"></p>

<script>
let text = "html content";

let i = 0;
while (i < 10) {
  text += "The number is " + i + "<br>";
  i++;
}

document.getElementById("demo").innerHTML = text;
</script>

</body>
</html>
