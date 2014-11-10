// Main Controller

angular.module('animCtrl', ['ngAnimate'])

    .controller('animController', function($scope, $http, Portfolio)  {
      
        $scope.linkData = {};
       
        $scope.loading = true;



/*
        Portfolio.get()
            .success(function(data) {
                $scope.links = data;
                $scope.loading = false; 
            });
*/


        /* Portfolio Portfolio */

        $scope.portfolioLink = function() {

            $scope.loading = true;


            Portfolio.portfolio($scope.portfolioData)

                .success(function(data)
                {

                    Portfolio.get(id)
                        .success(function(getData)
                        {
                            $scope.portfolios = getData;
                            $scope.loading = false;
                        });

                })
                .error(function(data) {
                    console.log(data);
                });
        };



        /* Save Portfolio */

        $scope.submitPortfolio = function() {

            $scope.loading = true;
        

            Portfolio.save($scope.linkData) 

                .success(function(data) 
                {

                    Portfolio.get()
                        .success(function(getData) 
                        {
                            $scope.links = getData;
                            $scope.loading = false;
                        });     

                })
                .error(function(data) {
                    console.log(data);
                });
        };


        /* Delete Portfolio */

        $scope.deletePortfolio = function(id) 
        {
            $scope.loading = true;
            
            Portfolio.destroy(id) 

                .success(function(data) {


                    Portfolio.get()
                        .success(function(getData)  
                        {

                            $scope.links = getData;
                            $scope.loading = false;                    
                        });

                });
        };

  
    });
