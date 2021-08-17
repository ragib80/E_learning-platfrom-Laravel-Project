import React, { useState} from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,CardSubtitle,
    CardTitle, Breadcrumb, BreadcrumbItem,  Button, Modal, ModalHeader, ModalBody,
    Form, FormGroup, Input, Label,Col } from 'reactstrap';
import { Link,useHistory } from 'react-router-dom';
import axios from 'axios';
import { FadeTransform, Fade, Stagger } from 'react-animation-components';

function RenderDash() {
    //   if (loading) {
    //        return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
    //     }
    
    return (
        <React.Fragment>
            <div className="col-12 col-md-12">
            <h1 className="humanist text-center">Welcome To Dashboard</h1>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
               <CardImg width="100%" height="80%" src="assets/images/students.svg" alt="student" />
            <CardBody>
                <CardTitle>Student</CardTitle>
            <CardSubtitle></CardSubtitle> 
                <CardText>
                 <Link to={"/student"} className="btn btn-primary btn sm">View</Link>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
           </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
               <CardImg width="100%" src="assets/images/course.jpg" alt="student" />
            <CardBody>
                <CardTitle>Course</CardTitle>
            <CardSubtitle></CardSubtitle> 
                <CardText>
                 <Link to={"/course"} className="btn btn-primary btn sm">View</Link>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
               <CardImg width="100%" src="assets/images/employee.jpg" alt="stuff" />
            <CardBody>
                <CardTitle>Stuff</CardTitle>
            <CardSubtitle></CardSubtitle> 
                <CardText>
                 <Link to={"/stuff"} className="btn btn-primary btn sm">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
               <CardImg width="100%" src="assets/images/instructor.svg" alt="student" />
            <CardBody>
                <CardTitle>Instructors</CardTitle>
            <CardSubtitle></CardSubtitle> 
                <CardText>
                 <Link to={"/instructors"} className="btn btn-primary btn sm">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div> <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
               <CardImg width="100%" src="assets/images/insights.jpg" alt="student" />
            <CardBody>
                <CardTitle>Insights</CardTitle>
            <CardSubtitle></CardSubtitle> 
                <CardText>
                 <Link to={"/insights"} className="btn btn-primary btn sm">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
               <CardImg width="100%" src="assets/images/scholarship.png" alt="student" />
            <CardBody>
                <CardTitle>Scholarship</CardTitle>
            <CardSubtitle></CardSubtitle> 
                <CardText>
                 <Link to={"/insights"} className="btn btn-primary btn sm">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div>
            </React.Fragment>
       );
 
    }
const Dashboard = () => {

    
       
    const dashItem = <RenderDash/>
        
            if (dashItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

                <div className='row'>
                   {dashItem}
            </div>
            </div>
            )
        }
 


export default Dashboard;
