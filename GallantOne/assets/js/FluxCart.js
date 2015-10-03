var React = require('react');
var FluxCartActions = require('./FluxCartActions');

var FluxCart = React.createClass({displayName: "FluxCart",


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
            React.createElement("div", {className: "flux-cart" + (this.props.visible ? 'active' : '')}, 
                React.createElement("div", {className: "mini-cart"}, 
                    React.createElement("button", {type: "button", className: "close-cart", onClick: this.closeCart}, "x"), 
                    React.createElement("ul", null, 
                        Object.keys(products).map(function(product) {

                            return (
                                React.createElement("li", {key: product}, 
                                    React.createElement("h3", null, products[product].name), 
                                    React.createElement("h5", null, products[product].type, " x ", products[product].quantity), 
                                    React.createElement("h5", null, "$", (products[product].price * products[product].quantity).toFixed(2)), 
                                    React.createElement("button", {type: "button", className: "remove-item", onClick: self.removeFromCart.bind(self,product)}, "Remove")
                                )
                            )

                        })
                    ), 
                    React.createElement("span", null, "Total: $", this.props.total)
                ), 
                React.createElement("button", {type: "button", className: "view-cart", onClick: this.openCart, disabled: Object.keys(this.props.products).length > 0 ? "" : "disabled"}, "View Cart (", this.props.count, ")")
            )
        );
    }

});

module.exports = FluxCart;
