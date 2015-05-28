var React = require(['react']);

var GallantHome = React.createClass({

    render: function() {
        return(
            <div>
                <GallantHeader />
                <GallantFrontpage />
                <GallantFooter />
            </div>
        ); 
    }

});

React.render(<GallantHome />, document.getElementById('gApp')) 
