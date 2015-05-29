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
var Atari = React.createClass({
    mixins: [ReactRenderVisualizer],
    render: function() {
        return(
            <div>
                <GallantHeader />
                <GLifeCycle />
                <GallantFooter />
                <RouteHandler />
            </div>
        ); 
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


