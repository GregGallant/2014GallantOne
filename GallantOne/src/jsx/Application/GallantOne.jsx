/* This is essentially index.js$ */

import React from 'react/addons';
import { createStore } from 'redux';
import { Provider } from 'react-redux';
import GallantReducers from './GallantReducers.jsx';
import GallantApp from './GallantApp.jsx';

import GallantActions, {displayInput} from './GallantActions.jsx';

let store = createStore(GallantReducers); // points to our store (reducer)

React.render(
    <Provider store={store}>
        {() => <GallantApp/>}
    </Provider>
    , document.body
);


/* Testing a manual dispatch... */
//store.dispatch(displayInput("wtf mate!?!?!?"));