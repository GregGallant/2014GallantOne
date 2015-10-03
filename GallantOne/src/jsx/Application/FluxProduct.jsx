import React from 'react/addons';
import FluxCartActions from './FluxCartActions.jsx';

import CartStore from './CartStore.jsx';
import ProductStore from './ProductStore.jsx';


class FluxProduct extends React.Component {

    constructor(props) {
        super(props);
        this.addToCart = this.addToCart.bind(this);
    }

    addToCart(event) {
        var sku = this.props.selected.sku;
        var update = {
            name: this.props.product.name,
            type: this.props.selected.type,
            price: this.props.selected.price
        };
        FluxCartActions.addToCart(sku, update);
        FluxCartActions.updateCartVisible(true);
    }
    //selectVariant: function(event) {
    selectVariant(event) {
        FluxCartActions.selectProduct(event.target.value);
    }

    //render: function() {
    render() {
        var ats = (this.props.selected.sku in this.props.cartitems) ?
            this.props.selected.inventory - this.props.cartitems[this.props.selected.sku].quantity :
            this.props.selected.inventory;

        return (

            <div className="flux-product">
                <img src={'assets/images/' + this.props.product.image} />
                <div className="flux-product-detail">
                    <h4>{this.props.product.name}</h4>
                    <h5>{this.props.product.description}</h5>
                    <h6>{this.props.selected.price}</h6>
                    <select onChange={this.selectVariant}>
                        {this.props.product.variants.map(function(variant, index) {
                            return (
                                <option key={index} value={index}>{variant.type}</option>
                            )
                        })}
                    </select>
                    <button type="button" onClick={this.addToCart} disabled={ats > 0 ? '' : 'disabled'}>
                        {ats > 0 ? 'Add To Cart' : 'Sold Out'}
                    </button>
                </div>
            </div>

        );
    }

}

export default FluxProduct;
