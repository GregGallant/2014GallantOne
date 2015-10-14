import React from 'react/addons';
import {Navbar, Grid, Nav, NavItem, NavBrand} from 'react-bootstrap';

//import { findDOMNode, Component, PropTypes } from 'react';

var ReactCSSTransitionGroup = React.addons.CSSTransitionGroup; // Deprecated now.

export default class GallantHeader extends React.Component {

    render() {
        return(
                <Navbar fixedTop staticTop role="navigation">
                    <Nav navbar>
                       <NavItem>
                            <a href="/"><img id="goLogo" alt="GallantOne.com" border="0" width="290px" height="53px" src="/assets/images/one_logo.png" /></a>
                            <input type='text' ref='input' />
                            <button onClick={ (e) => this.handleClick(e) } >
                                Add Something
                            </button>
                       </NavItem>
                       <NavItem className="goRight">
                        <a className="loginPlacement" href="/login">login</a> / <a className="loginPlacement" href="/register">register</a>
                       </NavItem>
                   </Nav>
                </Navbar>
        );
    }

    /**
     *  Handle event click
     **/
    handleClick(e) {
        const node = React.findDOMNode(this.refs.input);
        const text = node.value.trim();

        // This is what's setting the property value of the GoIndex (foreign) component.
        this.props.onAddInput(text);

        node.value = '';
    }
}

GallantHeader.propTypes = {
    onAddInput: React.PropTypes.func.isRequired
};
