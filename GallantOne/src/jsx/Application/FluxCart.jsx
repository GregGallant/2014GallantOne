import React from 'react/addons';
import FluxCartActions from './FluxCartActions.jsx';

class FluxCart extends React.Component {

    constructor(props) {
        super(props);
        this.removeFromCart = this.removeFromCart.bind(this);
        this.closeCart = this.closeCart.bind(this);
        this.openCart = this.openCart.bind(this);
    }

    closeCart() {
        FluxCartActions.updateCartVisible(false);
    }

    openCart() {
        FluxCartActions.updateCartVisible(true);
    }

    removeFromCart(sku) {
        FluxCartActions.removeFromCart(sku);
        FluxCartActions.updateCartVisible(false);
    }

    render() {
        var products = this.props.products;
        return (
            <div className={"flux-cart" + (this.props.visible ? 'active' : '')}>
                <div className="mini-cart">
                    <button type="button" className="close-cart" onClick={this.closeCart}>x</button>
                    <ul>
                        {Object.keys(products).map(function(product) {

                            return (
                                <li key={product}>
                                    <h3>{products[product].name}</h3>
                                    <h5>{products[product].type} x {products[product].quantity}</h5>
                                    <h5>${(products[product].price * products[product].quantity).toFixed(2)}</h5>
                                    <button type="button" className="remove-item">Remove</button>
                                </li>
                            )

                        })}
                    </ul>
                    <span>Total: ${this.props.total}</span>
                </div>
                <button type="button" className="view-cart" onClick={this.openCart} disabled={Object.keys(this.props.products).length > 0 ? "" : "disabled"}>View Cart ({this.props.count})</button>
            </div>
        );
    }

}

export default FluxCart;
