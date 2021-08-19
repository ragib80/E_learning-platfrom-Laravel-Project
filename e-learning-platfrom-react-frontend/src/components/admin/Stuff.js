import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,FormGroup,Row,Col,Input,Label,Breadcrumb,BreadcrumbItem,Button,
} from 'reactstrap';
    
function RenderCard({items,loading,DeleteStuff}) {
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
            <Link to={`/admin/viewStuff/${item.stf_id}`} className="btn btn-primary btn-md">View</Link>
            <Link to={`/admin/editStuff/${item.stf_id}`} className="btn btn-success btn-md">Edit</Link> 
            <Button type="button" onClick={(e) => DeleteStuff(e, item.stf_id)} className='btn btn-danger'>Delete</Button>
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


function Stuff(props) {
    
    console.log(props.stuffs)
    return (
        <div className="container">
                 <Breadcrumb>
                        <BreadcrumbItem><Link to="/stuffList">Stuff List</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Stuff</BreadcrumbItem>
                    </Breadcrumb>
            <div className="row align-items">
                <div className="col-6 col-md m-1">
                    <Link to={'addStuff'} className="btn btn-primary btn sm">Add Stuff</Link>
                      
                </div>
                       <div className="col-6 col-md m-1">
                    <label className="search-label" htmlFor="search-input">
					<input
						type="text"
						value=""
						id="search-input"
						placeholder="Search Stuff..."
					/>
					<i className="fa fa-search search-icon"/>
				</label>
                </div>
            </div>
            <div className="row align-items">
                <RenderCard items={props.stuffs} loading={props.loading} DeleteStuff={props.DeleteStuff}/>
            </div>
        </div>
    );
    }

 
export default Stuff;
