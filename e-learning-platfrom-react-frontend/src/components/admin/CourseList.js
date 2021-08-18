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
                <CardImg width="100%" src="assets/images/active_course.jpg" alt="active course" />
                <CardBody>
                    <CardTitle>Active Courses</CardTitle>
                    <CardSubtitle>Here You Can See All Active Courses</CardSubtitle>
                    <CardText>
                        <Link to={'/admin/active-course'} className="btn btn-primary btn sm">View</Link>
                            
                    </CardText>
                </CardBody>
            </Card>
        </div>
            <div className="col-12 col-md-4">
                
            <Card className="m-3 p-2">
                <CardImg width="100%" src="assets/images/deactive-course.jpg" alt="active course" />
                <CardBody>
                    <CardTitle>Deactive Courses</CardTitle>
                    <CardSubtitle>Here You Can See All Deactive Courses</CardSubtitle>
                    <CardText>
                        <Link to={'/admin/deactive-course'} className="btn btn-primary btn sm">View</Link>
                            
                    </CardText>
                </CardBody>
            </Card>
            </div>
            </React.Fragment>);
 
}

function CourseList() {
    
    return (
        <div className="container">
            <div className="row align-items-start">
                         <Breadcrumb>
                        <BreadcrumbItem><Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Course List</BreadcrumbItem>
                    </Breadcrumb>
            </div>
            <div className="row align-items-start">
                    <RenderCard/>
            </div>
        </div>
    );
    }

 
export default CourseList;
