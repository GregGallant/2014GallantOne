/** @jsx React.DOM */

var ReactCssTransitionGroup = React.addons.CSSTransitionGroup;


getTemplate = function(templateUrl) 
{
    var bigboss = null;
    $.ajax({
        url: templateUrl,
        datatType: 'text',
        success: function(tdata) {
            console.log("from the Big Boss: "+tdata );
            bigboss = tdata;
        }.bind(this),
        error: function(xhr, status, err) {
            console.error('localTemplate', status, err.toString());
        }.bind(this)

    }); 
    
    return bigboss;

}


var ScreenMain = React.createClass({displayName: 'ScreenMain',
    getInitialState: function() {
        return {data: []};
    },
    componentDidMount: function() 
    {
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
    renderThis: 'value',
    render: function() {
//        var renderThis = <div><strong>Screen Header</strong></div>;
/*
        $.ajax({
            url: '/templates/screenheader.html',
            datatType: 'text',
            success: function(tdata) {
                renderThis = tdata;
                TemplateData.t = tdata;
            }.bind(this),
            error: function(xhr, status, err) {
                console.error('localTemplate', status, err.toString());
            }.bind(this)
            
        }); 
*/
         console.log("from the templ: "+getTemplate('/templates/screenheader.html') );
        renderThis = $.getTemplate('/templates/screenheader.html');
         return(renderThis);

        //return (<div><strong>Screen Header</strong></div>);
    }
});

var ScreenList = React.createClass( {displayName: 'ScreenList',
    render: function() {

        var rows = [];

        this.props.portfolio.forEach( function(portfolio) {
           
            rows.push(React.createElement(ScreenRow, {portfolio: portfolio, key: portfolio.name}));
 
        }.bind(this));

        return(React.createElement("div", {className: "gallant_portfolio"}, rows)); 
    },
    componentDidMount: function() {
        console.log('Screen list mounted');
    }

});

var ScreenRow = React.createClass({displayName: 'ScreenRow',

    render: function() {
        var client_name = this.props.portfolio.client_name;
        var id = this.props.portfolio.id;
        var gimage = this.props.portfolio.image;
        var details = this.props.portfolio.details;
        var url = this.props.portfolio.url;

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

var callbackTest = function() 
{
    console.log('Callback after render');
};


React.render(React.createElement(ScreenMain, null), document.body, callbackTest); // interesting...



// http://facebook.github.io/react/docs/thinking-in-react.html

