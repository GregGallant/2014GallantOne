var React = require(['react']);

var Router = require(['react-router']);

var Route = Router.Route;
var RouteHandler = Router.RouteHandler;
var DefaultRoute = Router.DefaultRoute;

var routes = (
 React.createElement(Route, {handler: GallantApp, path: "/studio"}, 
     React.createElement(DefaultRoute, {handler: Home}), 
     React.createElement(Route, {name: "studio", handler: Studio})
 )
);



Router.run(routes, function (Handler) {
      React.render(React.createElement(Handler, null), document.body);
});
