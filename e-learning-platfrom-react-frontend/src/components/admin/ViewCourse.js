import React from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,
    CardTitle, Breadcrumb, BreadcrumbItem } from 'reactstrap';
import { Link } from 'react-router-dom';
import { FadeTransform, Fade, Stagger } from 'react-animation-components';



function RenderCourse({ course,loading }) {
      if (loading) {
           return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
        }
        if (course != null) {
            return (
                <div className="container">
                <div className="row">
                    <Breadcrumb>
                        <BreadcrumbItem><Link to="/course">Course</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{course.name}</BreadcrumbItem>
                    </Breadcrumb>
                    <div className="col-12">
                            <h3>{course.name}</h3>
                        <hr />
                    </div>                
                </div>
                <div className="row">
                        <div className='col-12 col-md-5 m-1'>
                                                                    <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
                                <img width="100%" src={course.image} alt={course.name} />
                                </FadeTransform>
                        </div>
                        <div className='col-12 col-md-5 m-1'>
                                <CardBody>
                                 <Stagger in>
                                    <Fade in>
                                <CardTitle>{course.name}</CardTitle>
                                <CardText> {course.username}
                                </CardText>   <CardText> 
                                    {course.email}
                                </CardText>   <CardText> 
                                    {course.telnum}
                                </CardText>  
                                    </Fade>
                                </Stagger>
                                </CardBody>
                    </div>
                    </div>
                    </div>

            );
    }
    
        if (course == null) {
            return (<div></div>)
        }
    }

const ViewCourse= (props)=>{
        
    
    const course = props.courses
    const loading = props.loading
    const courseItem = <RenderCourse course={course} loading={ loading} />
        
            if (courseItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

                <div className='row'>
                   {courseItem}
            </div>
            </div>
            )
        }
 


export default ViewCourse;
