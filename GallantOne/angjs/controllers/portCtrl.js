// Port Controller

angular.module('portCtrl', ['ngAnimate'])

    .run(function($rootScope) {  
        $rootScope.portPos = 0;
    })

    .controller('portController', function($scope, $http, Portfolio, $rootScope, $timeout, $animate)  {

        $scope.portfolioData = {};
           
        $scope.loading = true;

        $scope.default_id = 1;

        Portfolio.getTotal() 
            .success(function(data) {
                $scope.portTotal = data;
            });

        getOnePortfolio = function(id)
        {

            Portfolio.getOne(id)
                .success(function(data) {
                    $rootScope.portPos = id;
                    $scope.portfolio = data;
                });
        };
       
        /* Call default function (main method)  */
        getOnePortfolio(0);

        $scope.getCompletePortfolio = function()  
        {
            Portfolio.get()
                .success(function(data) {
                    $scope.portfolios = data;
                    $scope.loading = false;
                });
        };

        $scope.getPrev = function() 
        {

            $scope.id = parseInt($rootScope.portPos) - 1;

            if (parseInt($scope.id) < 0) {
                $scope.id = parseInt($scope.portTotal) - 1;
            }

            $rootScope.portPos = parseInt($scope.id);

            Portfolio.getOne($scope.id)
                .success(function(data) {
                    $scope.portfolio = data;
                });

            console.log("portPos: " + $rootScope.portPos);
            $timeout(fadeIn, 200);
            //$timeout(fadeIn, 1000);
            //$scope.on = !$scope.on;
        };

        var gogo = function() {
            Portfolio.getOne($scope.id)
                .success(function(data) {
                    $scope.portfolio = data;
                });
        };

        $scope.getNext = function() 
        {
            $scope.id = parseInt($rootScope.portPos) + 1;
          
            if ( parseInt($scope.id) > (parseInt($scope.portTotal) - 1) ) 
            {
                $scope.id = 0;
            }

            $rootScope.portPos = parseInt($scope.id);
            
            //$timeout(fadeIn, 200);

/*
            Portfolio.getOne($scope.id)
                .success(function(data) {
                    $scope.portfolio = data;
                });
 */
            fadeIn();
            //$interval(fadeIn, 1000); // pretty neat interval
            $timeout(gogo, 2000);      
/*   
            Portfolio.getOne($scope.id)
                .success(function(data) {
                    $scope.portfolio = data;
                });
 */           
            console.log("portPos: " + $rootScope.portPos);
            //$timeout(fadeIn, 1000);
            //$scope.on = !$scope.on;
        };
        
        var fadeIn = function() 
        {

  //          var fuckyou = by.id('portScreen');
   //         console.log(fuckyou); 

           // $scope.toggle = !$scope.toggle;
            //$scope.toggle = true; 
            //$scope.letsgo = false; 
            $scope.toggle = false; 
            $scope.letsgo = true; 
            //var portScreen = angular.element( $('#portScreen')  );  
            //var portScreen = angular.element( by.id('portScreen') );
            var portScreen = angular.element( 'portScreen' );
            //var portScreen2 = $('#portScreen');
            var finishPoint = portScreen.parent().width();
    
            console.log("Everyone in the bay area can suck my dick.");    
            console.log(portScreen);
            //console.log(portScreen2);
/* 
            $('#portScreen').animate({
                left:"+=50"
            });
 */           
            portScreen.animate({
                left:"+=50"
            });

            /* 
            portScreen.animate({
                left:"+=50"
            });
            */
            
            //TweenMax.to(element, 0.5, {left: -element.parent().width(), onComplete: done });
            //TweenMax.to(portScreen, 0.5, {left: finishPoint, onComplete: done }); 
            //TweenMax.to(portScreen, 0.5, {left: -portScreen.parent().width() });
//animate();
            //TweenMax.set(portScreen, { left: portScreen.parent().width() });
            //TweenMax.to(portScreen, 0.5, {left: 1000 }); 
        };

    });


