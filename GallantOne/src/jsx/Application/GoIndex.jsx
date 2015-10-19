import React from 'react';
import ReactDOM from 'react-dom';
import Slider from 'react-slick';
import {PropTypes} from 'react';
import Parallax from 'react-parallax';
import Container from './container.jsx';
import Row from './row.jsx';
import Column from './column.jsx';


//import {ListGroup, Grid, Row, Col} from 'react-bootstrap';

export default class GoIndex extends React.Component {


    render() {

            var settings = {
                infinite: true,
                speed: 500,
                slidesToShow: 1
            };

            //var layout = getOrGenerateLayout();

        return(
            <div className="newscreen">
                <Slider {...settings}>
                    <div><h3>API Goes Here... comes out here, rather...</h3></div>
                    <div><h3>Love Goes Here... comes out here, rather...</h3></div>
                    <div><h3>Hordor Goes Here... comes out here, rather...</h3></div>
                </Slider>
            </div>
        );
    }

}


GoIndex.propTypes = {
    indexData: PropTypes.string.isRequired
};

