var linkApp = angular.module('linkApp', ['mainCtrl', 'linkService']);

/* Directives */

linkApp.directive('footer', function() {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/footer.php",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

linkApp.directive('header', function() {
    return {
        restrict: 'A',
        replace: true,
        scope: {user: '='}, // reads some type of variable
        templateUrl: "/views/templates/header.php",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

linkApp.directive('links', function() {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/links.php",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

linkApp.directive('fcontent', function() 
{
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/fcontent.html",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});


