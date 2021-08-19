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
                <CardImg width="100%" src="assets/images/instructor-active.png" alt="active instructor" />
                <CardBody>
                    <CardTitle>Active Instructors</CardTitle>
                    <CardSubtitle>Here You Can See All Active Instructors</CardSubtitle>
                    <CardText>
                        <Link to={'/admin/active-instructor'} className="btn btn-primary btn sm mt-2">View</Link>
                    </CardText>
                </CardBody>
            </Card>
        </div>
            <div className="col-12 col-md-4">
                
            <Card className="m-3 p-2">
                <CardImg width="100%" src="assets/images/instructor-deactive.png" alt="deactive instructor" />
                <CardBody>
                    <CardTitle>Deactive Instructors</CardTitle>
                    <CardSubtitle>Here You Can See All Deactive Instructors</CardSubtitle>
                    <CardText>
                        <Link to={'/admin/deactive-instructor'} className="btn btn-primary btn sm mt-2">View</Link>
                            
                    </CardText>
                </CardBody>
            </Card>
            </div>
            </React.Fragment>);
 
}

function InstructorList() {
    
    return (
        <div className="container">
            <div className="row align-items-start">
                         <Breadcrumb>
                        <BreadcrumbItem><Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                        <BreadcrumbItem active>Instructor List</BreadcrumbItem>
                    </Breadcrumb>
            </div>
            <div className="row align-items-start">
                    <RenderCard/>
            </div>
        </div>
    );
    }

 
export default InstructorList;
