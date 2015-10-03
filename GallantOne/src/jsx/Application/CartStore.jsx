
import AppDispatcher from './AppDispatcher.jsx';
import EventEmitter from 'events';
import FluxCartConstants from './FluxCartConstants.jsx';

//var _ = require('underscore');
import _ from 'underscore';

var _products = {}, _cartVisible = false;

function add(sku, update) {
    update.quantity = sku in _products ? _products[sku].quantity + 1 : 1;
    _products[sku] = _.extend({}, _products[sku], update);
}

function setCartVisible(cartVisible) {
    _cartVisible = cartVisible;
}

function removeItem(sku) {
    delete _products[sku];
}

var CartStore = _.extend({}, EventEmitter.prototype, {

    getCartItems: function() {
       return _products;
    },

    getCartCount: function() {
        return Object.keys(_products).length;
    },

    getCartTotal: function() {
        var total = 0;
        for(var product in _products) {
            if(_products.hasOwnProperty(product)) {
                total += _products[product].price * _products[product].quantity;
            }
        }
    },

    getCartVisible: function() {
        return _cartVisible;
    },

    emitChange: function() {
       this.emit('change');
    },

    addChangeListener: function(callback) {
        this.on('change', callback);
    },

    removeChangeListener: function(callback) {
        this.removeListener('change', callback);
    }

});

AppDispatcher.register(function(payload) {

    var action = payload.action;
    var text;

    switch(action.actionType) {
        case FluxCartConstants.CART_ADD:
            add(action.sku, action.update);
            break;

        case FluxCartConstants.CART_VISIBLE:
            setCartVisible(action.CartVisible);
            break;

        case FluxCartConstants.CART_REMOVE:
            removeItem(action.sku);
            break;

        default:
            return true;
    }


    CartStore.emitChange();

    return true;

});

export default CartStore;