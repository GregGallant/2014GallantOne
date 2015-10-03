/** @jsx React.DOM */
var React = require('react');

GallantFooter = React.createClass({displayName: "GallantFooter",

    render: function() {
        return(
            React.createElement("div", null, React.createElement("h6", null, "Copyright 2015"))
        ); 
    }

});

module.exports = GallantFooter;
