// Main Controller

angular.module('mainCtrl', [])

    .controller('mainController', function($scope, $http, Link)  {
      
        $scope.linkData = {};
       
        $scope.loading = true;
/*
        Link.get()
            .success(function(data) {
                $scope.links = data;
                $scope.loading = false; 
            });

*/
        /* Save Link */

        $scope.submitLink = function() {

            $scope.loading = true;
        

            Link.save($scope.linkData) 

                .success(function(data) 
                {

                    Link.get()
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


        /* Delete Link */

        $scope.deleteLink = function(id) 
        {
            $scope.loading = true;
            
            Link.destroy(id) 

                .success(function(data) {


                    Link.get()
                        .success(function(getData)  
                        {

                            $scope.links = getData;
                            $scope.loading = false;                    
                        });

                });
        };

  
    });
