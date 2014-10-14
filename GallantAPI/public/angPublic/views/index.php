<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="/foundation/css/foundation.min.css" media="screen, projection" rel="stylesheet" type="text/css" />

    <link href="/css/one.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="/css/one-media-queries.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="/css/one_portfolio.css" media="screen, projection" rel="stylesheet" type="text/css" />


    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="//code.angularjs.org/1.2.9/angular-resource.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular-route.min.js"></script> -->
    <script src="/js/mm-foundation-0.3.1.min.js"></script>

    <title>AngularMedia, by Greg</title>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="/angPublic/js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="/angPublic/js/services/linkService.js"></script> <!-- load our service -->
    <script src="/angPublic/js/app.js"></script> <!-- load our application -->

</head>
<body class="container" ng-app="linkApp" ng-controller="mainController">
    <img alt="full screen background image" src="/images/one/gg_sunset.png" id="full-screen-background-image" />
    <div id="pagewrap">
        <header id="header">
            <div class="goHeader">
                <a href="/"><img id="goLogo" alt="GallantOne.com" border="0" src="/images/one/one_logo.png" /></a>
            </div>
            <!-- Menu goes here -->
            <div class="goLine"></div>
            <div class="authMenu">
                <!-- <div class="loginPlacement"><a class="loginPlacement" href="/login">login</a> / <a class="loginPlacement" href="/register">register</a></div> -->
            </div>
        </header>
        <!-- Content goes here... -->
        <div fcontent></div>
            <!-- end content -->
        </div>
    </div> 
</body>

</html>
