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
function Main(){
    const [courses, setcourses] = useState([]);
    const [students, setStudents] = useState([]);
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
            setcourses(response.data.courses);
            setLoading(false);
        });
        const loadStudent =()=>axios.get('http://localhost:8000/api/admin/student/list')
        .then(response => {
            setStudents(response.data.students);
            setLoading(false);
        });
        const loadCount = () => axios.get('http://localhost:8000/api/admin')
        .then(response => {
            setStudentCount(response.data.students);
            setCourseCount(response.data.courses);
            setLoading(false);
        });
            loadStudent();
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
            const ViewId = ({match}) => {
                return(
                    <ViewCourse courses={courses.filter((course) => course.c_id === parseInt(match.params.id,10))[0]} loading = {loading}/>
                    );
                };
   const ViewS = ({ match }) => {
                return(
                    <ViewStudent students={students.filter((student) => student.st_id === parseInt(match.params.id, 10))[0]} loading={loading}
                    courses={courses.filter((course) => course.id === parseInt(match.params.id,10))[0]}/>

                    );
   };
    const DeleteStudent = async (e, id) => {
        console.log(id);
        const clicked = e.currentTarget;
        clicked.innerText = "Deleting...";
        const res = await axios.post(`http://localhost:8000/api/admin/student/delete/${id}`);

        if (res.data.status === 200) {
            history.push('/student');

        }
    }

        return (
                    <div>
            <Header />
          <TransitionGroup>
            <CSSTransition key={location.key} classNames="page" timeout={600}>
              <Switch location={location}>
        
                <Route path='/home' component={HomePage} />
                <Route  path="/course" component={() => <Course courses={courses} loading = {loading}/>}  />
                            <Route path="/student" component={() => <Student students={students} loading={loading} DeleteStudent={DeleteStudent}/>}  />
                <Route exact path="/editCourse/:id"  component={EditId} />
                <Route exact path="/admin/viewCourse/:id" component={ViewId}/>
                <Route  exact path="/admin/viewStudent/:id" component={ViewS}/>
                <Route exact path="/admin/editStudent/:id"  component={EditStudent} />
                <Route exact path="/admin/addStudent"  component={() => <AddStudent />}/>
                <Route path="/dashboard"  component={() => <Dashboard/>}/>
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