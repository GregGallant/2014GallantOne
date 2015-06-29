/** @jsx React.DOM */
/* http://javascript.tutorialhorizon.com/2014/09/13/execution-sequence-of-a-react-components-lifecycle-methods/ */
var React = require('react');

GoIndex = React.createClass({displayName: "GoIndex",
        
    getInitialState: function() {
        return{ value: 'Initial State set. Init or prefilter stuff here.' };
    },
    handleChange: function() {
        //this.setState({ userInput:e.target.value });
        //this.setState({ userInput:e.target.value });
        console.log('Handle change event here...');
    },
    render: function() {
        return(
            React.createElement("div", null, 
                React.createElement("div", {id: "textHeader"}, 
                    React.createElement("h1", null, "RELIABLE ENGINEERING & DESIGN"), 
                    React.createElement("h3", null, "KEEPING THE DIGITAL WORLD INNOVATIVE AND VISUALLY REMARKABLE")
                ), 
                React.createElement("div", {id: "goBoxes"}, 
                    React.createElement("div", {class: "descBox"}, 
                        React.createElement("div", {class: "gSubHeader"}, React.createElement("img", {src: "/images/one/flange.png"}), "Digital Artistry"), 
                        React.createElement("div", {class: "line_540"}), 
                        React.createElement("a", {href: "http://www.linkedin.com/in/greggallant"}, "Linked In"), 
                        React.createElement("a", {href: "greggallant2005@gmail.com"}, "E-mail: greggallant2005@gmail.com"), 

                        React.createElement("div", {id: "viewButton"}, React.createElement("a", {href: "#"}, React.createElement("img", {border: "0", src: "/images/one/button_view.png"})))
                    ), 
                    React.createElement("div", {class: "aboutBox"}, 
                        React.createElement("div", {class: "gSubHeader"}, React.createElement("img", {src: "/images/one/flange.png"}), "The Architect"), 
                        React.createElement("div", {class: "line_240"}), 
                        React.createElement("p", null, "            ", React.createElement("strong", null, "Greg A. Gallant"), " is a professional" + ' ' +
                            "technologist and software engineer and web designer" + ' ' +
                            "with over 14 years of experience working in New York City.", 
                            React.createElement("br", null), 
                            React.createElement("br", null), 
                            "Specializations and experience include the building of several small technology companies using a multitude of programming languages including ", React.createElement("a", {target: "springsource", href: "http://springsource.org"}, "Java Spring MVC 3"), ", ", React.createElement("a", {target: "php", href: "http://www.php.net"}, "PHP"), " ", React.createElement("a", {href: "http://www.laravel.com"}, "Laravel"), ", ", React.createElement("a", {href: "www.angularjs.org"}, "Angular JS"), ", ", React.createElement("a", {href: "http://framework.zend.com"}, "Zend 2 Framework"), " and ", React.createElement("a", {href: "http://ellislab.com/codeigniter"}, "CodeIgniter"), ", ", React.createElement("a", {href: "http://www.python.org"}, "Python"), ", Javascript, and ", React.createElement("a", {href: "http://jquery.com"}, "JQuery"), ". This includes database programming using ", React.createElement("a", {href: "http://www.mysql.com"}, "MySQL"), ", ", React.createElement("a", {href: "http://www.oracle.com"}, "Oracle"), ", and ", React.createElement("a", {href: "http://www.postgresql.org"}, "PostGreSQL"), "."), 
                        React.createElement("div", {id: "contactButton"}, React.createElement("a", {href: "#"}, React.createElement("img", {border: "0", src: "/images/one/button_contact.png"})))
                    )
                )
            )

        );
    }

});

module.exports = GLifeCycle;
