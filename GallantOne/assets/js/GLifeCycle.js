/** @jsx React.DOM */

var React = require('react');

GLifeCycle = React.createClass({displayName: "GLifeCycle",
        
    getInitialState: function() {
        return{ value: 'Initial State set. Init or prefilter stuff here.' };
    },
    handleChange: function() {
        //this.setState({ userInput:e.target.value });
        //this.setState({ userInput:e.target.value });
        console.log('Handle change event here...');
    },
    render: function() {
        return(
           React.createElement("div", {className: "GLifeCycle"}, 
                React.createElement("textarea", {
                    onChange: this.handleChange, 
                    ref: "textarea", 
                    defaultValue: this.state.value}
                )
           ) 
        );
    }

});

module.exports = GLifeCycle;
