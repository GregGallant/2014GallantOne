import React from 'react';
import ReactDOM from 'react-dom';
import Slider from 'react-slick';
import {PropTypes} from 'react';
import Parallax from 'react-parallax';
import Container from './container.jsx';
import Row from './row.jsx';
import Column from './column.jsx';


import { createStore } from 'redux';
import { connect } from 'react-redux';
import { receiveAPIData, displayInput } from './GallantActions.jsx';

/* Header Footer */
import GallantHeaderBasic from '../Layout/GallantHeaderBasic.jsx';
import GallantFooter from '../Layout/GallantFooter.jsx';

import GallantReducers from './GallantReducers.jsx';
import { handleActionOnState, incrementClientId, getClientId, getPortState, setPortState } from './GallantReducers.jsx';

//import {snabbt} from '/assets/js/snabbt.min.js';

//import {ListGroup, Grid, Row, Col} from 'react-bootstrap';

export default class GoIndex extends React.Component {



    constructor(props) {
        super(props);

        //this.props = props;
        this.props = JSON.stringify(getPortState());

        //this.PortObject = receiveAPIData('', 1);
        //this.setState = this.setState.bind(this);
    }

    render() {

        //loadPortfolioAPI();

        console.log("RENDERING props: ");
        console.log(this.props);
        console.log("Find the state now.");
        //console.log(getPortState());

        var pstateString = JSON.stringify(getPortState());
        var ps = JSON.parse(pstateString);

        return(
            <div className="newscreen">
                <div id="portfolioScreen" className=""><h3>{ps.id} {ps.name} Love Goes Here... comes out here, rather...</h3></div>

                <button onClick={ (e) => this.handleClick(e) } >
                   Next Client
                </button>
            </div>
        );
    }

    // Not called during rendering, init some data here.

    /**
     * componentDidMount lcevent - loading default api call here
     */
    componentDidMount() {

        loadPortfolioAPI();
        this.setState();

    }

    shouldComponentUpdate() {
        return true;
    }
    /**
     *  Handle event click
     **/
    handleClick(e) {

        //const node = ReactDOM.findDOMNode(this.refs.input);
        loadPortfolioAPI();
        var newscreen = document.getElementById('portfolioScreen');


        snabbt(newscreen, {
            position: [400, 0, 0],
            easing: 'spring',
            springConstant: 0.3,
            springDeceleration: 0.8
        }).snabbt({
            position: [0, 0, 0],
            easing: 'spring',
            springConstant: 0.3,
            springDeceleration: 0.8
        });

        this.forceUpdate();

    }

    funkyspin() {
        var newscreen = document.getElementById('portfolioScreen');


        snabbt(newscreen, {
            position: [100, 0, 0],
            rotation: [Math.PI, 0, 0],
            easing: 'ease'
        });
    }
}


/**
 * Makes get request to api
 */
function loadPortfolioAPI() {

    var port_data;

    incrementClientId();
    var this_client_id = getClientId();

    console.log("INCREMENTING STUFF: ");
    console.log(this_client_id);

    $.ajax({
        cache : false,
        type: 'GET',
        crossDomain:true,
        url: 'http://api.gallantone.local/portfolio/'+this_client_id,
        data: port_data,
        contentType:"application/jsonp",
        success: function(data){

            mapStateToProps(data);
            setPortState(data);



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




GoIndex.propTypes = {

    portData: React.PropTypes.string.isRequired,
    client_id: React.PropTypes.number.isRequired
};

/**
 * Originally select() - global state stuff
 * This is a problematic area that needs fixing.
 * TODO: Remove handleActionOnState from state.
 * @param state
 * @returns {{goIndexText: *}}
 */
function mapStateToProps(state)
{
    // Sort of want a way to not have the reducer method name as a key, although this might make sense as this is a way to know which state belongs to which method combined by the combinereducer() method.
    //state = state.handleActionOnState;
    console.log('state from mstp');
    console.log(state);
   // console.log(state.handleActionOnState);
    return {
        portData: state
    };
}

// Maybe use a decorator instead, but for now...
export default GoIndex;