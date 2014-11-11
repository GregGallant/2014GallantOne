// Port Controller

angular.module('portCtrl', ['ngRoute','ngAnimate'])

    .run(function($rootScope) {  
        $rootScope.portPos = 0;
    })

    .controller('portController', function($scope, $http, Portfolio, $rootScope, $timeout, $animate, $routeParams)  {

        $scope.portfolioData = {};
           
        $scope.loading = true;

        $scope.default_id = 1;

        $scope.portScreenId = $routeParams.id;
        
        console.log("RouteID: "+$routeParams.id);
        
        /**
         * get Total amount of Json rows
         */
        Portfolio.getTotal() 
            .success(function(data) {
                $scope.portTotal = data;
            });


        /**
         * getOnePortfolio  
         * @param id
         * get one row of json data via id
         */
        getOnePortfolio = function(id)
        {

            Portfolio.getOne(id)
                .success(function(data) {
                    $rootScope.portPos = id;
                    $rootScope.portPos = $routeParams.id;  // new
                    $scope.portfolio = data;
                });
        };
       

        /** 
         * getCompletePortfolio()
         * Get all portfolio json data 
         */
        $scope.getCompletePortfolio = function()  
        {
            Portfolio.get()
                .success(function(data) {
                    $scope.portfolios = data;
                    $scope.loading = false;
                });
        };

        /**
         * getPrevImg()
         * Get Previous Screen 
         */
        $scope.getPrevImg = function() 
        {
            if ( isNaN($routeParams.id) || $routeParams.id == 0) 
            {
                $routeParams.id = 0;
                $scope.ourID = $scope.portTotal;
            } else {
                $scope.ourID = parseInt($routeParams.id) - 1;
            }

            $scope.ourLoc = "/portScreen/"+$scope.ourID;
            $rootScope.goto($scope.ourLoc);
        };
        
        /**
         * getNextImg()
         * Get Next Screen 
         */
        $scope.getNextImg = function()
        {
            if ( isNaN($routeParams.id) || $routeParams.id == $scope.portTotal)  
            {
                $routeParams.id = 0;
                $scope.ourID = 0;
            } else {
                $scope.ourID = parseInt($routeParams.id) + 1; 
            }
            console.log("Hey There: "+$routeParams.id);
            $scope.ourLoc = "/portScreen/"+$scope.ourID;
            $rootScope.goto($scope.ourLoc);
        };


        /**
         * MAIN -- run getOnePortfolio with route param to start
         * Call default function (main method)  
         */
        getOnePortfolio($routeParams.id);


        /* Testing Archives */
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
            
            fadeIn();
            $timeout(gogo, 2000);      
            console.log("portPos: " + $rootScope.portPos);
        };
        
        var fadeIn = function() 
        {

            $scope.toggle = false; 
            $scope.letsgo = true; 

            var portScreen = angular.element( 'portScreen' );
            var finishPoint = portScreen.parent().width();
    
            portScreen.animate({
                left:"+=50"
            });

        };

    });


