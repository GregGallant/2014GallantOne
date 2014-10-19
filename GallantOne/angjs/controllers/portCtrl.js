// Main Controller

angular.module('portCtrl', [])

    .controller('portController', function($scope, $http)  {

        $http.get('/portfolio.html').success(function(data) {
            $scope.portfolio_message = 'Portfolio Testing';
        });

  
    });
