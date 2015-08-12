/** @jsx React.DOM */
var React = require('react');
var ReactCSSTransitionGroup = React.addons.CSSTransitionGroup; 
var ias;

GallantHeader = React.createClass({

    getInitialState: function() {
        return { authState: ["React/JSX testing - So you wanna be a contender?"] };
    },

    handleAdd: function() {
        var newAuthState;
        newAuthState = { authState: ["Ay, f-ck it.  I'll start at the top."] };
        this.setState({authState: newAuthState});
    },

    handleRemove: function(ias) {
        var newAuthState = this.state.authState;
        newAuthState.splice(ias, 1);
        this.setState({ authState: newAuthState });
    },

    componentDidMount: function() {

        // this.getDOMNode() is deprecated - use React.findDomNode is happenning at this point
        //    More Details: http://www.omerwazir.com/posts/react-getdomnode-replaced-with-findDOMNode/
        //    React.findDomNode().textContent; // ex.  
        
        // Going to run a jquery test on  div class='atariIntro'
        // css-transition-group is for very basic div anim 
        // jQuery(this.getDOMNode()).sortable({stop: this.handleDrop});
   
        /**
         * A jQuery Test for later to see how far the react virtual dom will let us 
         * do different, specific tasks - important for enterprise and legacy apps and
         * handling other third party js libraries.
         **/ 
        //var reactType = jQuery(React.findDomNode().atariIntro.type());
        //console.log('Testing reactType: ');
        //console.log(reactType);
        
        /* bt2u */
        this.el = this.getDOMNode();
        this.$el = $(this.el);
        this.$el.addClass("authStateAnim-enter-active");
    
        requestAnimationFrame(
            function() { 
                this.$el
                    .removeClass("authStateAnim-enter-active")
                    .addClass("authStateAnim-enter");
                requestAnimationFrame( 
                    function() {
                        this.$el.addClass("authStateAnim-enter-active");
                        // Arrival.complete(this.$el, done); 
                        // Not sure about using yet another library ~ Arrival.js
                        // Debug this portion
                    }.bind(this)); 
            }.bind(this));
    },

    render: function() {
   
       var authState = this.state.authState.map(function(authState, ias) {

            return(
                <div key={authState} onClick={this.handleRemove.bind(this,ias)}>
                    {authState}
                </div>
            );

        }.bind(this));

        return(
                <div>
                    <button onClick={this.handleAdd}>{authState}</button>
                    <div onClick={this.handleRemove.bind(this, ias)}>Well... {authState}</div>
                    <ReactCSSTransitionGroup transitionName="authStateAnim" transitionAppear={true}>
                        {authState}
                    </ReactCSSTransitionGroup>
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


// Browser parsing function to handle animation frames in a manner optimized for the
// respective browser it's using...

 (function() {

     var lastTime = 0;
     var vendors = ['ms', 'moz', 'webkit', 'o'];

     for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
         window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
         window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
                              || window[vendors[x]+'CancelRequestAnimationFrame'];
     }

    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout( function() {
                                            callback(currTime + timeToCall);
                                        }, timeToCall
                                       );
            lastTime = currTime + timeToCall;
            return id;
        };
    }

    if (!window.cancelAnimationFrame) {
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
    }

 }());



