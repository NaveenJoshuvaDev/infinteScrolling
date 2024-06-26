"# infinteScrolling"

## Request

### XMLHttpRequest

- It is a Javascript class and its an object through which ajax is enabled.
  Few Functions it has come with it.
- new
- open(method, url ,async)
- send()

```

var xhr = new XMLHttpRequest();
xhr.open("GET", "script.php", true);//open function configures the object
xhr.send();//To make the request




```

### GET VS POST

- GET request used for retrieving data only
- POST requests used for sending/changing data

### For POST Request

- Sending Forms we need to change header for content type
- using setRequestHeader(header, value)

```
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");


```

- Send form data as argument to send()

```
var xhr = new XMLHttpRequest();

xhr.open("POST", "form_process.php", true);
xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhr.send("first_name=Bob&last_name=smith"); or xhr.send($data);

```

<!-- Request over -->

## Responses

### Ajax Responses

- Responses can either be text or XML.
- to work with text use responseText.(string of characters)
- to work with XML use responseXML.
- Text is more flexible:text, HTML,JSON, images, etc.

### using responseText in webpage

```
var xhr = new XMLHttpRequest();
xhr.open("GET","script.php", true);
xhr.send();

var text = xhr.responseText;
var xml = xhr.responseXML;

var target = document.getElementById("main");
target.innerHTML =text;

```

### Parse the Response

- XML
- JSON

- JSON PARSE
- When we send JSON data you will receive as an string

```
var person = {
    'first_name' : 'Bob',
    'last_name'  :  'Smith'
};

var response = "{
    'first_name' : 'Bob',
    'last_name'  :  'Smith'
}";
var person = JSON.parse(response);
```

- now we have to parse it using JSON.parse(response);.
- It will then turn into an json object.

```
var xhr = new XMLHttpRequest();
xhr.open("GET", "script.php", true);
xhr.send();

var json = JSON.parse(xhr.responseText);

var target = document.getElementById("main");
target.innerHTML = json.last_name;



```

### Example program for Json string and Javascript object

```
index.php

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





```

```
form_process.php

<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';

    $response = array(
        'data' => array(
            'first_name' => $first_name,
            'last_name' => $last_name
        )
    );

    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}
?>





```

The main differences between a JSON string and a JavaScript object lie in their format and how they are used within JavaScript:

### JSON String

- **Format**:

  - JSON (JavaScript Object Notation) is a text-based data format that is language-independent.
  - It consists of key-value pairs enclosed in curly braces `{}`, where keys are strings enclosed in double quotes `""`.
  - Example: `{"name": "John", "age": 30, "city": "New York"}`.

- **Purpose**:

  - JSON strings are primarily used for data interchange between systems and languages.
  - They are commonly used to send data from a server to a client or between servers over the web.
  - JSON must be parsed to be used within JavaScript as a native object.

- **Parsing**:

  - In JavaScript, you convert a JSON string to a JavaScript object using `JSON.parse()`.
  - Example: `var person = JSON.parse('{"name": "John", "age": 30, "city": "New York"}');`

- **Usage**:
  - Once parsed, a JSON string becomes a JavaScript object, allowing you to access its properties using dot notation or bracket notation.
  - Example: `console.log(person.name); // Outputs: John`

### JavaScript Object

- **Format**:

  - In JavaScript, an object is a collection of properties where each property has a key (name or identifier) and a value.
  - Keys can be strings or identifiers, and values can be any valid JavaScript data type.
  - Example: `{ name: "John", age: 30, city: "New York" }`.

- **Purpose**:

  - JavaScript objects are fundamental to the language and are used to organize and store data within a script.
  - They are used to represent complex data structures and are manipulated directly within JavaScript code.

- **Accessing Properties**:

  - Properties of JavaScript objects can be accessed using dot notation (`object.property`) or bracket notation (`object['property']`).
  - Example: `console.log(person.name); // Outputs: John`

