import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,Breadcrumb,BreadcrumbItem
} from 'reactstrap';
    
function RenderCard() {
    
    return (
        <React.Fragment>
        <div className="col-12 col-md-4">
                
            <Card className="m-3 p-2">
                <CardImg width="100%" src="assets/images/student-active.png" alt="active student" />
                <CardBody>
                    <CardTitle>Active Students</CardTitle>
                    <CardSubtitle>Here You Can See All Active Students</CardSubtitle>
                    <CardText>
                        <Link to={'/admin/active-student'} className="btn btn-primary btn sm mt-2">View</Link>
                    </CardText>
                </CardBody>
            </Card>
        </div>
            <div className="col-12 col-md-4">
                
            <Card className="m-3 p-2">
                <CardImg width="100%" src="assets/images/student-deactive.png" alt="deactive student" />
                <CardBody>
                    <CardTitle>Deactive Students</CardTitle>
                    <CardSubtitle>Here You Can See All Deactive Students</CardSubtitle>
                    <CardText>
                        <Link to={'/admin/deactive-student'} className="btn btn-primary btn sm mt-2">View</Link>
                            
                    </CardText>
                </CardBody>
            </Card>
            </div>
            </React.Fragment>);
 
}

function StudentList() {
    
    return (
        <div className="container">
            <div className="row align-items-start">
                         <Breadcrumb>
                        <BreadcrumbItem><Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                        <BreadcrumbItem active>Student List</BreadcrumbItem>
                    </Breadcrumb>
            </div>
            <div className="row align-items-start">
                    <RenderCard/>
            </div>
        </div>
    );
    }

 
export default StudentList;
