import React, { useState} from 'react';
import { Card, CardImg, CardText, CardBody,CardImgOverlay,
    CardTitle, Breadcrumb, BreadcrumbItem,  Button, Modal, ModalHeader, ModalBody,CardSubtitle,
    Form, FormGroup, Input, Label,Col } from 'reactstrap';
import { Link,useHistory } from 'react-router-dom';
import axios from 'axios';
import { FadeTransform, Fade, Stagger } from 'react-animation-components';

function RenderStudent({ student,loading,items}) {
      if (loading) {
           return <img width="100%" src="assets/images/loading.gif" alt="loading"/>
        }
        if (student != null) {
            return (
                <div className="container">
                <div className="row">
                    <Breadcrumb>
                        <BreadcrumbItem><Link to="/studentList">Student List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>{student.fullname}</BreadcrumbItem>
                    </Breadcrumb>
                    <div className="col-12">
                            <h3>{student.title}</h3>
                        <hr />
                    </div>                
                </div>
                <div className="row">
                    <div className='col-12 col-md-3 m-1'>
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
function RenderCourse({items,loading}) {
    var data = "";

          if (loading) {
            data =  <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
        else {
            return (
                data =
                <React.Fragment>
              <div className="col-12 col-md-3 mt-5">
                   <h4>Enrolled Course</h4>
                   <Card className="m-3">
               <CardImg width="100%" src={items.image} alt={items.c_name} />
            <CardBody>
                <CardTitle>{items.c_name}</CardTitle>
            <CardSubtitle>{items.type}</CardSubtitle> 
            <CardText>
            </CardText>
            </CardBody>
                    </Card>
                    </div>
                    </React.Fragment>);
 
      
    }

    return (
        <div className="container">
            <div className="row">
                    {data}
            </div>
        </div>
        
    )

}

const ViewStudent = (props) => {

    const student = props.students;
    const [courses,setCourses] = useState(props.courses);
    const loading = props.loading;
    console.log(props.courses);
  
    const studentItem = <RenderStudent student={student} loading={loading} />
        
            if (studentItem == null) {
                return (<div></div>);
            }
    return (
            <div className="container">

                <div className='row'>
                   {studentItem}
            <RenderCourse items={props.courses} loading={loading}/>
            </div>

            </div>
            )
        }
 


export default ViewStudent;