- **Serializing**:
  - To convert a JavaScript object into a JSON string for data transmission or storage, you use `JSON.stringify()`.
  - Example: `var jsonStr = JSON.stringify({ name: "John", age: 30, city: "New York" });`

### Key Differences

1. **Format**: JSON is a text-based data interchange format, while JavaScript objects are native to the language.

2. **Usage**: JSON strings are used for data interchange between different systems or across the web, while JavaScript objects are used within the JavaScript environment to structure and manipulate data.

3. **Parsing/Serializing**: JSON strings need to be parsed into JavaScript objects using `JSON.parse()`, while JavaScript objects can be serialized into JSON strings using `JSON.stringify()`.

4. **Syntax**: JSON strings require keys to be enclosed in double quotes (`""`), while JavaScript object keys can be unquoted if they are valid identifiers.

Understanding these differences helps in effectively using JSON for data exchange and JavaScript objects for manipulating data within JavaScript applications.

### Ready States

When we click request the response is just doesn't happened on the go its step by step.

- 0: Connection created but not opened
- 1: Connection opened
- 2: Request sent, received by server
- 3: Response in progress(partial data)
- 4: Response complete (success or failure)

XMLHttpRequest object has a nethod onreadystatechange

- Used to store a Javascript function
- Called each time readyState changes
- Prevents having to constantly recheck value

```
var xhr = new XMLHttpRequest();
xhr.open("GET", "script.php", true);
ahr.onreadystatechange = function() {
  if(xhr.readyState == 4 && xhr.status == 200){
   var target = document.getElementById("main");
   target.innerHTML = json.last_name;
  }
}

xhr.send();

```

**Example for Ready States**

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="main">
        This is the original text when the page first loads.
    </div>
    <button id="ajax-button" type="button">Update content with Ajax</button>
    <script>
        function replaceText(){
            var target =document.getElementById("main");
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'new_content.txt', true);
            xhr.onreadystatechange = function () {
                console.log('readyState: ' + xhr.readyState);
                if(xhr.readyState == 2) {
                    target.innerHTML = 'Loading...';
                     console.log( target.innerHTML = 'Loading...');

                }
                if(xhr.readyState == 4 && xhr.status == 200){
                    setTimeout(function () {
                        target.innerHTML = xhr.responseText;
                }, 5000);

                }
            }
            xhr.send();
        }

        var button = document.getElementById("ajax-button");
        button.addEventListener("click", replaceText);
    </script>
</body>
</html>



```

```
new_content.txt
Hello world is here


```

### Load Remote JSON

**_Example of using an API to Load remote JSON Results_**

- you need your developer API key for this below function

```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax zip Code</title>
    <style>

    #entry {
      margin: 2em 1em;
    }
    #location {
        margin: 1em;
    }
    </style>
</head>
<body>
    <div id="entry">
        Zip code: <input id="zipcode" type="text" name="zipcode">
        <button id="ajax-button" type="button">Submit</button>

    </div>
    <div id="location">

    </div>
    <script>
        var api='https://maps.googleapis.com/maps/api/geocode/json';

        function findLocation()
        {
            var zipcode = document.getElementById('zipcode');
            var url = api + '?address=' + zipcode.value + '&key=YOUR_API_KEY';
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function () {
                if(xhr.readyState < 4)
                {
                    showLoading();
                }
                if(xhr.readyState == 4 && xhr.status == 200){
                    outputLocation(xhr.responseText);
                }
            };
            xhr.send();
        }
        function showLoading()
        {
            var target = document.getElementById('location');
            target.innerHTML = 'Loading....';
        }
        function outputLocation(data){
            var target = document.getElementById('location');
            var json = JSON.parse(data);
            var address = json.results[0].formatted_address;
            target.innerHTML = address;
        }
        var button = document.getElementById("ajax-button");
        button.addEventListener("click", findLocation);
    </script>
</body>
</html>


```
