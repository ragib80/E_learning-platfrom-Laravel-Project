import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,FormGroup,Row,Col,Input,Label,Breadcrumb,BreadcrumbItem
} from 'reactstrap';
    
function RenderCard({items,loading,DeleteStudent}) {
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
            <Link to={`/admin/viewStudent/${item.st_id}`} className="btn btn-primary btn sm">View</Link>|
            <Link to={`/admin/editStudent/${item.st_id}`} className="btn btn-success btn sm">Edit</Link>|
            <button type="button" onClick={(e) => DeleteStudent(e, item.st_id)} className='btn btn-danger btn-sm'>Delete</button>                
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


function Student(props) {
    
    console.log(props.students)
    return (
        <div className="container">
                 <Breadcrumb>
                        <BreadcrumbItem><Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Student</BreadcrumbItem>
                    </Breadcrumb>
            <div className="row align-items">
                <div className="col-6 col-md m-1">
                    <Link to={'addStudent'} className="btn btn-primary btn sm">Add Student</Link>
                      
                </div>
                       <div className="col-6 col-md m-1">
                    <label className="search-label" htmlFor="search-input">
					<input
						type="text"
						value=""
						id="search-input"
						placeholder="Search Student..."
					/>
					<i className="fa fa-search search-icon"/>
				</label>
                </div>
            </div>
            <div className="row align-items">
               
                <RenderCard items={props.students} loading={props.loading} DeleteStudent={props.DeleteStudent}/>
            </div>
        </div>
    );
    }

 
export default Student;
