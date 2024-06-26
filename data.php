<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XMLHttpRequest POST Example</title>
</head>
<body>
    <h1>XMLHttpRequest POST Example</h1>
    <div id="main">Response will be displayed here...</div>

    <script>
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "form_process.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var text = xhr.responseText;

                    var target = document.getElementById("main");
                    target.innerHTML = text;
                    console.log(text);
                    
                } else {
                    console.error("Failed to send data. Status: " + xhr.status);
                }
            }
        };

        var params = "first_name=Bob&last_name=Smith";
        xhr.send(params);
    </script>
</body>
</html>
