/** @jsx React.DOM */
var ScreenMain = React.createClass({
    render: function() {
        return( <div>
                  <ScreenHeader />
                  I wonder if I can just return a template file?   
                  <ScreenList crap={this.props.crap}/> 
                </div>);
    }
});

var ScreenHeader = React.createClass({
    render: function() {
        return (<div><strong>Screen Header</strong></div>);
    }
});

var ScreenList = React.createClass( {
    render: function() {

        var rows = [];

        this.props.crap.forEach( function(crap) {
           
            rows.push(<ScreenRow crap={crap} key={crap.name} />);
 
        }.bind(this));

        return(<div>{rows}</div>); 
    }
});

var ScreenRow = React.createClass({

    render: function() {
        var name = this.props.crap.name;
        var sport = this.props.crap.sport;
        var music = this.props.crap.music;

        return(
            <div>{name}
              <span>{sport} -- {music}</span>
            </div>
        );
    }

});


var TESTCRAP = [
    { name: 'Lebowski', sport: 'Golf', music: 'Creedence' },
    { name: 'McClain', sport: 'Germans', music: 'Nakatomi Plaza Elevator Music' },
    { name: 'Skywalker', sport: 'Fencing', music: 'John Williams' }
];

React.renderComponent(<ScreenMain crap={TESTCRAP} />, document.body); // interesting...

// http://facebook.github.io/react/docs/thinking-in-react.html

