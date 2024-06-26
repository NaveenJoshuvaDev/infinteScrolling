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

        // Open a POST request to form_process.php
        xhr.open("POST", "form_process.php", true);

        // Set the request header to indicate form data
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Define the callback function to handle state changes
        xhr.onreadystatechange = function() {
            // Check if the request is complete
            if (xhr.readyState === XMLHttpRequest.DONE) {
                // Check if the request was successful
                if (xhr.status === 200) {
                    // The response is received as a JSON string
                    var text = xhr.responseText;
         console.log(text);
                    // Parse the JSON string into a JavaScript object
                    var response = JSON.parse(text);
console.log(JSON.stringify(response));
                    // Create a string with the response data
                    var displayText = "Data received: First Name - " + response.data.first_name + ", Last Name - " + response.data.last_name;

                    // Update the content of the div with ID 'main'
                    var target = document.getElementById("main");
                    target.innerHTML = displayText;
                } else {
                    // Log an error if the request failed
                    console.error("Failed to send data. Status: " + xhr.status);
                }
            }
        };

        // Prepare the parameters to be sent in the request
        var params = "first_name=Bob&last_name=Smith";

        // Send the request with the parameters
        xhr.send(params);
    </script>
</body>
</html>
