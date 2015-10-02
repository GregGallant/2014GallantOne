/** @jsx React.DOM */
/* http://javascript.tutorialhorizon.com/2014/09/13/execution-sequence-of-a-react-components-lifecycle-methods/ */
var React = require('react/addons');

GoIndex = React.createClass({
        
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
            <div>
                <div id="textHeader">
                    <h1>RELIABLE ENGINEERING &amp; DESIGN</h1>
                    <h3>KEEPING THE DIGITAL WORLD INNOVATIVE AND VISUALLY REMARKABLE</h3>
                </div>
                <div id="goBoxes">
                    <div class="descBox">
                        <div class="gSubHeader"><img src="/images/one/flange.png"/>Digital Artistry</div>
                        <div class="line_540"></div>
                        <a href="http://www.linkedin.com/in/greggallant">Linked In</a>
                        <a href="greggallant2005@gmail.com">E-mail: greggallant2005@gmail.com</a>

                        <div id="viewButton"><a href="#"><img border="0" src="/images/one/button_view.png" /></a></div>
                    </div>
                    <div class="aboutBox">
                        <div class="gSubHeader"><img src="/images/one/flange.png"/>The Architect</div>
                        <div class="line_240"></div>
                        <p>            <strong>Greg A. Gallant</strong> is a professional
                            technologist and software engineer and web designer
                            with over 14 years of experience working in New York City.
                            <br/>
                            <br/>
                            Specializations and experience include the building of several small technology companies using a multitude of programming languages including <a target="springsource" href="http://springsource.org">Java Spring MVC 3</a>, <a target="php" href="http://www.php.net">PHP</a> <a href="http://www.laravel.com">Laravel</a>, <a href="www.angularjs.org">Angular JS</a>, <a href="http://framework.zend.com">Zend 2 Framework</a> and <a href="http://ellislab.com/codeigniter">CodeIgniter</a>, <a href="http://www.python.org">Python</a>, Javascript, and <a href="http://jquery.com">JQuery</a>. This includes database programming using <a href="http://www.mysql.com">MySQL</a>, <a href="http://www.oracle.com">Oracle</a>, and <a href="http://www.postgresql.org">PostGreSQL</a>.</p>
                        <div id="contactButton"><a href="#"><img border="0" src="/images/one/button_contact.png" /></a></div>
                    </div>
                </div>
            </div>
        );
    }

});

module.exports = GoIndex;
