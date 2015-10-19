/* Data store via redux-reducer */
import 'babel-core/polyfill'; // Object.assign
import { combineReducers } from 'redux';
import { COMPLEX_DATA_TYPE, PORTFOLIO_DATA, DISPLAY_INPUT, SELECT_PRODUCT, CART_ADD, CART_REMOVE, SET_VISIBLE  } from './GallantActions.jsx';


var client_id = 1;
var ourData = '';
var portState = '';

export function incrementClientId() {

    client_id = client_id + 1;
    return client_id;
}


export function getClientId() {
    return client_id;
}

export function getPortState() {
    return portState;
}

export function setPortState(data) {
    portState = data;
}

export function getPortfolioData() {

    var port_data;

    $.ajax({
        cache : false,
        type: 'GET',
        crossDomain:true,
        url: 'http://api.gallantone.local/portfolio/'+client_id,
        data: port_data,
        contentType:"application/jsonp",
        success: function(data){
            console.log("Attempting to load API data");
            console.log(data);

            ourData = data;
            portState = data;

            //console.log("WTF");
            //console.log(wtf);
        },
        error: function(data){
            console.log("ERROR RESPONSE FROM api.gallantone.local SERVER : "+JSON.stringify(data));
        },
        complete: function(data){
            console.log("api port call completed");
        }
    });


}

/**
 * Use state=initialState if exists...
 * @param state
 * @param action
 * @returns {Array}
 */
function handleActionOnState( state=[], action ) {
    getPortfolioData();

    return ourData;

    console.log("HandleActionOnState somehow called");
    console.log(state);
    console.log(action);

    switch(action.type) {
        case DISPLAY_INPUT:
           /* console.log('State returned from reducer');
            console.log(Object.assign({}, state, {

                text: action.text

                }));
                */

            console.log("WHERES STATE:L ");
            console.log(state);
            return Object.assign({}, state, {text: action.text});
        case PORTFOLIO_DATA: // Completed task in example
            console.log('portdata reducer hit');
            var incrementedClientId = state.client_id + 1;
            //var mydata = recieveAPIData();
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

