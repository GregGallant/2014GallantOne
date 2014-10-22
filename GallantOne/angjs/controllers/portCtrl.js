// Main Controller

angular.module('portCtrl', [])

    .controller('portController', function($scope, $http, Portfolio)  {

            $scope.portfolioData = {};
            
            $scope.loading = true;

/*

            $scope.portfolioLink = function() {


            Portfolio.portfolio($scope.portfolioData)

                .success(function(data)
                {

console.log("port call: " + $scope.portfolioData);

                    Portfolio.get()
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
*/
/*
        $http.get('templates/content_portfolio.html').success(function(data) {
            $scope.portfolio_message = 'Portfolio Testing';
        });
*/
        Portfolio.get()
            .success(function(data) {
                $scope.portfolios = data;
                $scope.loading = false;
            });
  
    });




