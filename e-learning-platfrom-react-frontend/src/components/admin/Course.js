import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,Breadcrumb,BreadcrumbItem
} from 'reactstrap';
    
function RenderCard({items,loading}) {
    var data = "";

          if (loading) {
            data = <img width="100%" src="assets/images/loading.gif" alt="loading"/>
        }
        else {
            data = items.map((item) => {
            return (
                <div className="col-12 col-md-3">
                
        <Card className="m-3">
               <CardImg width="100%" src={item.image} alt={item.name} />
            <CardBody>
                <CardTitle>{item.name}</CardTitle>
            {item.designation ? <CardSubtitle>{item.designation}</CardSubtitle> : null }
                                 <CardText>
                            <Link to={`viewCourse/${item.id}`} className="btn btn-primary btn sm">View</Link>|
                            <button type="button" onClick={(e) => this.deleteStudent(e, item.id)} className='btn btn-danger btn-sm'>Deactivate</button>
                            
            </CardText>
            </CardBody>
        </Card>
            </div>);
 
        });
    }

    return (
        <div className="container">
            <div className="row">
                    {data}
            </div>
        </div>
        
    )

}

function Course(props) {
    
    console.log(props.courses)
    return (
        <div className="container">
            <div className="row align-items-start">
                         <Breadcrumb>
                        <BreadcrumbItem><Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Course</BreadcrumbItem>
                    </Breadcrumb>
                    <RenderCard items={props.courses} loading={props.loading} />
            </div>
        </div>
    );
    }

 
export default Course;
