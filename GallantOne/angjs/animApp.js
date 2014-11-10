var animApp = angular.module('animApp', ['ngRoute','animCtrl', 'animService', 'ngAnimate']);

/* Route Provider */
animApp.config([
   '$routeProvider', function($routeProvider)
    {
        $routeProvider.
            when( '/',
                {
                    templateUrl: '/templates/screenheader.html'
                }
            ).
            when( '/portfolio',
                {
                    templateUrl: '/views/templates/content_portfolio.html'
                }
            ).
            when( '/imageOne',
                {
                    templateUrl: 'image1.html'
                }
            ).
            when( '/imageTwo',
                {
                    templateUrl: 'image2.html'
                }
            ).
            otherwise({redirectTo:("/")})
    }
]);

animApp.run(['$rootScope', '$location', function($rootScope, $location) {
    $rootScope.goto = function(path) {
      $location.path(path);
    }
}]);


/* Directives */
animApp.directive('footer', function() {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/footer.html",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

animApp.directive('header', function() {
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

animApp.directive('links', function() {
    return {
        restrict: 'A',
        replace: true,
        templateUrl: "/views/templates/links.html",
        controller: ['$scope', '$filter', function($scope, $filter) {
            // Behavior goes here
        }]
    }
});

animApp.directive('content_home', function()
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
