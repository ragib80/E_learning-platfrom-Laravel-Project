import React, { useState} from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,
    CardTitle, Breadcrumb, BreadcrumbItem,  Button, Modal, ModalHeader, ModalBody,
    Form, FormGroup, Input, Label,Col } from 'reactstrap';
import { Link,useHistory } from 'react-router-dom';
import axios from 'axios';
import { FadeTransform, Fade, Stagger } from 'react-animation-components';

function RenderStudent({ student,loading}) {
      if (loading) {
           return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
        }
        if (student != null) {
            return (
                <div className="container">
                <div className="row">
                    <Breadcrumb>
                        <BreadcrumbItem><Link to="/student">Student</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{student.fullname}</BreadcrumbItem>
                    </Breadcrumb>
                    <div className="col-12">
                            <h3>{student.title}</h3>
                        <hr />
                    </div>                
                </div>
                <div className="row">
                        <div className='col-12 col-md-5 m-1'>
                                        <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
                                <img width="100%" src={student.image} alt={student.title} />
                                </FadeTransform>
                        </div>
                        <div className='col-12 col-md-5 m-1'>
                                <Stagger in>
                                <CardBody>
                                    <Fade in>
                                <CardTitle>{student.fullname}</CardTitle>
                                <CardText> {student.address}
                                </CardText>   <CardText> 
                                    {student.country}
                                </CardText>   <CardText> 
                                    {student.c_id}
                                        </CardText>
                                        </Fade>
                                </CardBody>
                                </Stagger>
                        </div>
                        
                    </div>
                    </div>

            );
    }
    
        if (student == null) {
            return (<div></div>)
        }
    }

const ViewStudent = (props) => {

    const student = props.students;
    const loading = props.loading
    console.log(student);

  
    const studentItem = <RenderStudent student={student} loading={loading} />
        
            if (studentItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

                <div className='row'>
                   {studentItem}
            </div>
            </div>
            )
        }
 


export default ViewStudent;
