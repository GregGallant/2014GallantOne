var React = require(['react']);

var GallantHome = React.createClass({displayName: "GallantHome",

    render: function() {
        return(
            React.createElement("div", null, 
                React.createElement(GallantHeader, null), 
                React.createElement(GallantFrontpage, null), 
                React.createElement(GallantFooter, null)
            )
        ); 
    }

});

React.render(React.createElement(GallantHome, null), document.getElementById('gApp'))
