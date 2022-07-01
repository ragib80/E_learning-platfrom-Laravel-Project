import React, { useEffect, useState } from 'react';
import { Breadcrumb, BreadcrumbItem, Button, Form, FormGroup, Label, Input, Col, Row, FormFeedback,Card, CardImg, CardText, CardBody,
    CardTitle,  CardSubtitle} from 'reactstrap';
import axios from 'axios';
import { useParams } from 'react-router-dom';
import { useHistory } from 'react-router-dom';
import { Link } from 'react-router-dom';



function RenderStudent({ student, loading,handleInputChange,handleSubmit,msg }) {
    if (loading) {
        return <img width="100%" src="assets/images/loading.gif" alt="loading" />
    }
    else {
        if (student != null) {
            return (

                <div className="container">
                    <div className="row">
                        <Breadcrumb>
                            <BreadcrumbItem><Link to="/studentList">student List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{student.fullname}</BreadcrumbItem>
                        </Breadcrumb>
                        <div className="col-12">
                            <h3>Edit student</h3>
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
                                            value={student.fullname}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>
                                <FormGroup row>
                                    <Label htmlFor="address" md={2}>Address</Label>
                                    <Col md={10}>
                                        <Input type="text" id="address" name="address"
                                            placeholder="Address"
                                            value={student.address}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>
                                <FormGroup row>
                                    <Label htmlFor="country" md={2}>Country</Label>
                                    <Col md={10}>
                                        <Input type="text" id="country" name="country"
                                            placeholder="Country"
                                            value={student.country}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>
                                <FormGroup row>
                                    <Label htmlFor="phone_name" md={2}>Phone</Label>
                                    <Col md={10}>
                                        <Input type="text" id="p_num" name="p_num"
                                            placeholder="Phone"
                                            value={student.p_num}
                                            onChange={handleInputChange} />
                                    </Col>
                                </FormGroup>     
                                <FormGroup row>
                                    <Label htmlFor="course_id" md={2}>Course Id</Label>
                                    <Col md={10}>
                                        <Input type="text" id="c_id" name="c_id"
                                            placeholder="Course Id"
                                            value={student.c_id}
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
                                <CardImg width="100%" src={student.image} alt={student.username} />
                                <CardBody>
                                    <CardTitle>{student.fullname}</CardTitle>
                                   <CardSubtitle>{student.address}</CardSubtitle> 
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
           if (student == null) {
            return (<div></div>)
        }
    }
const AddStudent = (props) => {
    const { id } = useParams();
    const [student, setStudent] = useState(props.students);
    const history = useHistory();
    const [loading, setLoading] = useState(props.loading);
    const [msg, setMessage] = useState('');


    const handleInputChange = (e) => {
        const attr = e.target.name;
        const val = e.target.value;
        setStudent({ ...student, [attr]: val });
    }
    const handleSubmit = (e) => {
        e.preventDefault();
   
        axios.put(`http://127.0.0.1:8000/api/admin/student/edit/${id}`, student)
            .then(response => {
                setMessage("updated")
              

            }).catch((err) => {
                setMessage("error")
            })
            history.push('/studentList');

        }

    const studentItem = <RenderStudent student={student} loading={loading} handleInputChange={handleInputChange} handleSubmit={handleSubmit} msg={msg} />
        
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

export default AddStudent;
