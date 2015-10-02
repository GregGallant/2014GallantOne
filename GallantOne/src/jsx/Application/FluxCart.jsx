var React = require('react');
var FluxCartActions = require('./FluxCartActions');

var FluxCart = React.createClass({


    closeCart: function() {
        FluxCartActions.updateCartVisible(false);
    },

    openCart: function() {
        FluxCartActions.updateCartVisible(true);
    },

    removeFromCart: function(sku) {
        FluxCartActions.removeFromCart(sku);
        FluxCartActions.updateCartVisible(false);
    },

    render: function() {
        var self = this, products = this.props.products;
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
                                    <button type="button" className="remove-item" onClick={self.removeFromCart.bind(self,product)}>Remove</button>
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

});

module.exports = FluxCart;