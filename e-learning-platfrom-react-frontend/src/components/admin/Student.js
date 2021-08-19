import React, {useState,useEffect} from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,FormGroup,Row,Col,Input,Label,Breadcrumb,BreadcrumbItem,Button,
} from 'reactstrap';
    
function RenderCard({items,status,loading,DeleteStudent,DeactivateStudent,ActivateStudent}) {
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
            <Link to={`/admin/viewStudent/${item.st_id}/${item.c_id}`} className="btn btn-primary btn-md">View</Link>
                                {status === "Deactivate" ? <React.Fragment> <Button type="button" onClick={(e) => DeactivateStudent(e, item.st_id)} className='btn btn-md btn-danger m-1'>{status}</Button>
            <Link to={`/admin/editStudent/${item.st_id}`} className="btn btn-success btn-md">Edit</Link> </React.Fragment>
                                    : <React.Fragment><Button type="button" onClick={(e) => ActivateStudent(e, item.st_id)} className='btn btn-success m-1'>{status}</Button>
                                        <Button type="button" onClick={(e) => DeleteStudent(e, item.st_id)} className='btn btn-danger'>Delete</Button> </React.Fragment>}
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
    // const [items, setItems] = useState([]);
    // const [q, setQ] = useState("");
    //  const [searchParam] = useState(["fullname"]);
    console.log(props.students)
    return (
        <div className="container">
                 <Breadcrumb>
                        <BreadcrumbItem><Link to="/studentList">Student List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Student</BreadcrumbItem>
                    </Breadcrumb>
            {/* <div className="row align-items">
                       <div className="col-6 col-md m-1">
                        <div className="wrapper">
                    <div className="search-wrapper">
                        <label htmlFor="search-form">
                            <input
                                type="search"
                                name="search-form"
                                id="search-form"
                                className="search-input"
                                placeholder="Search for..."
                                value={q}
                                onChange={(e) => setQ(e.target.value)}
                            />
                            <span className="sr-only">Search Students here</span>
                        </label>
                    </div>
                </div>
                </div>
                </div> */}
            <div className="row align-items">
               
                <RenderCard items={props.students} status={props.status} loading={props.loading} DeleteStudent={props.DeleteStudent} DeactivateStudent={props.DeactivateStudent} ActivateStudent={props.ActivateStudent}/>
            </div>
        </div>
    );
    }

 
export default Student;
