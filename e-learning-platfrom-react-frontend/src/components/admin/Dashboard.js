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
            <h1 className="humanist text-center" color="primary">Welcome To Dashboard</h1>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3 p-2">
               <CardImg width="100%" height="80%" src="assets/images/students.svg" alt="student" />
            <CardBody>
                <CardTitle>Student</CardTitle>
            <CardSubtitle>Here You Can See All Students Information</CardSubtitle> 
                <CardText>
                 <Link to={"/studentList"} className="btn btn-primary btn-md mt-2">View</Link>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
           </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3 p-2">
               <CardImg width="100%" src="assets/images/course.jpg" alt="course" />
            <CardBody>
                <CardTitle>Course</CardTitle>
            <CardSubtitle>Here You Can See All Courses Information</CardSubtitle> 
                <CardText>
                 <Link to={"/courseList"} className="btn btn-primary btn-md mt-2">View</Link>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3 p-2">
               <CardImg width="100%" src="assets/images/employee.jpg" alt="stuff" />
            <CardBody>
                <CardTitle>Stuff</CardTitle>
            <CardSubtitle>Here You Can See All Stuff Information</CardSubtitle> 
                <CardText>
                 <Link to={"/stuff"} className="btn btn-primary btn-md mt-2">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3 p-2">
               <CardImg width="100%" src="assets/images/instructor.jpg" alt="instructor" />
            <CardBody>
                <CardTitle>Instructors</CardTitle>
            <CardSubtitle>Here You Can See All Instructors Information</CardSubtitle> 
                <CardText>
                 <Link to={"/instructorList"} className="btn btn-primary btn-md mt-2">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div> <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3 p-2">
               <CardImg width="100%" src="assets/images/insights.jpg" alt="insights" />
            <CardBody>
                <CardTitle>Insights</CardTitle>
            <CardSubtitle>Here You Can See Insights of Application</CardSubtitle> 
                <CardText>
                 <Link to={"/insights"} className="btn btn-primary btn-md mt-2">View</Link>
            </CardText>
            </CardBody>
                    </Card>
                    </FadeTransform>
            </div>
            <div className="col-12 col-md-4">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3 p-2">
               <CardImg width="100%" src="assets/images/scholarship.jpg" alt="scholarship" />
            <CardBody>
                <CardTitle>Scholarship</CardTitle>
            <CardSubtitle>Here You Can See All Students Scholarship Request</CardSubtitle> 
                <CardText>
                 <Link to={"/scholarship"} className="btn btn-primary btn-md mt-2">View</Link>
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
    <div style={{
      backgroundImage: `url(${process.env.PUBLIC_URL
          + "assets/images/background1.svg"})`,
      height: "100%", backgroundRepeat: "no-repeat"
    }} >
                <div className='row'>
                   {dashItem}
            </div>
            </div>
    </div>
            )
        }
 


export default Dashboard;
