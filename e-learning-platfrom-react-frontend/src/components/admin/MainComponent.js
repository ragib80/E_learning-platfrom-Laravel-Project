import React, { useState,useEffect } from 'react';
import Home from './HomeComponent';
import Header from './HeaderComponent';
import Footer from './FooterComponent';
import { Switch, Route, Redirect,useParams,useLocation, useHistory } from 'react-router-dom';
import Course from "./Course";
import ViewCourse from './ViewCourse';
import ViewStudent from './ViewStudent';
import AddCourse from "./AddCourse";
import AddStudent from "./AddStudent";
import axios from "axios";
import Student from './Student';
import { TransitionGroup, CSSTransition } from 'react-transition-group';
import Dashboard from './Dashboard';
import Insights from './Insights';
import Scholarship from './Scholarship';
import CourseList from './CourseList';
function Main(){
    const [courses, setCourses] = useState([]);
    const [students, setStudents] = useState([]);
    const [scholarships, setScholarship] = useState([]);
    const [loading, setLoading] = useState(true);
    const [msg, setMessage] = useState('');
    const { id } = useParams();
    const [text, setText] = useState('')
    const [studentCount, setStudentCount] = useState(0)
    const [courseCount, setCourseCount] = useState(0)
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
        const loadScholarship = () => axios.get('http://localhost:8000/api/admin/scholarship/list')
        .then(response => {
            setScholarship(response.data.scholarships);
            setLoading(false);
        });
        const loadCount = () => axios.get('http://localhost:8000/api/admin')
        .then(response => {
            setStudentCount(response.data.students);
            setCourseCount(response.data.courses);
            setLoading(false);
        });
            loadStudent();
            loadScholarship();
            loadCourse();
            loadCount();
        }, [])


      const HomePage = () => {
          return (
      
              <Home 
                  courses={courses} loading={loading} students={students}
              // promotion={this.state.promotions.filter((promo) => promo.featured)[0]}
              // leader={this.state.leaders.filter((leader) => leader.featured)[0]}
              />
              
              
              );
            }
    const EditId = ({match}) => {
        return(
            <AddCourse courses={courses.filter((course) => course.c_id === parseInt(match.params.id,10))[0]} />
            );
    };
    const EditStudent = ({ match }) => {
        return(
            <AddStudent students={students.filter((student) => student.st_id === parseInt(match.params.id,10))[0]} />
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
    const DeleteStudent = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Deleting...";
        const res = await axios.post(`http://localhost:8000/api/admin/student/delete/${id}`);

        if (res.data.status === 200) {
            
            history.push('/student');

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
            
            history.push('/courseList');

        }
    }
    const ActivateCourse = async (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Activating...";
        const res = await axios.post(`http://localhost:8000/api/admin/course/activate/${id}`);

        if (res.data.status === 200) {
            
            history.push('/courseList');

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
        
                <Route path='/home' component={HomePage} />
                <Route  path="/admin/active-course" component={viewActiveCourses} />
                <Route path="/admin/deactive-course" component={viewDeactiveCourses} />
                <Route path="/admin/student" component={() => <Student students={students} loading={loading} DeleteStudent={DeleteStudent}/>}  />
                <Route exact path="/editCourse/:id"  component={EditId} />
                <Route exact path="/admin/viewCourse/:id" component={viewCourse}/>
                <Route  exact path="/admin/viewStudent/:id" component={viewStudent}/>
                <Route exact path="/admin/editStudent/:id"  component={EditStudent} />
                <Route exact path="/admin/addStudent"  component={() => <AddStudent />}/>
                <Route path="/dashboard"  component={() => <Dashboard/>}/>
                <Route path="/courseList"  component={() => <CourseList/>}/>
                <Route path="/scholarship" component={() => <Scholarship scholarships={scholarships} AcceptScholarship={AcceptScholarship} RejectScholarship={RejectScholarship}/>}/>
                <Route path="/insights" component={() => <Insights studentCount={studentCount} courseCount={courseCount}/>}/>
                <Redirect to="/home" /> 
            </Switch>
            </CSSTransition>
 </TransitionGroup>

        <Footer />
        </div>
    );

}
 
export default Main;