var linkApp = angular.module('linkApp', ['ngRoute','mainCtrl', 'portCtrl', 'linkService']);

/* Route Provider */
linkApp.config([
   '$routeProvider', function($routeProvider)
    {
        $routeProvider.
            when( '/',
                {
                    templateUrl: '/views/templates/content_home.html',
                    controller: 'mainController'
                }
            ).
            when( '/portfolio',
                {
                    templateUrl: '/views/templates/content_portfolio.html',
                    controller: 'portController'
                }
            ).
            when( '/portScreen',
                {
                    templateUrl: '/portScreen.html',
                    controller: 'portController'
                }
            ).
            when( '/portScreen/:id',
                {
                    templateUrl: '/portScreen.html',
                    controller: 'portController'
                }
            ).
            otherwise({redirectTo:("/")})
    }
]);

/* This might be overkill -- find out */
linkApp.run(['$rootScope', '$location', function($rootScope, $location) {
    $rootScope.goto = function(path) {
      $location.path(path);
    }           
}]);    




/* Directives */
linkApp.directive('footer', function() {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/footer.html",
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
        templateUrl: "/views/templates/header.html",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

linkApp.directive('links', function() {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/links.html",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

linkApp.directive('content_home', function()
{
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/content_home.html",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
            
        }]
    }
});


/* An example of a TweenMax animation 
     // http://greensock.com/tweenmax
        */
/*
    linkApp.animation('.slide-animation', function () {
        return {
            beforeAddClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    var finishPoint = element.parent().width();
                    if(scope.direction !== 'right') {
                        finishPoint = -finishPoint;
                    }
                    TweenMax.to(element, 0.5, {left: finishPoint, onComplete: done });
                }
                else {
                    done();
                }
            },
            removeClass: function (element, className, done) {
                var scope = element.scope();

                if (className == 'ng-hide') {
                    element.removeClass('ng-hide');

                    var startPoint = element.parent().width();
                    if(scope.direction === 'right') {
                        startPoint = -startPoint;
                    }

                    TweenMax.fromTo(element, 0.5, { left: startPoint }, {left: 0, onComplete: done });
                }
                else {
                    done();
                }
            }
        };
    });
*/
//  element.bind('click', function () {
              //  element.html('You clicked me!');
            //});
