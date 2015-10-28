import React from 'react';
import ReactDOM from 'react-dom';
import {PropTypes} from 'react';
import Parallax from 'react-parallax'; // so hot right now... --zoolander

import { createStore } from 'redux';
import { connect } from 'react-redux'; // Eventually remove this until next component

import { receiveAPIData, displayInput } from './GallantActions.jsx';

/* Header Footer */
import GallantHeaderBasic from '../Layout/GallantHeaderBasic.jsx';
import GallantFooter from '../Layout/GallantFooter.jsx';

import GallantReducers from './GallantReducers.jsx';
import { handleActionOnState, incrementClientId, getClientId, resetClientId, decrementClientId, getPortState, setPortState } from './GallantReducers.jsx';

export default class GoIndex extends React.Component {


    constructor(props) {
        super(props);

        var init_data='';
        resetClientId();

        /* Testing lifecycle async events... to be removed... */
        $.ajax({
            cache : false,
            type: 'GET',
            crossDomain:true,
            url: 'http://api.gallantone.com/portfolio/0',
            contentType:"application/jsonp",
            success: function(data){
                mapStateToProps(data);
                setPortState(data);  // Not react 0.13.x standard, but es6 introduced classes and I'm soooo version 0.14.x...
                init_data = data;
                this.props = data;
                super.forceUpdate();

            },
            error: function(data){
                console.log("ERROR RESPONSE FROM api.gallantone.com SERVER : "+JSON.stringify(data));
            },
            complete: function(data){
               // console.log("api port call completed");
            }
        });

        this.init_data = init_data;
         //this.props = JSON.stringify(getPortState());

    }

    render() {
        var pstateString = JSON.stringify(getPortState());

        var ps = JSON.parse(pstateString);

        if (typeof ps.image == "undefined") {
            var imagepath = '/assets/images/clients/npd.gif';
            var imagesrc = {uri:imagepath};
        } else {
            var imagepath = '/assets/images/clients/'+ps.image;
            var imagesrc = {uri: imagepath};
        }
        return(
            <div className="fromTheTop">
                <div className="aboutit">Check out this experimental custom ReactJS (0.14) component using <a href="http://lumen.laravel.com">Lumen</a> as a portfolio API (api.gallantone.com)!</div>

                <button className="btn btn-default prevButton" onClick={ (e) => this.handlePreviousClick(e) } >
                    Previous
                </button>
                <button className="btn btn-default nextButton" onClick={ (e) => this.handleClick(e) } >
                    Next
                </button>
            <div className="newscreen">
                <div id="portfolioScreen" className="">

                <div id="firstAnim">
                    <div className="clientImage"><img src={imagepath} /></div>
                </div>

                <div id="secondAnim">
                    <div id="portscreen_{ps.id}">
                        <h3>{ps.name}</h3>
                    </div>
                </div>

                <div id="thirdAnim">
                 <h5>{ps.url}</h5>
                    <h6>{ps.details}</h6>
                 <h6>{ps.tech}</h6>
                    <h6><div dangerouslySetInnerHTML={{__html: ps.thejob}} /></h6>
                </div>

               </div>

            </div>

            </div>
        );
    }

    /**
     * componentDidMount lcevent - loading default api call here
     * Not called during rendering, init some data here.
     */
    componentDidMount() {

        managePortfolioData();
        setPortState(this.init_data);  // Not react 0.13.x standard, but es6 introduced classes and I'm soooo version 0.14.x...

        this.forceUpdate();

    }

    /* This may be redundant */
    shouldComponentUpdate() {

        return true;
    }

    /**
     *  Another button to button...
     **/
    handleClick(e) {

        //const node = ReactDOM.findDOMNode(this.refs.input);
        managePortfolioData();

        gallantOnScreen(); // Make it so...

        this.forceUpdate();

    }

    /**
     *  Another button to button...
     **/
    handlePreviousClick(e) {

        //const node = ReactDOM.findDOMNode(this.refs.input);
        gobackPortfolioData();

        gallantOnScreen(); // Make it so...

        this.forceUpdate();

    }


}

/**
 * Handle portfolio api endpoint loading
 */
function managePortfolioData() {

    incrementClientId();
    var this_client_id = getClientId();
    return getPortfolioData(this_client_id);

}

/**
 * Handle portfolio api endpoint loading
 */
function gobackPortfolioData() {

    decrementClientId();
    var this_client_id = getClientId();
    return getPortfolioData(this_client_id);

}


/**
 *   My super awesome screen component in a framework that actually makes sense
 *   TODO: Needs more 80's glyphs.
 **/
function gallantOnScreen() {
    var newscreen1 = document.getElementById('firstAnim');
    var newscreen2 = document.getElementById('secondAnim');
    var newscreen3 = document.getElementById('thirdAnim');

    /* Our old three tier marquee... todo: tweak snabbt animation lib... more 80s dammit... */
    snabbt(newscreen1, {
        position: [1600, 0, 0],
        easing: 'spring',
        springMass:5,
        springConstant: 1.3,
        springDeceleration: 0.3
    }).snabbt({
        position: [0, 0, 0],
        easing: 'spring',
        springMass:7,
        springConstant: 1.3,
        springDeceleration: 0.3
    });


    snabbt(newscreen2, {
        position: [1600, 0, 0],
        easing: 'spring',
        springMass:8,
        springConstant: 1.3,
        springDeceleration: 0.3
    }).snabbt({
        position: [0, 0, 0],
        easing: 'spring',
        springMass:10,
        springConstant: 1.3,
        springDeceleration: 0.3
    });

    snabbt(newscreen3, {
        position: [1600, 0, 0],
        easing: 'spring',
        springMass:11,
        springConstant: 1.2,
        springDeceleration: 0.3
    }).snabbt({
        position: [0, 0, 0],
        easing: 'spring',
        springMass:14,
        springConstant: 1.2,
        springDeceleration: 0.3
    });

}

function getPortfolioData(client_id) {


    if (client_id == null) {
        client_id = 1;
    }

    $.ajax({
        cache : false,
        type: 'GET',
        crossDomain:true,
        url: 'http://api.gallantone.com/portfolio/'+client_id,
        contentType:"application/jsonp",
        success: function(data){
            mapStateToProps(data);
            setPortState(data);  // Not react 0.13.x standard, but es6 introduced classes and I'm soooo version 0.14.x...
            this.init_data = data;

        },
        error: function(data){
            console.log("ERROR RESPONSE FROM api.gallantone.com SERVER : "+JSON.stringify(data));
        },
        complete: function(data){
            //console.log("api port call completed");
        }
    });


}



/* Removed properties since it's a pretty specific component but maybe for later... */
GoIndex.propTypes = {
    portData: React.PropTypes.string.isRequired,
    client_id: React.PropTypes.number.isRequired
};

/**
 * Originally select() - global state stuff
 * This is a problematic area that needs fixing.
 * @param state
 * @returns {{goIndexText: *}}
 */
function mapStateToProps(state)
{
    // complexity for complexity's sake is so hot right now but my state is pretty straightforward.
    // Still using Redux's Reducers ideology but the state should be as simple as possible, let the data be complex.
    return {
        portData: state
    };
}

// Maybe use a decorator instead, but for now removed the connector and mapStateToProps stuff...
export default GoIndex;