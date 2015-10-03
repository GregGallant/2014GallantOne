
//var FluxCartActions = require('./FluxCartActions');

import FluxCartActions from './FluxCartActions.jsx';

var fluxProductData = {

   getProductData: function() {

       var data = JSON.parse(localStorage.getItem('product'));
       FluxCartActions.receiveProduct(data);

   }

};

export default fluxProductData;
