// Angular Service modules

angular.module('linkService', [])


    .factory('Portfolio', function($http) {
        
        return {
            // get links
            get : function() 
            {
                return $http.get('http://api.gallantone.com/portfolio'); // Call links as api call (code it)
            },
/*
            portfolio : function() 
            {
                return $http({
                    method: 'GET',
                    url: '/portfolio', 
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(id)
                });
            },
*/
            save : function(linkData) 
            {
                return $http({
                    method: 'POST',
                    url: '/linkstore', 
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(linkData)
                });
            },

            destroy : function(id) 
            {

                return $http({
                    method: 'POST',
                    url: '/linkdelete/'+id,
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                    data: $.param(id)
                });

            }

        }
    });


