<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XMLHttpRequest Example</title>
</head>
<body>
   
    <div id="main">Content will be loaded here...</div>

    <script>
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "script.php", true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var text = xhr.responseText;
                    var xml = xhr.responseXML;

                    var target = document.getElementById("main");
                    target.innerHTML = text;
                    console.log(text);
                } else {
                    console.error("Failed to fetch data. Status: " + xhr.status);
                }
            }
        };

        xhr.send();
    </script>
</body>
</html>
