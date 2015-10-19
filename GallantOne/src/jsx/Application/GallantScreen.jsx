import React from 'react';
import ReactDOM from 'react-dom';

import { createStore } from 'redux';
import { connect } from 'react-redux';
import { receiveAPIData, displayInput } from './GallantActions.jsx';

/* Header Footer */
import GallantHeaderBasic from '../Layout/GallantHeaderBasic.jsx';
import GallantFooter from '../Layout/GallantFooter.jsx';
import GoScreen from './GoScreen.jsx';

import GallantReducers from './GallantReducers.jsx';

/* GallantScreen Smart Component */
export default class GallantScreen extends React.Component {

    /**
     * The heart and soul, well, so dramatic... the components... of our redux app
     **/
    render() {

        // Injected by the connect call
        const { dispatch, goIndexText } = this.props;

        return(
            <div>
                <div className="goHeader">
                 <GallantHeaderBasic
                    onAddInput={ text =>
                        dispatch(displayInput( text ))
                    } />
                </div>
                <GoScreen indexData={ goIndexText } />
                <GallantFooter />
            </div>
        );

    }

}

GallantScreen.propTypes = {
    goIndexText: React.PropTypes.string.isRequired,
    text: React.PropTypes.string.isRequired
};

/**
 * Originally select() - global state stuff
 * This is a problematic area that needs fixing.
 * TODO: Remove handleActionOnState from state.
 * @param state
 * @returns {{goIndexText: *}}
 */
function mapStateToProps(state)
{
    // Sort of want a way to not have the reducer method name as a key, although this might make sense as this is a way to know which state belongs to which method combined by the combinereducer() method.
    //state = state.handleActionOnState;

    return { goIndexText: state.handleActionOnState.text };
}

// Maybe use a decorator instead, but for now...
export default connect(mapStateToProps)(GallantScreen);



