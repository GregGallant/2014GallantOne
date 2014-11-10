/** @jsx React.DOM */

var ScreenMain = React.createClass({displayName: 'ScreenMain',
    render: function() {
        return( React.createElement("div", null, 
                  React.createElement(ScreenHeader, null), 
                  "I wonder if I can just return a template file?",    
                  React.createElement(ScreenList, {crap: this.props.crap})
                ));
    }
});

var ScreenHeader = React.createClass({displayName: 'ScreenHeader',
    render: function() {
        return (React.createElement("div", null, React.createElement("strong", null, "Screen Header")));
    }
});

var ScreenList = React.createClass( {displayName: 'ScreenList',
    render: function() {

        var rows = [];

        this.props.crap.forEach( function(crap) {
           
            rows.push(React.createElement(ScreenRow, {crap: crap, key: crap.name}));
 
        }.bind(this));

        return(React.createElement("div", null, rows)); 
    }
});

var ScreenRow = React.createClass({displayName: 'ScreenRow',

    render: function() {
        var name = this.props.crap.name;
        var sport = this.props.crap.sport;
        var music = this.props.crap.music;

        return(
            React.createElement("div", {style: "background-color:#ffcc99;"}, name, 
              React.createElement("span", {style: "float:right;"}, sport, " -- ", music)
            )
        );
    }

});


var TESTCRAP = [
    { name: 'Lebowski', sport: 'Golf', music: 'Creedence' },
    { name: 'McClain', sport: 'Germans', music: 'Nakatomi Plaza Elevator Music' },
    { name: 'Skywalker', sport: 'Fencing', music: 'John Williams' }
];

React.renderComponent(React.createElement(ScreenMain, {crap: TESTCRAP}), document.body); // interesting...

// http://facebook.github.io/react/docs/thinking-in-react.html

