import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,Breadcrumb,BreadcrumbItem,Button,
} from 'reactstrap';
    
function RenderCard({items,loading,status,DeleteCourse,DeactivateCourse,ActivateCourse}) {
    var data = "";

          if (loading) {
            data = <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
        else {
            data = items.map((item) => {
            return (
                <div className="col-12 col-md-4">
                
        <Card className="m-3">
               <CardImg width="100%" src={item.image} alt={item.c_name} />
            <CardBody>
                <CardTitle>{item.c_name}</CardTitle>
            {item.type ? <CardSubtitle>{item.type}</CardSubtitle> : null }
                                 <CardText>
                            <Link to={`/admin/viewCourse/${item.c_id}`} className="btn btn-primary btn sm">View</Link>
                                {status === "Deactivate" ? <Button type="button" onClick={(e) => DeactivateCourse(e, item.c_id)} className='btn btn-danger m-2'>{status}</Button>
                                    : <React.Fragment><Button type="button" onClick={(e) => ActivateCourse(e, item.c_id)} className='btn btn-success m-1'>{status}</Button> 
                                <Button type="button" onClick={(e) => DeleteCourse(e, item.c_id)} className='btn btn-danger'>Delete</Button> </React.Fragment>}
                            
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
                        <BreadcrumbItem><Link to="/courseList">Course List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Course</BreadcrumbItem>
                    </Breadcrumb>
                <RenderCard items={props.courses} loading={props.loading} status={props.status} DeleteCourse={props.DeleteCourse}  DeactivateCourse={props.DeactivateCourse} ActivateCourse={props.ActivateCourse}/>
            </div>
        </div>
    );
    }

 
export default Course;
