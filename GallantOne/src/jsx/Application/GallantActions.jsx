/**
 * GallantActions.jsx
 * Primary actions in the GallantOne application
 */

/* in use */
export const RECEIVE_DATA = 'RECEIVE_DATA'; // Get data from our mock api
export const DISPLAY_INPUT = 'DISPLAY_INPUT'; // Simply show the input of the field


/* in-use action creators */
export function receiveAPIData( text ) {
    return { type: RECEIVE_DATA, text };
}

export function displayInput( text ) {
    return { type: DISPLAY_INPUT, text };
}

