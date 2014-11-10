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


var ScreenMain = React.createClass({
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
        return( <div>
                  <ScreenHeader />
                  I wonder if I can just return a template file?   
                  <ScreenList portfolio={this.state.data}/> 
                </div>);
    }
});

var ScreenHeader = React.createClass({
    getInitialState: function() {
        renderThis = getTemplate('/templates/screenheader.html');
        this.setState({value: renderThis});
        return { value: renderThis };
    },
    render: function() {
         console.log("New Pleasure: "+this.state.value);
         return(this.state.value);

    }
});

var ScreenList = React.createClass( {
    render: function() {

        var rows = [];

        this.props.portfolio.forEach( function(portfolio) {
           
            rows.push(<ScreenRow portfolio={portfolio} key={portfolio.name} />);
 
        }.bind(this));

        return(<div className="gallant_portfolio">{rows}</div>); 
    },
    componentDidMount: function() {
        console.log('Screen list mounted');
    }

});

var ScreenRow = React.createClass({

    render: function() {
        var client_name = this.props.portfolio.client_name;
        var id = this.props.portfolio.id;
        var gimage = this.props.portfolio.image;
        var details = this.props.portfolio.details;
        var url = this.props.portfolio.url;

        return(

                    <div>
                        <h6>
                            <small>{id} - {client_name}</small> 
                            <a href={url}>
                                <img src={"/images/clients/" + gimage} />
                            </a>
                        </h6>
                        <small>{details}</small>
                    </div>

        );
    }

});

var callbackTest = function() 
{
    console.log('Callback after render');
};


React.render(<ScreenMain />, document.body, callbackTest); // interesting...

// http://facebook.github.io/react/docs/thinking-in-react.html

