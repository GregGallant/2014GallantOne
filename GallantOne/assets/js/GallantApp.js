/**
 *  ==== React Life Cycle ====
 *
 * getInitialState:  
 * componentWillMount:
 * componentDidMount:
 * componentWillReceiveProps:
 * componentWillUnmount:
 * render:
 */

var GallantApp = React.createClass({displayName: "GallantApp",
    render: function() {
        return(
            React.createElement("div", null, 
                React.createElement(GallantHeader, null), 
                React.createElement(GallantContent, null), 
                React.createElement(GallantFooter, null)
            )
        ); 
    }

});

React.render(React.createElement(GallantApp, null), document.body)
