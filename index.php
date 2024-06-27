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
            var url = api + '?address=' + zipcode.value;
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