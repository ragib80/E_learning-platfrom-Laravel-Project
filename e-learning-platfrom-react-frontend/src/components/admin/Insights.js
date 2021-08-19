import React, { useState} from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,CardSubtitle,
    CardTitle, Breadcrumb, BreadcrumbItem,  Button, Modal, ModalHeader, ModalBody,
    Form, FormGroup, Input, Label,Col } from 'reactstrap';
import { Link,useHistory } from 'react-router-dom';
import axios from 'axios';
import { FadeTransform, Fade, Stagger } from 'react-animation-components';
import Donut from '../charts/Donut';
import Bar from '../charts/Bar';
function RenderDash({studentCount,courseCount,instructorCount,stuffCount}) {
    //   if (loading) {
    //        return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
    //     }

    return (
        <React.Fragment>
            <div className="col-12 col-md-12">
            <h1 className="humanist text-center">Insights</h1>
            </div>
            <div className="col-12 col-md-3">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">
            <CardBody>
                            <CardTitle className="display text-center">{courseCount}</CardTitle>
            <CardSubtitle className="text-center">Total Course</CardSubtitle>
                <CardText>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
           </div>
            <div className="col-12 col-md-3">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">

            <CardBody>
                            <CardTitle className="display text-center">{studentCount}</CardTitle>
            <CardSubtitle className="text-center">Total Student</CardSubtitle>
                <CardText>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
            </div>
            <div className="col-12 col-md-3">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">

            <CardBody>
                            <CardTitle className="display text-center">{instructorCount}</CardTitle>
            <CardSubtitle className="text-center">Total Instructor</CardSubtitle>
                <CardText>
            </CardText>
            </CardBody>
                </Card>
                </FadeTransform>
            </div>
            <div className="col-12 col-md-3">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
            <Card className="m-3">

            <CardBody>
                            <CardTitle className="display text-center">{stuffCount}</CardTitle>
            <CardSubtitle className="text-center">Total Stuff</CardSubtitle>
                <CardText>
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
            <CardBody>
                <CardTitle>Course-Student Ratio</CardTitle>
            <div className="section">
          <Donut />
        </div>
            </CardBody>
                    </Card>
                </FadeTransform>
                </div>
                <div className="col-12 col-md-8">
                 <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
                <Card className="m-3">
                     <CardBody>
                         <CardTitle>Course-Enrollment Ratio</CardTitle>
                             <div className="section">
                                <Bar />
                                </div>
                    </CardBody>
                </Card>
                </FadeTransform>
                </div>
            </React.Fragment>
       );

    }
const Insights = (props) => {

    const insightsItem = <RenderDash studentCount={props.studentCount} courseCount={props.courseCount} instructorCount={props.instructorCount} stuffCount={props.stuffCount}/>

            if (insightsItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

            <div className='row'>
            <Breadcrumb>
                    <BreadcrumbItem>
                        <Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Insights</BreadcrumbItem>
            </Breadcrumb>
                   {insightsItem}
            </div>
            </div>
            )
        }



export default Insights;
