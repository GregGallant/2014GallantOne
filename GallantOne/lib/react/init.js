require.config({
  paths: {
            react: "react-0.12.2/build/react-with-addons",
            JSXTransformer: "react-0.12.2/build/JSXTransformer",  
            jquery : "//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min",
            'react-router' : 'ReactRouter',
            'react-router-shim': 'react-router-shim'
  },
  shim : {

          'react' : {
            'exports' : 'React'
          },
          'react-router': {
                    deps:    ['react'],
                    exports: 'Router'
          }
  },

});
