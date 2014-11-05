<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body onclick="onClick()" onmouseover="onMouseOver()" onmouseout="onMouseOut()">
    {{ HTML::decode($plug->code )}}
<script>
    var initialTime;
    function onClick() {
        var http = new XMLHttpRequest();
        var url = "{{$_ENV['URL']}}plug/click";
        var params = "unique_id={{$plug->unique_id}}";
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function () {
            if (http.readyState == 4 && http.status == 200) {
                console.info(http.responseText);
            }
        };
        http.send(params);
    }
    function onMouseOver() {
        initialTime= Date.now();
    }
    function onMouseOut() {
        var finalTime = Date.now() - initialTime;
        @if($_ENV['HOVER_ENABLE'])
        if(finalTime > '{{ $_ENV['MIN_HOVER_TIME'] }}'){
            var http = new XMLHttpRequest();
            var url = "{{$_ENV['URL']}}plug/hover";
            var params = "time=" + finalTime;
            http.open("POST", url, true);
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            http.onreadystatechange = function () {
                if (http.readyState == 4 && http.status == 200) {
                    console.info(http.responseText);
                }
            };
            http.send(params);
        }
        @endif
    }
</script>
</body>
</html>