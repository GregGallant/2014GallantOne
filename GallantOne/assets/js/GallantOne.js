/**
 * @jsx React.DOM
 *
 *  ==== React Life Cycle ====
 *  http://javascript.tutorialhorizon.com/2014/09/13/execution-sequence-of-a-react-components-lifecycle-methods/
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


/** 
 * Atari means To Hit the Target  - I'm so original... 
 * Need to know wtf I'm doing and what I'm able to utilize, so, 
 * putting in all methods related to the lifecycle here whether used or not...
 **/
var Atari = React.createClass({displayName: "Atari",

    // The object returned by this method sets the initial value of this.state
    getInititalState: function() {
        return {};
    },

    // The object returned by this method sets the initial value of this.props
    // If a "complex object"(?) is returned, it is shared among all component instances
    getDefaultProps: function() {
        return {};
    },

    // An array of objects that can augment the lifecycle methods
    mixins: [ReactRenderVisualizer],

    /**
     * The heart and soul, well, so dramatic... the components... of our app
     *
     **/
    render: function() {
        return(
            React.createElement("div", null, 
                React.createElement(GallantHeader, null), 
                React.createElement(GoIndex, null), 
                React.createElement(GallantFooter, null)
            )
        ); 
    },

    statics: function() {
    },

    // Lifecycle Methods

    // Invoked once before render
    componentWillMount: function() {
        // Calling setState here does not call a re-render,
    },

    // Invoked once after first render
    componentDidMount: function() {
        // You now have access to this.getDOMNode()
    },

    // Invoked whenever there is a prop change
    // Called BEFORE render
    componentWillReceiveProps: function(nextProps) {
        // Not called for the initial render
        // Previous Props can be accessed by this.props
        // Calling setState here does not trigger an additional re-render,
    },

    // Determines if the render method should run in the subsequent steap
    // Called BEFORE a render
    // Not called for the initial render
    shouldComponentUpdate: function(nextProps, nextState) {
        // If you want the render method to execute in the next step return true, otherwise return false
    },

    // Called IMMEDIATELY BEFORE a render
    componentWillUpdate: function(nextProps, nextState) {
        // You cannot use this.setState() in this method
    },

    // called IMMEDIATELY AFTER a render
    componentDidUpdate: function(prevProps, prevState) {
    },

    // called IMMEDIATELY before a component is unmounted
    componentWillUnmount: function() {
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
