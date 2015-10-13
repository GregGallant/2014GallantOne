import React from 'react/addons';
//import { findDOMNode, Component, PropTypes } from 'react';

var ReactCSSTransitionGroup = React.addons.CSSTransitionGroup; // Deprecated now.

export default class GallantHeader extends React.Component {

    render() {
        return(
                <div>
                    <div className="goHeader">
                        <a href="/"><img id="goLogo" alt="GallantOne.com" border="0" src="/assets/images/one_logo.png" /></a>
                <input type='text' ref='input' />
                <button onClick={ (e) => this.handleClick(e) } >
                    Add Something
                </button>
                    </div>
                    <div className="goLine"></div>
                    <div className="authMenu">
                        <div className="loginPlacement"><a className="loginPlacement" href="/login">login</a> / <a className="loginPlacement" href="/register">register</a></div>
                    </div>
                </div>
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
