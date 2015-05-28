/*var React = require(['react']);

var Router = require(['react-router']);
*/
//var Link = Router.Link; // yes

var GallantApp = React.createClass({

    render: function() {
        return(
            <div>
                <GallantHeader />
                <GallantContent />
                <GallantFooter />
            </div>
        ); 
    }

});

React.render(<GallantApp />, document.body) 
