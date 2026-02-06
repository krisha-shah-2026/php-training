<!DOCTYPE html>
<html>
<body>
<h1>JavaSritp Loops</h1>
<h2>The do...while Loop</h2>

<p id="demo"></p>

<script>
let text = ""
let i = 0;

do {
  text += "<br>The number is " + i;
  i++;
}
while (i < 10);  

document.getElementById("demo").innerHTML = text;
</script>

</body>
</html>
