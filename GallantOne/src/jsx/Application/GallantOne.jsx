/* ReactRenderVisualizer (Debugger) */
//var React = require('react/addons');

import React from 'react/addons'

/* Header Footer */
import GallantHeader from '../Layout/GallantHeader.jsx';
import GallantFooter from '../Layout/GallantFooter.jsx';
import GoIndex from './GoIndex.jsx';


/* Cart CRUD API Loading */
import ProductData from './ProductData.jsx';
import CartAPI from './CartAPI.jsx';

import CartStore from './CartStore.jsx';
import ProductStore from './ProductStore.jsx';

import FluxCart from './FluxCart.jsx';
import FluxProduct from './FluxProduct.jsx';

const propTypes = {
    product: ProductStore.getProduct(),
    selectedProduct: ProductStore.getSelected(),
    cartItems: CartStore.getCartItems(),
    cartCount: CartStore.getCartCount(),
    cartTotal: CartStore.getCartTotal(),
    cartVisible: CartStore.getCartVisible()
};

/* Crud API Stuff - To Be Lumen-ated */
ProductData.init();
CartAPI.getProductData();

class GallantOne extends React.Component {


    // The object returned by this method sets the initial value of this.state
    // Constructor
    constructor(props) {
        super(props);
        this._onChange = this._onChange.bind(this);
        this.getCartState = this.getCartState.bind(this);
        this.state = this.getCartState();
    }

    getCartState() {
        return {
            product: ProductStore.getProduct(),
            selectedProduct: ProductStore.getSelected(),
            cartItems: CartStore.getCartItems(),
            cartCount: CartStore.getCartCount(),
            cartTotal: CartStore.getCartTotal(),
            cartVisible: CartStore.getCartVisible()
        };
    }

    // An array of objects that can augment the lifecycle methods
    //mixins: [ReactRenderVisualizer],

    /**
     * The heart and soul, well, so dramatic... the components... of our app
     **/
    render() {
        return(
            <div>
                <GallantHeader />
                <FluxCart products={this.state.cartItems} count={this.state.cartCount} total={this.state.cartTotal} visible={this.state.cartVisible} />
                <FluxProduct product={this.state.product} cartitems={this.state.cartItems} selected={this.state.selectedProduct} />
                <GoIndex />
                <GallantFooter />
            </div>
        ); 

    }

    // Invoked once after first render
    componentDidMount() {
        // You now have access to this.getDOMNode()
        ProductStore.addChangeListener(this._onChange);
        CartStore.addChangeListener(this._onChange);
    }

    // called IMMEDIATELY before a component is unmounted
    componentWillUnmount() {
        ProductStore.removeChangeListener(this._onChange);
        CartStore.removeChangeListener(this._onChange);
    }

    _onChange() {
        this.setState(this.getCartState());
    }


}

export default GallantOne;

React.render(<GallantOne/>, document.body);

