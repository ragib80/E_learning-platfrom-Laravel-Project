import React from 'react';
import { Link } from 'react-router-dom';
import {
    Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle, Jumbotron
} from 'reactstrap';
import { FadeTransform } from 'react-animation-components';

function Home(props) {
    console.log(props.students);
    return (
        <div>
            <Jumbotron>
                <div className="container">
                    <div className="row row-header">
                        <div className="col-12 col-sm-6">
                            <h1 className="humanist">E-Learning</h1>
                            <p className="humanist">A learning system based on formalised teaching but with the help of electronic resources is known as E-learning. While teaching can be based in or out of the classrooms, the use of computers and the Internet forms the major component of E-learning. E-learning can also be termed as a network enabled transfer of skills and knowledge, and the delivery of education is made to a large number of recipients at the same or different times. Earlier, it was not accepted wholeheartedly as it was assumed that this system lacked the human element required in learning.</p>
                        </div>
                        <div className="col-12 col-sm-6">
                            <img src='assets/images/preview.svg' width="100%" alt='Student Portal' />
                        </div>
                    </div>
                </div>
            </Jumbotron>
            <div className="container">
                <div className="row align-items">
                    <h1 className="humanist"></h1>


                </div>
                <div className="row align-items">
                    <h1 className="humanist"></h1>


                </div>
            </div>
        </div>

    );
}


export default Home;
