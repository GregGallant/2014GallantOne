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

/* ReactRenderVisualizer (Debugger) */
var React = require('react');
var ReactRenderVisualizer = require("react-render-visualizer");

/* Routing Now */
var Router = require('react-router');
var Link = Router.Link;
var Route = Router.Route;
var RouteHandler = Router.RouteHandler;
var DefaultRoute = Router.DefaultRoute;


/* To Hit the Target */
var Atari = React.createClass({displayName: "Atari",
    mixins: [ReactRenderVisualizer],
    render: function() {
        return(
            React.createElement("div", null, 
                React.createElement(GallantHeader, null), 
                React.createElement(GLifeCycle, null), 
                React.createElement(GallantFooter, null), 
                React.createElement(RouteHandler, null)
            )
        ); 
    }

});


/* Home */
var Home = React.createClass({displayName: "Home",
    render: function() {
        return(
            React.createElement("div", null, 
                "Default Pathing"
            )     
        );
    } 
});


/* NotFound */
var NotFound = React.createClass({displayName: "NotFound",
    render: function() {
        return (
            React.createElement("div", null, 
               "404 Not Found." 
            )
        );
    }
});


/* Duo Route */
/*
var routes = (
       <Route handler={Atari}>
           <DefaultRoute path="/" handler={Atari} />
           <Route name="atari" path="/atari" handler={Atari}/>
       </Route>
);
*/


/* Single Route */
var routes = (
       React.createElement(Route, {handler: Atari, path: "/"}, 
           React.createElement(DefaultRoute, {path: "/", handler: Atari}), 
           React.createElement(Route, {name: "atari", path: "/atari", handler: Atari})
       )
);


//var location = new TestLocation(['/atari']);
Router.run(routes,  function (Atari)  {
    React.render(React.createElement(Atari, null), document.body);
});
