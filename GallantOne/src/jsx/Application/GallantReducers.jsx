/* Data store via redux-reducer */
import 'babel-core/polyfill'; // Object.assign
import { combineReducers } from 'redux';
import { COMPLEX_DATA_TYPE, PORTFOLIO_DATA, DISPLAY_INPUT, SELECT_PRODUCT, CART_ADD, CART_REMOVE, SET_VISIBLE  } from './GallantActions.jsx';


var client_id = 0;
var ourData = '';
var portState = '';

export function incrementClientId() {

    client_id = client_id + 1;
    return client_id;
}

export function decrementClientId() {

    client_id = client_id - 1;
    if (client_id < 0) {
        client_id = 0;
    }
    return client_id;
}

export function getClientId() {
    return client_id;
}

export function resetClientId() {
    client_id = 0;
    return client_id;
}

export function getPortState() {
    return portState;
}

export function setPortState(data) {
    portState = data;
}


/**
 * Use state=initialState if exists...
 * @param state
 * @param action
 * @returns {Array}
 */
function handleActionOnState( state=[], action ) {

    // Making generic
    //getPortfolioData();

    return state;

    switch(action.type) {
        case DISPLAY_INPUT:

            return Object.assign({}, state, {text: action.text});
        case PORTFOLIO_DATA: // Completed task in example
            var incrementedClientId = state.client_id + 1;
            return Object.assign({}, state, {portdata:incrementedClientId});

        case COMPLEX_DATA_TYPE: // Completed task in example

            return [...state.slice(0, action.input),
                Object.assign({}, state[action.input], {
                    completed: true
                }),
                ...state.slice(action.input + 1)
                ];
        default:
            return state;
    }
}

/* Set the Reducer functions you're using and export */
const GallantReducers = combineReducers({
    handleActionOnState
});

export default GallantReducers;

