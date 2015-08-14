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
var Atari = React.createClass({

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
            <div>
                <GallantHeader />
                <GoIndex />
                <GallantFooter />
                <RouteHandler /> 
            </div>
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
var Home = React.createClass({
    render: function() {
        return(
            <div>
                Default Pathing
            </div>     
        );
    } 
});


/* NotFound */
var NotFound = React.createClass({
    render: function() {
        return (
            <div>
               404 Not Found. 
            </div>
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
       <Route handler={Atari} path="/">
           <DefaultRoute path="/" handler={Atari} />
           <Route name="atari" path="/atari" handler={Atari}/>
       </Route>
);
//var location = new TestLocation(['/atari']);
Router.run(routes,  function (Atari)  {
    React.render(<Atari/>, document.body);
});
