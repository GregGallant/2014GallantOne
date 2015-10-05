
import FluxCartActions from './GallantActions.jsx';

var fluxProductData = {

   getProductData: function() {

       var data = JSON.parse(localStorage.getItem('product'));
       FluxCartActions.receiveProduct(data);

   }

};

export default fluxProductData;
