import React from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,Jumbotron
} from 'reactstrap';
import { FadeTransform } from 'react-animation-components';
function RenderCourse({items,loading}) {
    var course = "";

        if (loading) {
            course =
                 <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>
               
        }
        else {
            course = items.map((item) => {
                return (
                    <div className="col-12 col-md-3">
                         <FadeTransform
                            in
                            transformProps={{
                                exitTransform: 'scale(0.5) translateY(-50%)'
                            }}>
                    <Card className="m-3">
               <CardImg width="100%" src={item.image} alt={item.c_name} />
            <CardBody>
                <CardTitle>{item.c_name}</CardTitle>
            {item.type ? <CardSubtitle>{item.type}</CardSubtitle> : null }
                        <CardText>
                                    <Link to={`viewCourse/${item.c_id}`} className="btn btn-primary btn sm">View</Link>|
                                     <Link to={`editCourse/${item.c_id}`} className="btn btn-success btn sm">Edit</Link>|
                      <button type="button" onClick={(e) => this.deleteStudent(e, item.id)} className='btn btn-danger btn-sm'>Delete</button>                
            </CardText>
            </CardBody>
        </Card>
                    </FadeTransform>
                </div>);
 
        });
    }

    return (
        <div className="container">
            <div className="row">
                    {course}
            </div>
        </div>
        
        )
        
}
function RenderStudent({ items, loading }) {
    var student = "";

        if (loading) {
            student = <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
        else {
            student = items.map((item) => {
                return (
                    <div className="col-12 col-md-3">
                           <FadeTransform
                            in
                            transformProps={{
                                exitTransform: 'scale(0.5) translateY(-50%)'
                            }}>
                    <Card className="m-3">
               <CardImg width="100%" src={item.image} alt={item.username} />
            <CardBody>
                <CardTitle>{item.fullname}</CardTitle>
            <CardSubtitle>{item.address}</CardSubtitle> 
                        <CardText>
                                    <Link to={`/admin/viewStudent/${item.st_id}`} className="btn btn-primary btn sm">View</Link>|
                                     <Link to={`/admin/editStudent/${item.st_id}`} className="btn btn-success btn sm">Edit</Link>|
                      <button type="button" onClick={(e) => this.deleteStudent(e, item.id)} className='btn btn-danger btn-sm'>Delete</button>                
            </CardText>
            </CardBody>
                            </Card>
                            </FadeTransform>
                        </div>);
 
        });
    }

    return (
        <div className="container">
            <div className="row">
                    {student}
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
                    <div className="row align-items">
                            <h1 className="humanist">Courses</h1>
                            <RenderCourse items={props.courses} loading={props.loading} />
                        
                     </div>
                    <div className="row align-items">
                            <h1  className="humanist">Students</h1>
                            <RenderStudent items={props.students} loading={props.loading} />
                        
                    </div>
            </div>
            </div>
    
    );
    }

 
export default Home;
