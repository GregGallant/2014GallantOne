
/**
 *  ==== React Life Cycle ====
 *
 * getInitialState:  
 * componentWillMount:
 * componentDidMount:
 * componentWillReceiveProps:
 * componentWillUnmount:
 * render:
 */

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
