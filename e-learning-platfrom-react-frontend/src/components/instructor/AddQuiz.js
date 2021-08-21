
import React from 'react';
import axios from 'axios';
import { Link, useHistory } from 'react-router-dom'
import { useState, useEffect } from 'react';
import { Col, Row, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import Navbar from './Navbar';
import Header from './Header';

const AddQuiz = () => {

    const [quiz_name, setQuizname] = useState("");
    const [c_id, setCid] = useState("");
    const [description, setDescription] = useState("");
    const [quiz_date, setQuizdate] = useState("");
    const [quiz_time, setQuiztime] = useState("");
    const [number_of_question, setNumberOfQuestion] = useState("");
    const [status, setStatus] = useState("");
    const [data, setData] = useState([])

    const [quiznameErr, setQuiznameErr] = useState("");
    const [cidErr, setCidErr] = useState("");
    const [descriptionErr, setDescriptionErr] = useState("");
    const [quizdateErr, setQuizdateErr] = useState("");
    const [quiztimeErr, setQuiztimeErr] = useState("");
    const [statusErr, setStatusErr] = useState("");
    const [number_of_questionErr, setNumberOfQuestionErr] = useState("");



    const history = useHistory();

    const validate = (e) => {
        const quiznameErr = {};
        const cidErr = {};
        const descriptionErr = {};
        const quizdateErr = {};
        const quiztimeErr = {};
        const statusErr = {};
        const number_of_questionErr = {};

        let isValid = true;
        if (quiz_name.trim().length < 3) {
            quiznameErr.quiznameShort = "Quiz name must be 3 charecter";
            isValid = false;
            //alert("Opps Enter Comapy name must be grater than 3 charecter");

        }
        if (c_id.trim().length <= 1) {
            cidErr.cidShort = "Course Id can not be empty";
            isValid = false;
        }
        if (description.trim().length < 3) {
            descriptionErr.jdescriptionShort = "description must be 3 charecter";
            isValid = false;
        }
        if (quiz_date.trim().length < 2) {
            quizdateErr.quizdateShort = "quiz_date cant be empty or less than 2 charecter";
            isValid = false;
        }
        if (quiz_time.trim().length < 2) {
            quiztimeErr.quiztimeShort = "Quiz time can't be empty or less than 2 charecter";
            isValid = false;
        }
        if (status.trim().length <= 1) {
            statusErr.qstatusShort = "quiz status cant be empty ";
            isValid = false;
        }
        if (number_of_question.trim().length <= 1) {
            number_of_questionErr.number_of_questionShort = "number of question cant be empty ";
            isValid = false;
        }
        setQuiznameErr(quiznameErr);
        setCidErr(cidErr);
        setDescriptionErr(descriptionErr);
        setQuizdateErr(quizdateErr);
        setQuiztimeErr(quiztimeErr);
        setStatusErr(statusErr);
        setNumberOfQuestionErr(number_of_questionErr);
        return isValid;




    }

    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/quizes-view')
            .then(response => {
                setData(response.data);
                console.log(response.data)

            });


    }, [])

    async function addCourse() {

        console.warn(quiz_name, c_id, quiz_date, quiz_time, description, number_of_question, status);
        const formData = new FormData();
        formData.append('quiz_name', quiz_name);
        formData.append('c_id', c_id);
        formData.append('quiz_date', quiz_date);
        formData.append('quiz_time', quiz_time);
        formData.append('description', description);
        formData.append('number_of_question', number_of_question);

        formData.append('status', status);
        const res = await axios.post('http://localhost:8000/api/quizes-create', formData);


        if (res.data.status === 200) {
            console.log(res.data.message);
        }


    }


    return (
        <>
            <Header />

            <div className="container">
                <div className="card-body ">

                    <div className="form-group mb-3"></div>

                    <Form>
                        <FormGroup row>
                            <Label for="quiz_name" sm={2}>Quiz Name</Label>
                            <Col sm={7}>
                                <Input type="email" name="quiz_name" id="quiz_name" placeholder="Enter quiz name"
                                    onChange={(e) => setQuizname(e.target.value)} onKeyUp={validate} onBlur={validate} />
                            </Col>
                            <Col> {Object.keys(quiznameErr).map((key) => {
                                return <div style={{ color: "red" }}>{quiznameErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="c_id" sm={2}>Course ID</Label>
                            <Col sm={7}>
                                <Input type="text" name="c_id" id="c_id" placeholder="Course ID" onChange={(e) => setCid(e.target.value)} onKeyUp={validate} onBlur={validate} />
                            </Col>
                            <Col> {Object.keys(cidErr).map((key) => {
                                return <div style={{ color: "red" }}>{cidErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>

                        <FormGroup row>
                            <Label for="description" sm={2}>Description</Label>
                            <Col sm={7}>
                                <Input type="text" name="description" id="description" placeholder="Quiz description" onChange={(e) => setDescription(e.target.value)} onKeyUp={validate} onBlur={validate} />
                            </Col>
                            <Col> {Object.keys(descriptionErr).map((key) => {
                                return <div style={{ color: "red" }}>{descriptionErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="quiz_date" sm={2}>Quiz Date</Label>
                            <Col sm={7}>
                                <Input type="date" name="quiz_date" id="quiz_date" placeholder="quiz date" onChange={(e) => setQuizdate(e.target.value)} onKeyUp={validate} onBlur={validate} />
                            </Col>
                            <Col> {Object.keys(quizdateErr).map((key) => {
                                return <div style={{ color: "red" }}>{quizdateErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="quiz_date" sm={2}>Quiz time</Label>
                            <Col sm={7}>
                                <Input type="text" name="quiz_time" id="quiz_time" placeholder="quiz time" pattern="[0-9]{2}:[0-9]{2}" onChange={(e) => setQuiztime(e.target.value)} onKeyUp={validate} onBlur={validate} />
                            </Col>
                            <Col> {Object.keys(quiztimeErr).map((key) => {
                                return <div style={{ color: "red" }}>{quiztimeErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="number_of_question" sm={2}>Number Of Question View for User</Label>
                            <Col sm={7}>
                                <Input type="text" name="number_of_question" id="number_of_question" placeholder="How many question view for this quiz" onChange={(e) => setNumberOfQuestion(e.target.value)} onKeyUp={validate} onBlur={validate} />
                            </Col>
                            <Col> {Object.keys(number_of_questionErr).map((key) => {
                                return <div style={{ color: "red" }}>{number_of_questionErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="exampleSelect" sm={2}>Status</Label>
                            <Col sm={7}>
                                <Input type="select" name="status" id="status" onChange={(e) => setStatus(e.target.value)} onKeyUp={validate} onBlur={validate} >
                                    <option value="">Please select</option>
                                    <option value="1">1</option>
                                    <option value="0">2</option>

                                </Input><br></br>
                            </Col>
                            <Col> {Object.keys(statusErr).map((key) => {
                                return <div style={{ color: "red" }}>{statusErr[key]} </div>
                            })}
                            </Col>
                        </FormGroup>



                        <Col sm={{ size: 10 }}>
                            <FormGroup check row>
                                <Col sm={{ size: 10, offset: 2 }}>
                                    <Button onClick={addCourse}>Submit</Button>
                                    <Button type="submit" class="btn btn-danger" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
                                    </Button>
                                </Col>
                            </FormGroup>
                        </Col>
                    </Form>
                    <hr></hr>

                    <div class="col-md-12">

                        <table class="table table-bordered" id="datatables">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Quiz Name</th>
                                    <th>Course Id</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Time</th>

                                    <th>Num of Exam Qus</th>
                                    <th>Status</th>
                                    <th>Add Question</th>
                                    <th>Details</th>


                                </tr>
                            </thead>
                            <tbody>



                                {
                                    data.map(data => {
                                        return (

                                            <tr key={data.id}>

                                                <td>{data.id}</td>
                                                <td>{data.quiz_name}</td>
                                                <td>{data.c_id}</td>
                                                <td>{data.description}</td>
                                                <td>{data.quiz_date}</td>
                                                <td>{data.quiz_time}</td>
                                                <td>{data.number_of_question}</td>
                                                <td>{data.status}</td>
                                                <td><Link to={`/quizes/addquestion/${data.id}`} className="btn btn-success btn sm">Add Auestion</Link> </td>
                                                <td><Link to={`/quizes/${data.id}`} className="btn btn-success btn sm">View Quiz</Link></td>



                                            </tr>


                                        );
                                    })
                                }


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </>
    )


}
export default AddQuiz;