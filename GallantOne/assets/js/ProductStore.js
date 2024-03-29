var AppDispatcher = require('./AppDispatcher');
var EventEmitter = require('events').EventEmitter;
var FluxCartConstants = require('./FluxCartConstants');
var _ = require('underscore');

var _product = {}, _selected = null;

function loadProductData(data) {
    _product = data[0];
    _selected = data[0].variants[0];
}

function setSelected(index) {
    _selected = _product.variants[index];
}

// Extend ProductStore with EventEmitter to add eventing capabilities

var ProductStore = _.extend({}, EventEmitter.prototype, {


    getProduct: function () {
        return _product;
    },

    getSelected: function() {
        return _selected;
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


// Register callback with AppDispatcher

AppDispatcher.register(function(payload) {

    var action = payload.action;
    var text;

    switch(action.actionType) {
        case FluxCartConstants.RECEIVE_DATA:
            loadProductData(action.data);
            break;

        case FluxCartConstants.SELECT_PRODUCT:
            setSelected(action.data);
            break;

        default:
            return true;
    }

    ProductStore.emitChange();

    return true;

});

module.exports = ProductStore;
