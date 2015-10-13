<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <!-- Enables full-screen on iOS devices -->
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="HandheldFriendly" content="true" />

    <title>Clickteam Fusion 2.5 HTML5 Runtime</title>

    <script>
        // Detection of old browsers that do not support the canvas element
        // Falls back to a default page
        if (!document.createElement("canvas").getContext)
        {
            window.open("http://www.clickteam.com/html5/html5-fallback.html", "_self");
        }
    </script>


    <!-- EXTRASOURCES -->
    <!-- Loads the Javascript code...-->
    <script src="/../../fusion/crappybird/src/Runtime.js"></script>
</head>

<body>
<div>
    <div style="position:absolute; top:0px; left:0px; -webkit-user-select: none;">
        <canvas id="MMFCanvas" width="960" height="640">
            Your browser does not support Canvas.
        </canvas>
    </div>
</div>

<script>
    // RUNTIMESTART
    // This is where the HTML5 runtime is actually started
    window.addEventListener("load", windowLoaded, false);
    function windowLoaded()
    {
        // Calls the runtime
        // First parameter : name of the canvas element
        // Second parameter : path to the cch file. Images and sounds must lay beside this file
        new Runtime("MMFCanvas", "/../../fusion/crappybird/resources/crappybird.cch");
    }
    // RUNTIMESTARTEND
</script>

</body>
</html>
