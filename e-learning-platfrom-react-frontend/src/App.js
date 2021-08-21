import React, { Component } from 'react';
import "@progress/kendo-theme-material/dist/all.css";
import "hammerjs";
import './App.css';
import Main from './components/admin/MainComponent';
import { BrowserRouter } from 'react-router-dom';

import Navbar from './components/instructor/Navbar';
import InstructorIndex from './components/instructor/InstructorIndex';
import AddCourse from './components/instructor/AddCourse';
import EditCourse from './components/instructor/EditCourse';
import CourseDetails from './components/instructor/CourseDetails';
import SearchCourse from './components/instructor/SearchCourse';
import NotesIndex from './components/instructor/NotesIndex';
import ViewNotes from './components/instructor/ViewNotes';//
import UploadNotes from './components/instructor/UploadNotes';
import AddQuiz from './components/instructor/AddQuiz';
import ViewQuizes from './components/instructor/ViewQuizes';
import AddQuestions from './components/instructor/AddQuestions';

import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import Header from './components/instructor/Header';
import Footer from './components/instructor/FooterComponent';
import Home from './components/instructor/HomeComponent';
import Registration from './components/instructor/Registration';
import Login from './components/instructor/Login';
import Protected from './components/instructor/Protected';
import HomeNav from './components/instructor/HomeNav';


class App extends Component {



  render() {
    return (
      <div>
        <BrowserRouter>
          <Main />
          <Router>


            <Switch>

              {/* <Route path='/instructor-index'>
            <div >
              <Navbar />

              <InstructorIndex />

            </div>
          </Route>*/}
              <Route path='/instructor-index'>
                <Protected Cmp={InstructorIndex} />
              </Route>
              <Route path='/course-add'>
                <div >
                  <Protected Cmp={AddCourse} />

                  {/*<AddCourse />*/}

                </div>
              </Route>

              <Route path='/edit-course/update/:id'>
                <div >
                  <Protected Cmp={EditCourse} />
                  {/*<EditCourse />*/}

                </div>
              </Route>
              <Route path='/course-info/:id'>
                <div >
                  <Protected Cmp={CourseDetails} />
                  {/* <CourseDetails />*/}

                </div>
              </Route>

              <Route path='/course-search'>
                <div >
                  <Protected Cmp={SearchCourse} />
                  {/*<SearchCourse />*/}

                </div>
              </Route>

              <Route path='/note'>
                <Protected Cmp={NotesIndex} />
                {/*<NotesIndex />*/}
              </Route>

              <Route path='/View/file/:id'>
                <Protected Cmp={ViewNotes} />
                {/*<NotesIndex />*/}
              </Route>
              <Route exact path='/registration'>
                <HomeNav />

                <Registration />


              </Route>

              <Route exact path='/login'>
                <HomeNav />
                <Login />
              </Route>

              <Route exact path='/note-upload'>
                <Protected Cmp={UploadNotes} />
                {/*<UploadNotes />*/}
              </Route>
              <Route exact path='/quiz-add'>
                <Protected Cmp={AddQuiz} />
                {/*<AddQuiz />*/}
              </Route>
              <Route exact path='/quizes/addquestion/:id'>
                <Protected Cmp={AddQuestions} />
                {/*<AddQuestions />*/}
              </Route>


              <Route exact path='/quizes/:id'>
                <Protected Cmp={ViewQuizes} />


              </Route>


              <Route path='/'>
                <div >
                  <HomeNav />
                  <Home />

                </div>
              </Route>
              <Route path='/login'>
                <div >
                  <HomeNav />
                  <Home />

                </div>
              </Route>






            </Switch>
            <Footer />
          </Router>

        </BrowserRouter>

      </div>
    );
  }
}


export default App;
