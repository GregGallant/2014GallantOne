import React from 'react';
import ReactDOM from 'react-dom';
import {Navbar, Grid, Nav, NavItem, NavBrand} from 'react-bootstrap';

//import { findDOMNode, Component, PropTypes } from 'react';

//var ReactCSSTransitionGroup = React.addons.CSSTransitionGroup; // Deprecated now.

export default class GallantHeaderBasic extends React.Component {

    render() {
        return(
                <Navbar fixedTop staticTop fluid role="navigation">
                    <Nav navbar>
                        <div className="leftAlign">
                            <a href="/"><img id="goLogo" alt="GallantOne.com" border="0" width="290px" height="53px" src="/assets/images/one_logo.png" /></a>
                        </div>
                        <div className="rightAlign">
                            <a href="./portfolio.html">Work</a> | Linked-In | Resume
                        </div>
                    </Nav>
                </Navbar>
        );
    }

    /**
     *  Handle event click
     **/
    handleClick(e) {
        const node = ReactDOM.findDOMNode(this.refs.input);
        const text = node.value.trim();

        // This is what's setting the property value of the GoIndex (foreign) component.
        this.props.onAddInput(text);

        node.value = '';
    }
}

GallantHeaderBasic.propTypes = {
    onAddInput: React.PropTypes.func.isRequired
};
