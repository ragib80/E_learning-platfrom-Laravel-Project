import React, { useState,useEffect } from 'react';
import Home from './HomeComponent';
import Header from './HeaderComponent';
import Footer from './FooterComponent';
import Contact from './ContactComponent';
import { Switch, Route, Redirect,useParams,useLocation, useHistory } from 'react-router-dom';
import About from "./AboutComponent";
import Course from "./Course";
import Stuff from "./Stuff";
import ViewCourse from './ViewCourse';
import ViewStudent from './ViewStudent';
import ViewInstructor from './ViewInstructor';
import AddInstructor from "./AddInstructor";
import AddStudent from "./AddStudent";
import AddStuff from "./AddStuff";
import axios from "axios";
import Student from './Student';
import Instructor from './Instructor';
import { TransitionGroup, CSSTransition } from 'react-transition-group';
import Dashboard from './Dashboard';
import Insights from './Insights';
import Scholarship from './Scholarship';
import CourseList from './CourseList';
import StudentList from './StudentList';
import InstructorList from './InstructorList';
import { LEADERS } from "../shared/leaders";

function Main(){
    const [courses, setCourses] = useState([]);
    const [leaders, setLeaders] = useState(LEADERS);
    const [students, setStudents] = useState([]);
    const [stuffs, setStuffs] = useState([]);
    const [instructors, setInstructors] = useState([]);
    const [scholarships, setScholarship] = useState([]);
    const [loading, setLoading] = useState(true);
    const [msg, setMessage] = useState('');
    const { id } = useParams();
    const [text, setText] = useState('')
    const [studentCount, setStudentCount] = useState(0)
    const [courseCount, setCourseCount] = useState(0)
    const [instructorCount, setInstructorCount] = useState(0)
    const [stuffCount, setStuffCount] = useState(0)
    const location = useLocation()
    const history = useHistory()
    
        useEffect(() => {
    const loadCourse = async()=> await axios.get('http://localhost:8000/api/admin/course/list')
        .then(response => {
            setCourses(response.data.courses);
            setLoading(false);
        });
        const loadStudent =()=>axios.get('http://localhost:8000/api/admin/student/list')
        .then(response => {
            setStudents(response.data.students);
            setLoading(false);
        });
        const loadStuff = () => axios.get('http://localhost:8000/api/admin/stuff/list')
        .then(response => {
            setStuffs(response.data.stuffs);
            setLoading(false);
        });
        const loadInstructor = () => axios.get('http://localhost:8000/api/admin/instructor/list')
        .then(response => {
            setInstructors(response.data.instructors);
            setLoading(false);
        });
        const loadScholarship = () => axios.get('http://localhost:8000/api/admin/scholarship/list')
        .then(response => {
            setScholarship(response.data.scholarships);
            setLoading(false);
        });
        const loadCount = () => axios.get('http://localhost:8000/api/admin')
        .then(response => {
            setStudentCount(response.data.students);
            setCourseCount(response.data.courses);
            setInstructorCount(response.data.instructors);
            setStuffCount(response.data.stuffs);
            setLoading(false);
        });
            loadStudent();
            loadStuff();
            loadInstructor();
            loadScholarship();
            loadCourse();
            loadCount();
        }, [])


      const HomePage = () => {
          return (
      
              <Home 
                loading={loading} DeleteCourse={DeleteCourse} DeactivateCourse={DeactivateCourse}
                courses={courses.filter((course) => course.status === "active")}
                status={"Deactivate"} DeleteStudent={DeleteStudent} DeactivateStudent={DeactivateStudent}
                  students={students.filter((student) => student.status === "active")}
                  DeleteInstructor={DeleteInstructor} DeactivateInstructor={DeactivateInstructor}
                instructors={instructors.filter((instructor) => instructor.status === "active")}
              
              />
              
              
              );
            }
    // const EditId = ({match}) => {
    //     return(
    //         <AddCourse courses={courses.filter((course) => course.c_id === parseInt(match.params.id,10))[0]} />
    //         );
    // };
    const EditStudent = ({ match }) => {
        return(
            <AddStudent students={students.filter((student) => student.st_id === parseInt(match.params.id,10))[0]} />
            );
    };
    const EditStuff = ({ match }) => {
        return(
            <AddStuff stuff={stuffs.filter((stuff) => stuff.stf_id === parseInt(match.params.id,10))[0]} />
            );
    };
    const EditInstructor = ({ match }) => {
        return(
            <AddInstructor instructors={instructors.filter((instructor) => instructor.i_id === parseInt(match.params.id,10))[0]} />
            );
        };
    const viewCourse= ({match}) => {
        return(
            <ViewCourse courses={courses.filter((course) => course.c_id === parseInt(match.params.id,10))[0]} loading = {loading}/>
            );
        };
    const viewStudent = ({ match }) => {
        return(
            <ViewStudent students={students.filter((student) => student.st_id === parseInt(match.params.id, 10))[0]} loading={loading}
            courses={courses.filter((course) => course.c_id === parseInt(match.params.id,10))[0]}/>

            );
    };
    const viewStuff = ({ match }) => {
        return(
            <ViewStudent students={stuffs.filter((stuff) => stuff.stf_id === parseInt(match.params.id, 10))[0]} loading={loading}
               />

            );
    };
    const viewInstructor = ({ match }) => {
        return(
            <ViewInstructor instructors={instructors.filter((instructor) => instructor.i_id === parseInt(match.params.id, 10))[0]} loading={loading}
            courses={courses.filter((course) => course.c_id === parseInt(match.params.id,10))[0]}/>

            );
    };
    const DeleteStudent = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deleting...";
        const res = await axios.post(`http://localhost:8000/api/admin/student/delete/${id}`);

        if (res.data.status === 200) {
            
            history.push('/studentList');

        }
    }
    const DeleteStuff = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deleting...";
        const res = await axios.post(`http://localhost:8000/api/admin/stuff/delete/${id}`);

        if (res.data.status === 200) {
            
            history.push('/admin/stuff');

        }
    }
    const DeleteCourse = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deleting...";
        const res = await axios.post(`http://localhost:8000/api/admin/course/delete/${id}`);

        if (res.data.status === 200) {
            
            history.push('/courseList');

        }
    }
    const DeactivateCourse = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deactivating...";
        
        const res = await axios.post(`http://localhost:8000/api/admin/course/deactivate/${id}`);
        
        if (res.data.status === 200) {
           
            history.push({pathname:'/admin/active-course'});

        }
        
    }
    const ActivateCourse = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Activating...";
        const res = await axios.post(`http://localhost:8000/api/admin/course/activate/${id}`);

        if (res.data.status === 200) {
            
            history.push('/admin/deactive-course');

        }
    }
    const viewActiveCourses = ({ match }) => {
        return(
            <Course loading={loading} DeleteCourse={DeleteCourse} DeactivateCourse={DeactivateCourse}
                courses={courses.filter((course) => course.status === "active")}
                status={"Deactivate"}/>

            );
    };
    const viewDeactiveCourses = ({ match }) => {
        return(
            <Course loading={loading} status={"Activate"} DeleteCourse={DeleteCourse} ActivateCourse={ActivateCourse}
            courses={courses.filter((course) => course.status === "deactive")}/>

            );
    };
