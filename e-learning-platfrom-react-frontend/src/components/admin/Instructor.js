import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,FormGroup,Row,Col,Input,Label,Breadcrumb,BreadcrumbItem,Button,
} from 'reactstrap';
    
function RenderCard({items,status,loading,DeleteInstructor,DeactivateInstructor,ActivateInstructor}) {
    var data = "";

          if (loading) {
            data =  <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
        else {
            data = items.map((item) => {
            return (
              <div className="col-12 col-md-3">
                   
                   <Card className="m-3">
               <CardImg width="100%" src={item.image} alt={item.username} />
            <CardBody>
                <CardTitle>{item.fullname}</CardTitle>
            <CardSubtitle>{item.address}</CardSubtitle> 
            <CardText>
            <Link to={`/admin/viewInstructor/${item.i_id}`} className="btn btn-primary btn-md">View</Link>
                                {status === "Deactivate" ? <React.Fragment> <Button type="button" onClick={(e) => DeactivateInstructor(e, item.i_id)} className='btn btn-md btn-danger m-1'>{status}</Button>
            <Link to={`/admin/editInstructor/${item.i_id}`} className="btn btn-success btn-md">Edit</Link> </React.Fragment>
                                    : <React.Fragment><Button type="button" onClick={(e) => ActivateInstructor(e, item.i_id)} className='btn btn-success m-1'>{status}</Button>
                                        <Button type="button" onClick={(e) => DeleteInstructor(e, item.i_id)} className='btn btn-danger'>Delete</Button> </React.Fragment>}
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


function Instructor(props) {
    
    console.log(props.instructors)
    return (
        <div className="container">
                 <Breadcrumb>
                        <BreadcrumbItem><Link to="/instructorList">Instructor List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Instructor</BreadcrumbItem>
                    </Breadcrumb>
            <div className="row align-items">
                <div className="col-6 col-md m-1">
                    <Link to={'addInstructor'} className="btn btn-primary btn sm">Add Instructor</Link>
                      
                </div>
                       <div className="col-6 col-md m-1">
                    <label className="search-label" htmlFor="search-input">
					<input
						type="text"
						value=""
						id="search-input"
						placeholder="Search Instructor..."
					/>
					<i className="fa fa-search search-icon"/>
				</label>
                </div>
            </div>
            <div className="row align-items">
               
                <RenderCard items={props.instructors} status={props.status} loading={props.loading} DeleteInstructor={props.DeleteInstructor} DeactivateInstructor={props.DeactivateInstructor} ActivateInstructor={props.ActivateInstructor}/>
            </div>
        </div>
    );
    }

 
export default Instructor;
