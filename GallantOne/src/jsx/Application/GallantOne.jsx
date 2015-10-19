/* This is essentially index.js$ */

import React from 'react';
import ReactDOM from 'react-dom';

import { createStore } from 'redux';
import { Provider } from 'react-redux';
import GallantReducers from './GallantReducers.jsx';
import GallantApp from './GallantApp.jsx';

//import GallantActions, {displayInput} from './GallantActions.jsx';

let store = createStore(GallantReducers, {handleActionOnState: ""}); // points to our store (reducer)

ReactDOM.render(
    <Provider store={store}>
        <GallantApp/>
    </Provider>
    , document.getElementById('kidsLoveReact')
);


/* Testing a manual dispatch... */
//store.dispatch(displayInput("wtf mate!?!?!?"));