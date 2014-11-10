/** @jsx React.DOM */
var ScreenMain = React.createClass({displayName: 'ScreenMain',
    getInitialState: function() {
        return {data: []};
    },
    componentDidMount: function() {
        $.ajax({
            url: 'http://api.gallantone.com/portfolio',
            datatType: 'json',
            success: function(data) {
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error('api', status, err.toString());
            }.bind(this)
             
        });
    },
    render: function() {
        return( React.createElement("div", null, 
                  React.createElement(ScreenHeader, null), 
                  "I wonder if I can just return a template file?",    
                  React.createElement(ScreenList, {portfolio: this.state.data})
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

        this.props.portfolio.forEach( function(portfolio) {
           
            rows.push(React.createElement(ScreenRow, {portfolio: portfolio, key: portfolio.name}));
 
        }.bind(this));

        return(React.createElement("div", {className: "gallant_portfolio"}, rows)); 
    }
});

var ScreenRow = React.createClass({displayName: 'ScreenRow',

    render: function() {
        var client_name = this.props.portfolio.client_name;
        var id = this.props.portfolio.id;
        var gimage = this.props.portfolio.image;
        var details = this.props.portfolio.details;
        var url = this.props.portfolio.url;

/* 
       this.id = ko.observable(data.id);
        this.client_name = ko.observable(data.client_name);
        this.url = ko.observable(data.url);
        this.details = ko.observable(data.details);
        this.image = ko.observable(data.image);
        this.imagePath = "/images/clients/"+data.image;
*/



        return(

                    React.createElement("div", null, 
                        React.createElement("h6", null, 
                            React.createElement("small", null, id, " - ", client_name), 
                            React.createElement("a", {href: url}, 
                                React.createElement("img", {src: "/images/clients/" + gimage})
                            )
                        ), 
                        React.createElement("small", null, details)
                    )

        );
    }

});

var callbackTest = function() {

    console.log('Callback after render');
    
};


React.render(React.createElement(ScreenMain, null), document.body, callbackTest); // interesting...

// http://facebook.github.io/react/docs/thinking-in-react.html

