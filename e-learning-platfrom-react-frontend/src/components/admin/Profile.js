import React, { useState,useEffect} from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,
    CardTitle, Breadcrumb, BreadcrumbItem,  Button, Modal, ModalHeader, ModalBody,CardSubtitle,
    Form, FormGroup, Input, Label,Col } from 'reactstrap';
import { Link,useHistory } from 'react-router-dom';
import axios from 'axios';
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
                        <BreadcrumbItem><Link to="/courseList">Course List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{course.c_name}</BreadcrumbItem>
                    </Breadcrumb>
                    <div className="col-12">
                            <h3>{course.c_name}</h3>
                        <hr />
                    </div>                
                </div>
                <div className="row">
                        <div className='col-12 col-md-5 m-1'>
                                                                    <FadeTransform in transformProps={{
                    exitTransform: 'scale(0.5) translateY(-50%)'
                }}>
                                <img width="100%" src={course.image} alt={course.c_name} />
                                </FadeTransform>
                        </div>
                        <div className='col-12 col-md-5 m-1'>
                                <CardBody>
                                 <Stagger in>
                                    <Fade in>
                                <CardTitle>{course.c_name}</CardTitle>
                                <CardText> {course.type}
                                </CardText>   <CardText> 
                                    {course.enrolled}
                                </CardText>   <CardText> 
                                    {course.status}
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


const Profile = (props) => {
    const rememberMe = localStorage.getItem('rememberMe') === 'true';
    const email = localStorage.getItem('email');

    console.log(email);

    const student = props.students;
    const [courses,setCourses] = useState(props.courses);
    const loading = props.loading;
    console.log(props.courses);

    useEffect(() => {
    const loadUser= async()=> await axios.get('http://localhost:8000/api/admin/course/list')
        .then(response => {
            setCourses(response.data.courses);
        });
      
            loadUser();
        }, [])
  
    const profileItem = <RenderProfile student={student} loading={loading} />
        
            if (profileItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

                <div className='row'>
                   {profileItem}
            <RenderCourse items={props.courses} loading={loading}/>
            </div>

            </div>
            )
        }
 


export default Profile;
