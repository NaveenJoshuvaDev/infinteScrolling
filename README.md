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
