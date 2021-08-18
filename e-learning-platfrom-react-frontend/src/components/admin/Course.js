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
               <CardImg width="100%" src={item.image} alt={item.c_name} />
            <CardBody>
                <CardTitle>{item.c_name}</CardTitle>
            {item.type ? <CardSubtitle>{item.type}</CardSubtitle> : null }
                                 <CardText>
                            <Link to={`admin/viewCourse/${item.c_id}`} className="btn btn-primary btn sm">View</Link>|
                            <button type="button" onClick={(e) => this.deleteStudent(e, item.c_id)} className='btn btn-danger btn-sm'>Deactivate</button>
                            
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
