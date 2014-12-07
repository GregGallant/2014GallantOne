// Main Controller

angular.module('portCtrl', [])

    .controller('portController', function($scope, $http, Portfolio)  {

        $http.get('views/templates/content_portfolio.html').success(function(data) {
            $scope.portfolio_message = 'Portfolio Testing';
        });

        Portfolio.get()
            .success(function(data) {
                $scope.portfolio = data;
                $scope.loading = false;
            });
  
    });
