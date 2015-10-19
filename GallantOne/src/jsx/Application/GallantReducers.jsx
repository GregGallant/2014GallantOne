/* Data store via redux-reducer */
import 'babel-core/polyfill'; // Object.assign
import { combineReducers } from 'redux';
import { RECEIVE_DATA, DISPLAY_INPUT, SELECT_PRODUCT, CART_ADD, CART_REMOVE, SET_VISIBLE  } from './GallantActions.jsx';


/*
const initialState = {
    text: "Ffs"
};
*/


/**
 * Use state=initialState if exists...
 * @param state
 * @param action
 * @returns {Array}
 */
function handleActionOnState( state=[], action ) {
    switch(action.type) {
        case DISPLAY_INPUT:
            console.log('State returned from reducer');
            console.log(Object.assign({}, state, {text: action.text}));
            return Object.assign({}, state, {text: action.text});
        case RECEIVE_DATA: // Completed task in example
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

