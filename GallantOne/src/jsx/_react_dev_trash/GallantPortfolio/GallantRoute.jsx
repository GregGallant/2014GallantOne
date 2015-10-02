var React = require(['react']);

var Router = require(['react-router']);

var Route = Router.Route;
var RouteHandler = Router.RouteHandler;
var DefaultRoute = Router.DefaultRoute;

var routes = (
 <Route handler={GallantApp} path="/studio">
     <DefaultRoute handler={Home} />
     <Route name="studio" handler={Studio} />
 </Route>
);



Router.run(routes, function (Handler) {
      React.render(<Handler/>, document.body);
});

