import React from 'react/addons';
import { createStore } from 'redux';
import { connect } from 'react-redux';
import { receiveAPIData, updateVisibility, displayInput } from './GallantActions.jsx';

/* Header Footer */
import GallantHeader from '../Layout/GallantHeader.jsx';
import GallantFooter from '../Layout/GallantFooter.jsx';
import GoIndex from './GoIndex.jsx';

import GallantReducers from './GallantReducers.jsx';

/* Cart CRUD API Loading */
import ProductData from './ProductData.jsx';
import CartAPI from './CartAPI.jsx';

/* Crud API Stuff - To Be Lumen-ated */
//ProductData.init();
//CartAPI.getProductData();

/* GallantApp Smart Component */
export default class GallantApp extends React.Component {

    /**
     * The heart and soul, well, so dramatic... the components... of our redux app
     **/
    render() {

        // Injected by the connect call
        const { dispatch, goIndexText } = this.props;

        return(
            <div>
                <GallantHeader
                    onAddInput={ text =>
                        dispatch(displayInput( text ))
                    } />
                <GoIndex indexData={ goIndexText } />
                <GallantFooter />
            </div>
        );

    }

}

GallantApp.propTypes = {
    goIndexText: React.PropTypes.string.isRequired,
    text: React.PropTypes.string.isRequired
};


var alteredstate;
/**
 * Originally select() - global state stuff
 * @param state
 * @returns {{goIndexText: *}}
 */
function mapStateToProps(state) {

    state = state.handleActionOnState;

    if (state.length > 0) {
        for (var ii=0; ii < state.length; ii=ii+1 )
        {
            if (typeof state[ii].text != "undefined")
            {
                alteredstate += "," + state[ii].text;
            }
        }
    }

    //console.log(alteredstate);
    return { goIndexText: alteredstate };

}

// no idea...
export default connect(mapStateToProps)(GallantApp);



