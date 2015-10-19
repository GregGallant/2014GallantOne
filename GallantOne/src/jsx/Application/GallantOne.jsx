/* This is essentially index.js$ */

import React from 'react';
import ReactDOM from 'react-dom';

import { createStore } from 'redux';
import { Provider } from 'react-redux';
import GallantReducers from './GallantReducers.jsx';
import GoIndex from './GoIndex.jsx';

//import GallantActions, {displayInput} from './GallantActions.jsx';

let store = createStore(GallantReducers, {portData: ""}); // points to our store (reducer)

ReactDOM.render(
    <Provider store={store}>
        <GoIndex/>
    </Provider>
    , document.getElementById('gallantoneReact')
);


/* Testing a manual dispatch... */
//store.dispatch(displayInput("wtf mate!?!?!?"));