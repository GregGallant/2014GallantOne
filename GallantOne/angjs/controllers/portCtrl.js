// Main Controller

angular.module('portCtrl', [])

    .run(function($rootScope) {  
        $rootScope.portPos = 0;
    })
    

    .controller('portController', function($scope, $http, Portfolio, $rootScope)  {

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
        };

        $scope.getNext = function() 
        {
            $scope.id = parseInt($rootScope.portPos) + 1;
          
            if ( parseInt($scope.id) > (parseInt($scope.portTotal) - 1) ) 
            {
                $scope.id = 0;
            }

            $rootScope.portPos = parseInt($scope.id);

            Portfolio.getOne($scope.id)
                .success(function(data) {
                    $scope.portfolio = data;
                });
            
            console.log("portPos: " + $rootScope.portPos);
        };

    });