const DeactivateStudent = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deactivating...";
        const res = await axios.post(`http://localhost:8000/api/admin/student/deactivate/${id}`);

        if (res.data.status === 200) {
            
            history.push('/studentList');

        }
    }
    const ActivateStudent = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Activating...";
        const res = await axios.post(`http://localhost:8000/api/admin/student/activate/${id}`);

        if (res.data.status === 200) {
            
            history.push('/studentList');

        }
    }
    const viewActiveStudent = ({ match }) => {
        return(
            <Student loading={loading} DeleteStudent={DeleteStudent} DeactivateStudent={DeactivateStudent}
                students={students.filter((student) => student.status === "active")}
                status={"Deactivate"}/>

            );
    };
    const viewDeactiveStudent = ({ match }) => {
        return(
            <Student loading={loading} status={"Activate"} DeleteStudent={DeleteStudent} ActivateStudent={ActivateStudent}
            students={students.filter((student) => student.status === "deactive")}/>

            );
    };
    const DeactivateInstructor = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deactivating...";
        const res = await axios.post(`http://localhost:8000/api/admin/instructor/deactivate/${id}`);

        if (res.data.status === 200) {
            
            history.push('/instructorList');

        }
    }
    const ActivateInstructor = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Activating...";
        const res = await axios.post(`http://localhost:8000/api/admin/instructor/activate/${id}`);

        if (res.data.status === 200) {
            
            history.push('/instructorList');

        }
    }
    const viewActiveInstructor = ({ match }) => {
        return(
            <Instructor loading={loading} DeleteInstructor={DeleteInstructor} DeactivateInstructor={DeactivateInstructor}
                instructors={instructors.filter((instructor) => instructor.status === "active")}
                status={"Deactivate"}/>

            );
    };
    const viewDeactiveInstructor = ({ match }) => {
        return(
            <Instructor loading={loading} status={"Activate"} DeleteInstructor={DeleteInstructor} ActivateInstructor={ActivateInstructor}
            instructors={instructors.filter((instructor) => instructor.status === "deactive")}/>

            );
    };
    const DeleteInstructor = async (e, id) => {
    const clicked = e.currentTarget;
    clicked.innerText = "Deleting...";
    const res = await axios.post(`http://localhost:8000/api/admin/instructor/delete/${id}`);

    if (res.data.status === 200) {
        
        history.push('/instructorList');

    }
}
    const AcceptScholarship = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Accepting...";
        const res = await axios.post(`http://localhost:8000/api/admin/scholarship/accept/${id}`);

        if (res.data.status === 200) {
            history.push('/scholarship');

        }
    }
    const RejectScholarship = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Rejecting...";
        const res = await axios.post(`http://localhost:8000/api/admin/scholarship/reject/${id}`);

        if (res.data.status === 200) {
            history.push('/scholarship');

        }
    }

        return (
                    <div>
            <Header />
          <TransitionGroup>
            <CSSTransition key={location.key} classNames="page" timeout={600}>
              <Switch location={location}>
                <Route path='/home' component={HomePage}/>
                <Route  path="/admin/active-course" component={viewActiveCourses} />
                <Route path="/admin/deactive-course" component={viewDeactiveCourses} />
                <Route  path="/admin/active-student" component={viewActiveStudent} />
                <Route path="/admin/deactive-student" component={viewDeactiveStudent} />
                <Route path="/admin/active-instructor" component={viewActiveInstructor} />
                <Route path="/admin/deactive-instructor" component={viewDeactiveInstructor} />
                <Route path="/admin/student" component={() => <Student students={students} loading={loading} DeleteStudent={DeleteStudent}/>}  />
                <Route path="/admin/stuff" component={() => <Stuff stuffs={stuffs} loading={loading} DeleteStuff={DeleteStuff}/>}  />
                <Route exact path="/admin/viewCourse/:id" component={viewCourse}/>
                <Route exact path="/admin/viewStudent/:id/:id" component={viewStudent}/>
                <Route exact path="/admin/viewStuff/:id" component={viewStuff}/>
                <Route exact path="/admin/viewInstructor/:id" component={viewInstructor}/>
                <Route exact path="/admin/editStudent/:id"  component={EditStudent} />
                <Route exact path="/admin/editStuff/:id"  component={EditStuff} />
                <Route exact path="/admin/editInstructor/:id"  component={EditInstructor} />
                <Route exact path="/admin/addStuff"  component={() => <AddStuff />}/>
                <Route path="/dashboard"  component={() => <Dashboard/>}/>
                <Route path="/aboutus" component={() => <About students={leaders.filter((student) => student.id !== 0)} instructors={leaders.filter((instructor) => instructor.id === 0)} loading={loading}/>}/>
                <Route path="/courseList"  component={() => <CourseList/>}/>
                <Route path="/studentList"  component={() => <StudentList/>}/>
                <Route path="/instructorList"  component={() => <InstructorList/>}/>
                <Route path="/scholarship" component={() => <Scholarship scholarships={scholarships} AcceptScholarship={AcceptScholarship} RejectScholarship={RejectScholarship}/>}/>
                            <Route path="/insights" component={() => <Insights studentCount={studentCount} courseCount={courseCount} instructorCount={instructorCount} stuffCount={stuffCount} />} />
                <Route exact path='/contactus' component={Contact} />

                <Redirect to="/home" /> 
            </Switch>
            </CSSTransition>
 </TransitionGroup>

        <Footer />
        </div>
    );

}
 
export default Main;