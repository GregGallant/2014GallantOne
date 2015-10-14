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

                    <div class="leftBox">
                        <h4>
                            <ul>
                                <strong>Current Development: </strong>
                                <li>Laravel / Lumen PHP API Development</li>
                                <li>ReactJS / ES6 Redux</li>
                                <li>Bootstrap / react-bootstrap</li>
                                <li>MySQL / PostGreSQL</li>
                            </ul>
                        </h4>
                        <h4>
                            <ul>
                                <strong>Past Development:</strong>
                                <li>Zend Framework 1 / 2</li>
                                <li>Java Spring 3 MVC</li>

                                <li>JQuery</li>

                                <li>Zurb Foundation CSS Framework</li>
                            </ul>
                        </h4>

                    </div>
                    <div class="rightBox">
                        <h4>
                        </h4>
                    </div>
                </div>
            </Parallax>
            <Parallax>
                <div>
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
    indexData: ''
};
