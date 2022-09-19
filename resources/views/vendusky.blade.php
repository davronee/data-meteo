<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin:0px;padding:0px;overflow:hidden">
<iframe id="myiFrame" class="innerIframe" name="innerIframe"
        src="https://www.ventusky.com/?p=41.1;66.6;5&l=temperature-2m" frameborder="0"
        style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px"
        height="100%" width="100%"></iframe>
<script>
    window.onload = function() {
        let link = document.createElement("link");
        link.href = "iframeCss.css";      /**** your CSS file ****/
        link.rel = "stylesheet";
        link.type = "text/css";
        frames[0].document.head.appendChild(link); /**** 0 is an index of your iframe ****/
    }

</script>
</body>
</html>
