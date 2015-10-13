import React from 'react/addons';
import {PropTypes} from 'react';
import Parallax from 'react-parallax';

export default class GoIndex extends React.Component {

    render() {
        return(
            <div>
            <Parallax bgImage="/assets/images/gg_sunset.png" strength={400}>
                <div>
                    <h1>
                    {this.props.indexData}
                    </h1>
                </div>
                <div id="textHeader">
                    <h1>RELIABLE ENGINEERING &amp; DESIGN</h1>
                    <h3>KEEPING THE DIGITAL WORLD INNOVATIVE AND VISUALLY REMARKABLE</h3>
                </div>
                <h6>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                </h6>
                <div id="goBoxes">
                    <div class="descBox">
                        <div class="gSubHeader"><img src="/assets/images/flange.png"/>Digital Artistry</div>
                        <div class="line_540"></div>
                        <a href="http://www.linkedin.com/in/greggallant">Linked In</a>
                        <a href="greggallant2005@gmail.com">E-mail: greggallant2005@gmail.com</a>

                        <div id="viewButton"><a href="#"><img border="0" src="/assets/images/button_view.png" /></a></div>
                    </div>
                    <div class="aboutBox">
                        <div class="gSubHeader"><img src="/assets/images/flange.png"/>The Architect</div>
                        <div class="line_240"></div>
                        <p>            <strong>Greg A. Gallant</strong> is a professional
                            technologist and software engineer and web designer
                            with over 14 years of experience working in New York City.
                            <br/>
                            <br/>
                            Specializations and experience include the building of several small technology companies using a multitude of programming languages including <a target="springsource" href="http://springsource.org">Java Spring MVC 3</a>, <a target="php" href="http://www.php.net">PHP</a> <a href="http://www.laravel.com">Laravel</a>, <a href="www.angularjs.org">Angular JS</a>, <a href="http://framework.zend.com">Zend 2 Framework</a> and <a href="http://ellislab.com/codeigniter">CodeIgniter</a>, <a href="http://www.python.org">Python</a>, Javascript, and <a href="http://jquery.com">JQuery</a>. This includes database programming using <a href="http://www.mysql.com">MySQL</a>, <a href="http://www.oracle.com">Oracle</a>, and <a href="http://www.postgresql.org">PostGreSQL</a>.</p>
                        <div id="contactButton"><a href="#"><img border="0" src="/assets/images/button_contact.png" /></a>
                        </div>
                    </div>
                </div>
            </Parallax>
            <Parallax>
                <div>
                <p>Props
                bgImage: path to the background image that makes parallax effect visible - (type: String)
                bgColor: css value for a background color (visible only if bgImage is NOT set), eg.: ddd, yellow, rgb(34,21,125) - (type: String)
                strength: parallax effect strength (in pixel), default 100. this will define the amount of pixels the background image is translated - (type: Number)
                blur: pixel value for background image blur, default: 0 - (type: Number)
                disabled: turns off parallax effect if set to true, default: false - (type: Boolean)
                Children
                The children are used to display any content inside the react-parallax component</p>
                </div>
            </Parallax>
            </div>
        );
    }

}
/*
GoIndex.propTypes = {
    indexData: PropTypes.arrayOf(PropTypes.shape({
        text: PropTypes.string.isRequired
    }))
}
*/
GoIndex.propTypes = {
    indexData: PropTypes.string.isRequired
};

GoIndex.defaultProps = {
    indexData: 'Hello World'
};
