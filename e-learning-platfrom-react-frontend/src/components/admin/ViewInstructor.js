import React, { useState} from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,
    CardTitle, Breadcrumb, BreadcrumbItem,  Button, Modal, ModalHeader, ModalBody,
    Form, FormGroup, Input, Label,Col } from 'reactstrap';
import { Link,useHistory } from 'react-router-dom';
import axios from 'axios';
import { FadeTransform, Fade, Stagger } from 'react-animation-components';

function RenderInstructor({ instructor,loading}) {
      if (loading) {
           return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
        }
        if (instructor != null) {
            return (
                <div className="container">
                <div className="row">
                    <Breadcrumb>
                        <BreadcrumbItem><Link to="/instructorList">Instructor List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{instructor.fullname}</BreadcrumbItem>
                    </Breadcrumb>
                    <div className="col-12">
                            <h3>{instructor.title}</h3>
                        <hr />
                    </div>                
                </div>
                <div className="row">
                        <div className='col-12 col-md-5 m-1'>
                                        <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
                                <img width="100%" src={instructor.image} alt={instructor.title} />
                                </FadeTransform>
                        </div>
                        <div className='col-12 col-md-5 m-1'>
                                <Stagger in>
                                <CardBody>
                                    <Fade in>
                                <CardTitle>{instructor.fullname}</CardTitle>
                                <CardText> {instructor.address}
                                </CardText>   <CardText> 
                                    {instructor.country}
                                </CardText>   <CardText> 
                                    {instructor.c_id}
                                        </CardText>
                                        </Fade>
                                </CardBody>
                                </Stagger>
                        </div>
                        
                    </div>
                    </div>

            );
    }
    
        if (instructor == null) {
            return (<div></div>)
        }
    }

const ViewInstructor = (props) => {

    const instructor = props.instructors;
    const loading = props.loading
    console.log(instructor);

  
    const instructorItem = <RenderInstructor instructor={instructor} loading={loading} />
        
            if (instructorItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

                <div className='row'>
                   {instructorItem}
            </div>
            </div>
            )
        }
 


export default ViewInstructor;
