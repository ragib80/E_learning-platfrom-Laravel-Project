import React, { useEffect, useState } from 'react';
import { Breadcrumb, BreadcrumbItem, Button, Form, FormGroup, Label, Input, Col, Row, FormFeedback,Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle } from 'reactstrap';
import axios from 'axios';
import { useParams } from 'react-router-dom';
import { useHistory } from 'react-router-dom';
import { Link } from 'react-router-dom';



function RenderCourse({ course, loading,handleInputChange,handleSubmit,msg }) {
      if (loading) {
           return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
      }
    
    else if (course != null) {
        return (

            <div className="container">
                <div className="row">
                    <Breadcrumb>
                        <BreadcrumbItem><Link to="/course">Course List</Link></BreadcrumbItem>
                        <BreadcrumbItem active>{course.name}</BreadcrumbItem>
                    </Breadcrumb>
                    <div className="col-12">
                        <h3>Edit Course</h3>
                        <hr />
                    </div>
                </div>

                <div className="row row-content">
       
                    <div className="col-12 col-md-8">
                        <Form>
                         
                            <h1>{msg}</h1>
                            <FormGroup row>
                                <Label htmlFor="name" md={2}>Name</Label>
                                <Col md={10}>
                                    <Input type="text" id="name" name="name"
                                        placeholder="Name"
                                        value={course.name}
                                        onChange={handleInputChange} />
                                </Col>
                            </FormGroup>
                            <FormGroup row>
                                <Label htmlFor="username" md={2}>User Name</Label>
                                <Col md={10}>
                                    <Input type="text" id="username" name="username"
                                        placeholder="User Name"
                                        value={course.username}
                                        onChange={handleInputChange} />
                                </Col>
                            </FormGroup>
                            <FormGroup row>
                                <Label htmlFor="telnum" md={2}>Contact Tel.</Label>
                                <Col md={10}>
                                    <Input type="tel" id="telnum" name="telnum"
                                        placeholder="Tel. Number"
                                        value={course.telnum}
                                        onChange={handleInputChange} />
                                </Col>
                            </FormGroup>
                            <FormGroup row>
                                <Label htmlFor="email" md={2}>Email</Label>
                                <Col md={10}>
                                    <Input type="email" id="email" name="email"
                                        placeholder="Email"
                                        value={course.email}
                                        onChange={handleInputChange} />
                                </Col>
                            </FormGroup>
                           
                            <FormGroup row>
                                <Col md={{ size: 10, offset: 2 }}>
                                    <Button type="submit" color="primary" onClick={handleSubmit}>
                                        Update
                                    </Button>
                                </Col>
                            </FormGroup>
                        </Form>
                    </div>
                    <div className="col-12 col-md-4">
                        <Card className="mr-3">
                            <CardImg width="100%" src={course.image} alt={course.name} />
                            <CardBody>
                                <CardTitle>{course.name}</CardTitle>
                                {course.username ? <CardSubtitle>{course.username}</CardSubtitle> : null}
                                <CardText>

                                </CardText>
                            </CardBody>
                        </Card>
                   
                    </div>
                </div>
            </div>
             
        )
    }
           if (course == null) {
            return (<div></div>)
        }
    }
const AddCourse = (props) => {
    const { id } = useParams();
    const [course, setCourse] = useState(props.courses);
    const history = useHistory();
    const [loading, setLoading] = useState(props.loading);
    const [msg, setMessage] = useState('');


    const handleInputChange = (e) => {
        const attr = e.target.name;
        const val = e.target.value;
        setCourse({ ...course, [attr]: val });
    }

         const handleSubmit = async(e)=>{
           
            e.preventDefault();
             await axios.put(`http://127.0.0.1:8000/api/editCourse/${id}`, course).then(response => {
                //  setCourse(course);
                // console.log($data);
            setMessage("success")
            console.log(response);
        }).catch((error) => {
            setMessage("error")
        })
        // history.push('/course');

         }
    

    const courseItem = <RenderCourse course={course} loading={loading} handleInputChange={handleInputChange} handleSubmit={handleSubmit} msg={msg} />
        
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

export default AddCourse;
