/**
 * GallantActions.jsx
 * Primary actions in the GallantOne application
 */

/* in use */
export const PORTFOLIO_DATA = 'PORTFOLIO_DATA'; // Get data from our mock api
export const DISPLAY_INPUT = 'DISPLAY_INPUT'; // Simply show the input of the field
export const COMPLEX_DATA_TYPE = 'COMPLEX_DATA_TYPE';


/* in-use action creators */
export function receiveAPIData( portdata, client_id ) {
    return {
        type: PORTFOLIO_DATA,
        data: portdata,
        client_id: client_id
     };
}

export function displayInput( text ) {
    return { type: DISPLAY_INPUT, text };
}

export function handleComplexDataType( complexity )  {
    return { type: COMPLEX_DATA_TYPE, complexity };
}
