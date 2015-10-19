/* This is essentially index.js$ */

import React from 'react';
import ReactDOM from 'react-dom';

import { createStore } from 'redux';
import { Provider } from 'react-redux';
import GallantReducers from './GallantReducers.jsx';
import GallantScreen from './GallantScreen.jsx';

//import GallantActions, {displayInput} from './GallantActions.jsx';

let store = createStore(GallantReducers, {handleActionOnState: ""}); // points to our store (reducer)

ReactDOM.render(
    <Provider store={store}>
        <GallantScreen/>
    </Provider>
    , document.body
);


/* Testing a manual dispatch... */
//store.dispatch(displayInput("wtf mate!?!?!?"));