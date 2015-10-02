/**
 * @jsx React.DOM
 *
 *  ==== React Life Cycle ====
 *  http://javascript.tutorialhorizon.com/2014/09/13/execution-sequence-of-a-react-components-lifecycle-methods/
 */

/* ReactRenderVisualizer (Debugger) */
var React = require('react/addons');
var ReactRenderVisualizer = require("react-render-visualizer");

/* Routing Now */
var Router = require('react-router');
//var Link = Router.Link;
//var Route = Router.Route;
//var RouteHandler = Router.RouteHandler;
//var DefaultRoute = Router.DefaultRoute;


/* Cart CRUD API Loading */
var ProductData = require('./ProductData');
var CartAPI = require('./CartAPI');


var CartStore = require('./CartStore');
var ProductStore = require('./ProductStore');

var FluxProduct = require('./FluxProduct');
var FluxCart = require('./FluxCart');


/* Crud API Stuff - To Be Lumen-ated */
ProductData.init();
CartAPI.getProductData();

function getCartState() {
    return {
        product: ProductStore.getProduct(),
        selectedProduct: ProductStore.getSelected(),
        cartItems: CartStore.getCartItems(),
        cartCount: CartStore.getCartCount(),
        cartTotal: CartStore.getCartTotal(),
        cartVisible: CartStore.getCartVisible()
    };
}
/* Transitions */
//var ReactCSSTransitionGroup = React.addons.CSSTransitionGroup; // Commenting out for now, may have to declare in class dec.



/** 
 * Need to know wtf I'm doing and what I'm able to utilize, so, 
 * putting in all methods related to the lifecycle here whether used or not...
 **/
var GallantOne = React.createClass({

    // The object returned by this method sets the initial value of this.state
    getInitialState: function() {
        return getCartState();
    },

    // An array of objects that can augment the lifecycle methods
    //mixins: [ReactRenderVisualizer],

    /**
     * The heart and soul, well, so dramatic... the components... of our app
     **/
    render: function() {
        return(
            <div>
                <GallantHeader />
                <FluxCart products={this.state.cartItems} count={this.state.cartCount} total={this.state.cartTotal} visible={this.state.cartVisible} />
                <FluxProduct product={this.state.product} cartitems={this.state.cartItems} selected={this.state.selectedProduct} />
                <GoIndex />
                <GallantFooter />
            </div>
        ); 

    },

    // Invoked once after first render
    componentDidMount: function() {
        // You now have access to this.getDOMNode()
        ProductStore.addChangeListener(this._onChange);
        CartStore.addChangeListener(this._onChange);
    },

    // called IMMEDIATELY before a component is unmounted
    componentWillUnmount: function() {
        ProductStore.removeChangeListener(this._onChange);
        CartStore.removeChangeListener(this._onChange);
    },

    _onChange: function() {
        this.setState(getCartState());
    }


});

React.render(<GallantOne/>, document.body);


/* Single Route */
/*
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
*/

/*
render: function() {
   var items = this.state.items.map(function(item, i) {
         return (
            <div key={item} onClick={this.handleRemove.bind(this, i)}>
             {item}
            </div>
         );
   }.bind(this));
   return (
   <div>
       <button onClick={this.handleAdd}>Add Item</button>
               <ReactCSSTransitionGroup transitionName="example">
                         {items}
               </ReactCSSTransitionGroup>
   </div>
   );

*/
