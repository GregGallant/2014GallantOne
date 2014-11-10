// Angular Service modules

angular.module('animService', [])

    .factory('Portfolio', function($http) {
        
        return {
            // get links
            get : function() 
            {
                console.log("The Get");
                return $http.get('http://api.gallantone.com/portfolio'); // Call portfolio data as api call (code it)

            },
            getOne : function(id) 
            {
                if (id == null) 
                {
                    id = 0; // This is not id but position
                }
                return $http.get('http://api.gallantone.com/portfolio/'+id); // Call One as api call (code it)
            },
            getTotal : function()
            {
                return $http.get('http://api.gallantone.com/portfolioTotal'); // Call One as api call (code it)
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


