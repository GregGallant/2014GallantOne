/**
 * GallantActions.jsx
 * Primary actions in the GallantOne application
 */

/* in use */
export const RECEIVE_DATA = 'RECEIVE_DATA'; // Get data from our mock api
export const SET_VISIBLE = 'SET_VISIBLE'; // Visibility of the app
export const DISPLAY_INPUT = 'DISPLAY_INPUT'; // Simply show the input of the field

/* testing */
export const SELECT_PRODUCT = 'SELECT_PRODUCT';
export const CART_ADD = 'CART_ADD';
export const CART_REMOVE = 'CART_REMOVE';


/* in-use action creators */
export function receiveAPIData( text ) {
    return { type: RECEIVE_DATA, text };
}

export function updateVisibility( visible ) {
    return { type: SET_VISIBLE, visible }
}

export function displayInput( text ) {
    return { type: DISPLAY_INPUT, text };
}

/* Testing functions */
export function selectProduct( index ) {
    return { type: SELECT_PRODUCT, index };
}

export function addToCart( sku ) {
    return { type: CART_ADD, sku };
}

export function removeFromCart( sku ) {
    return { type: CART_REMOVE, sku };
}

