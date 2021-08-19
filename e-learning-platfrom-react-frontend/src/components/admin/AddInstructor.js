import React, { useEffect, useState } from 'react';
import { Breadcrumb, BreadcrumbItem, Button, Form, FormGroup, Label, Input, Col, Row, FormFeedback,Card, CardImg, CardText, CardBody,
    CardTitle,  CardSubtitle} from 'reactstrap';
import axios from 'axios';
import { useParams } from 'react-router-dom';
import { useHistory } from 'react-router-dom';
import { Link } from 'react-router-dom';



function RenderInstructor({ instructor, loading,handleInputChange,handleSubmit,msg }) {
    if (loading) {
        return <img width="100%" src="assets/images/loading.gif" alt="loading" />
    }
    else {
        if (instructor != null) {
            return (

                <div className="container">
                    <div className="row">
                        <Breadcrumb>
                            <BreadcrumbItem><Link to="/instructorList">instructor List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{instructor.fullname}</BreadcrumbItem>
                        </Breadcrumb>
                        <div className="col-12">
                            <h3>Edit instructor</h3>
                            <hr />
                        </div>
                    </div>

                    <div className="row row-content">
       
                        <div className="col-12 col-md-8">
                            <Form>
                         
                                <h1>{msg}</h1>
                                <FormGroup row>
                                    <Label htmlFor="fullname" md={2}>Full Name</Label>
                                    <Col md={10}>
                                        <Input type="text" id="fullname" name="fullname"
                                            placeholder="Full Name"
                                            value={instructor.fullname}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>
                                <FormGroup row>
                                    <Label htmlFor="address" md={2}>Address</Label>
                                    <Col md={10}>
                                        <Input type="text" id="address" name="address"
                                            placeholder="Address"
                                            value={instructor.address}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>
                                <FormGroup row>
                                    <Label htmlFor="country" md={2}>Country</Label>
                                    <Col md={10}>
                                        <Input type="text" id="country" name="country"
                                            placeholder="Country"
                                            value={instructor.country}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>
                                <FormGroup row>
                                    <Label htmlFor="phone_name" md={2}>Phone</Label>
                                    <Col md={10}>
                                        <Input type="text" id="p_num" name="p_num"
                                            placeholder="Phone"
                                            value={instructor.p_num}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>     
                                <FormGroup row>
                                    <Label htmlFor="course_id" md={2}>Course Id</Label>
                                    <Col md={10}>
                                        <Input type="text" id="c_id" name="c_id"
                                            placeholder="Course Id"
                                            value={instructor.c_id}
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
                                <CardImg width="100%" src={instructor.image} alt={instructor.username} />
                                <CardBody>
                                    <CardTitle>{instructor.fullname}</CardTitle>
                                   <CardSubtitle>{instructor.address}</CardSubtitle> 
                                    <CardText>

                                    </CardText>
                                </CardBody>
                            </Card>
                   
                        </div>
                    </div>
                </div>
             
            )
        }
    }
           if (instructor == null) {
            return (<div></div>)
        }
    }
const AddInstructor = (props) => {
    const { id } = useParams();
    const [instructor, setInstructor] = useState(props.instructors);
    const history = useHistory();
    const [loading, setLoading] = useState(props.loading);
    const [msg, setMessage] = useState('');


    const handleInputChange = (e) => {
        const attr = e.target.name;
        const val = e.target.value;
        setInstructor({ ...instructor, [attr]: val });
    }
    const handleSubmit = (e) => {
        e.preventDefault();
   
        axios.post(`http://127.0.0.1:8000/api/admin/instructor/edit/${id}`, instructor)
            .then(response => {
                setMessage("updated")
              
                history.push('/instructorList');

            }).catch((error) => {
                setMessage("error")
            })

        }

    const instructorItem = <RenderInstructor instructor={instructor} loading={loading} handleInputChange={handleInputChange} handleSubmit={handleSubmit} msg={msg} />
        
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

export default AddInstructor;
