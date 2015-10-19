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

export default class GoIndex extends React.Component {

    constructor(props) {
        super(props);

        this.props = JSON.stringify(getPortState());
    }

    render() {

        var pstateString = JSON.stringify(getPortState());
        var ps = JSON.parse(pstateString);
        var imagepath = '/assets/images/clients/'+ps.image;
        var imagesrc = {uri: imagepath};

        return(
            <div>
            <div className="newscreen">
                <div id="portfolioScreen" className="">

                <div className="clientImage"><img src={imagepath} /></div>

                <div id="portscreen_{ps.id}">
                 <h3>{ps.name}</h3>
                </div>


                 <h5>{ps.url}</h5>
                    <h6>{ps.details}</h6>
                 <h6>{ps.tech}</h6>
                    <h6><div dangerouslySetInnerHTML={{__html: ps.thejob}} /></h6>

               </div>

            </div>

            <button onClick={ (e) => this.handleClick(e) } >
                 Next
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

    return {
        portData: state
    };
}

// Maybe use a decorator instead, but for now...
export default GoIndex;