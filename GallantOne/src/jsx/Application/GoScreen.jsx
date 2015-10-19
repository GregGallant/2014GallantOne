import React from 'react';
import ReactDOM from 'react-dom';
import Slider from 'react-slick';
import {PropTypes} from 'react';
import Parallax from 'react-parallax';
import Container from './container.jsx';
import Row from './row.jsx';
import Column from './column.jsx';

//import {ListGroup, Grid, Row, Col} from 'react-bootstrap';

export default class GoScreen extends React.Component {

    render() {

            var settings = {
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 3
            };

        return(
            <div>
                <div id="textHeader">
                    <h1>RELIABLE ENGINEERING &amp; DESIGN</h1>
                    <h3>KEEPING THE DIGITAL WORLD INNOVATIVE AND VISUALLY REMARKABLE</h3>
                </div>

                <Slider>
                    This is the screen for our API. {this.props.indexData}
                </Slider>

            </div>
        );
    }

}


GoScreen.propTypes = {
    indexData: PropTypes.string.isRequired
};

GoScreen.defaultProps = {
    indexData: ''
};
