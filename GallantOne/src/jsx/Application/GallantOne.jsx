/* This is essentially index.js$ */

import React from 'react';
import ReactDOM from 'react-dom';

import { createStore } from 'redux';
import { Provider } from 'react-redux';
import GallantReducers from './GallantReducers.jsx';
import GoIndex from './GoIndex.jsx';

let store = createStore(GallantReducers, {portData: ""}); // immutable store and reducers 'borrowed' from redux

ReactDOM.render(
    <Provider store={store}>
        <GoIndex/>
    </Provider>
    , document.getElementById('gallantoneReact')
);
