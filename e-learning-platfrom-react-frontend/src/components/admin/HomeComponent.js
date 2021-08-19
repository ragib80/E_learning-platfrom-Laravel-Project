import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,Button,
    CardTitle, CardSubtitle,Jumbotron
} from 'reactstrap';
import { FadeTransform } from 'react-animation-components';

    
function RenderCourse({items,loading,status,DeleteCourse,DeactivateCourse,ActivateCourse}) {
    var data = "";

          if (loading) {
            data = <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

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
function RenderStudent({items,status,loading,DeleteStudent,DeactivateStudent,ActivateStudent}) {
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
            <Link to={`/admin/viewStudent/${item.st_id}`} className="btn btn-primary btn-md">View</Link>
                                {status === "Deactivate" ? <React.Fragment> <Button type="button" onClick={(e) => DeactivateStudent(e, item.c_id)} className='btn btn-md btn-danger m-1'>{status}</Button>
            <Link to={`/admin/editStudent/${item.st_id}`} className="btn btn-success btn-md">Edit</Link> </React.Fragment>
                                    : <React.Fragment><Button type="button" onClick={(e) => ActivateStudent(e, item.c_id)} className='btn btn-success m-1'>{status}</Button>
                                        <Button type="button" onClick={(e) => DeleteStudent(e, item.c_id)} className='btn btn-danger'>Delete</Button> </React.Fragment>}
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
function RenderInstructor({items,status,loading,DeleteInstructor,DeactivateInstructor,ActivateInstructor}) {
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
    function Home(props) {
        console.log(props.students);
    return (
            <div>
            <Jumbotron>
                <div className="container">
                        <div className="row row-header">
                            <div className="col-12 col-sm-6">
                                <h1 className="humanist">E-Learning</h1>
                                <p className="humanist">A learning system based on formalised teaching but with the help of electronic resources is known as E-learning. While teaching can be based in or out of the classrooms, the use of computers and the Internet forms the major component of E-learning. E-learning can also be termed as a network enabled transfer of skills and knowledge, and the delivery of education is made to a large number of recipients at the same or different times. Earlier, it was not accepted wholeheartedly as it was assumed that this system lacked the human element required in learning.</p>
                            </div>
                            <div className="col-12 col-sm-6">
                                <img src='assets/images/preview.svg' width="100%" alt='Student Portal' />
                            </div>
                        </div>
                    </div>
                </Jumbotron>
                <div className="container">
                <div className="mb-1" style={{
                    backgroundImage: `url(${process.env.PUBLIC_URL
          + "assets/images/background2.svg"})`,
          width: "100%", backgroundRepeat: "no-repeat", backgroundPosition: "center",backgroundAttachment: "fixed",backgroundSize:"cover",
       
    }} >
                    <div className="row align-items">
                            <h1 className="humanist pl-3">Courses</h1>
                <RenderCourse items={props.courses} loading={props.loading} status={props.status} DeleteCourse={props.DeleteCourse}  DeactivateCourse={props.DeactivateCourse} ActivateCourse={props.ActivateCourse}/>
                        
                     </div>
                    <div className="row align-items">
                            <h1  className="humanist pl-3">Students</h1>
                <RenderStudent items={props.students} status={props.status} loading={props.loading} DeleteStudent={props.DeleteStudent} DeactivateStudent={props.DeactivateStudent} ActivateStudent={props.ActivateStudent}/>
                        
                    </div>
                    <div className="row align-items">
                            <h1  className="humanist pl-3">Instructors</h1>
                <RenderInstructor items={props.instructors} status={props.status} loading={props.loading} DeleteInstructor={props.DeleteInstructor} DeactivateInstructor={props.DeactivateInstructor} ActivateInstructor={props.ActivateInstructor}/>
                        
                    </div>

            </div>
            </div>
    </div>
    );
    }

 
export default Home;
