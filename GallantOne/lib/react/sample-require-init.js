require.config({

  paths: {
            react: "/lib/react/react-with-addons",
            JSXTransformer: "/resources/bower_components/jsx-requirejs-plugin/js/JSXTransformer",
            jsx: "/resources/bower_components/jsx-requirejs-plugin/js/jsx",
            jquery : "/resources/bower_components/jquery/dist/jquery",
            'react-router' : "/resources/bower_components/react-router/dist/react-router",
            'react-router-shim': 'react-router-shim'
  },
  shim : {

          'react-router': {
                    deps:    ['react'],
                    exports: 'Router'
           }
  },


});


require(['jsx!testapp'], function(App){

      var app = new App();
        app.init();

});
