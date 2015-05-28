var React = require('react');

GallantHome = React.createClass({

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

React.render(<GallantHome />, document.body) 
