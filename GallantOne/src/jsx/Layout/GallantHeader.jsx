/** @jsx React.DOM */
var React = require('react');

GallantHeader = React.createClass({

    render: function() {
        return(
                <div>
                    <div className="goHeader">
                        <a href="/"><img id="goLogo" alt="GallantOne.com" border="0" src="/assets/images/one_logo.png" /></a>
                    </div>
                    <div className="goLine"></div>
                    <div className="authMenu">
                        <div className="loginPlacement"><a className="loginPlacement" href="/login">login</a> / <a className="loginPlacement" href="/register">register</a></div>
                    </div>
                </div>
        ); 
    }

});

module.exports = GallantHeader;
