import axios from 'axios';
import React from 'react';
import { Link, useHistory } from 'react-router-dom'
import { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import { Col, Row, Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import Navbar from './Navbar';
import Header from './Header';

const AddQuestions = () => {
    const { id: id } = useParams();


    const [quiz_name, setQuizname] = useState("");
    const [c_id, setCid] = useState("");
    const [question, setQuestion] = useState("");
    const [option, setOptions] = useState([]);
    const [answer, setAnswer] = useState("");
    const [note, setNote] = useState("");

    const [data, setData] = useState([])

    const addOption = () => {
        setOptions([...option]);
    };


    useEffect(() => {
        axios.get(`http://127.0.0.1:8000/api/quizes/addquestion/${id}`)
            .then(response => {
                setData(response.data);
                console.log(response.data)

            });


    }, [])



    async function saveQuestion() {

        const data = {
            quiz_name: quiz_name,
            c_id: c_id,
            question: question,
            option: [option[0], option[1], option[2], option[3]],


            answer: answer,
            note: note

        }
        console.log(data)
        const res = await axios.post(`http://localhost:8000/api/addquestions/${id}`, data);


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
                            <Col sm={10}>
                                {/* <select class="form-control" name="quiz_name" required="">
                                    <option value={data.quiz_name} >{data.quiz_name}</option>
                                </select>*/}

                                <Input type="email" name="quiz_name" id="quiz_name" placeholder="Enter quiz name"
                                    value={quiz_name} onChange={(e) => setQuizname(e.target.value)} />
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="c_id" sm={2}>Course ID</Label>
                            <Col sm={10}>
                                {/*<select class="form-control" name="c_id" required="">
                                    <option value={data.c_id}>{data.c_id}</option>
                                </select>*/}
                                <Input type="text" name="c_id" id="c_id" placeholder="Course ID" value={c_id} onChange={(e) => setCid(e.target.value)} />
                            </Col>
                        </FormGroup>

                        <FormGroup row>
                            <Label for="description" sm={2}>Question</Label>
                            <Col sm={10}>
                                <Input type="text" name="question" id="question" placeholder="Quiz question" onChange={(e) => setQuestion(e.target.value)} />
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="quiz_date" sm={2}>Option 1</Label>
                            <Col sm={10}>
                                <Input type="text" name="option" id="option" placeholder="quiz date" onChange={(e) => setOptions([option[0], e.target.value])} />
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="quiz_date" sm={2}>Option 2</Label>
                            <Col sm={10}>
                                <Input type="text" name="option" id="option" placeholder="quiz time" onChange={(e) => setOptions([option[1], e.target.value])} />
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="quiz_date" sm={2}>Option 3</Label>
                            <Col sm={10}>
                                <Input type="text" name="option" id="option" placeholder="quiz time" onChange={(e) => setOptions([e.target.value])} />
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="quiz_date" sm={2}>Option 4</Label>
                            <Col sm={10}>
                                <Input type="text" name="option" id="option" placeholder="quiz time" onChange={(e) => setOptions([e.target.value])} />
                            </Col>
                        </FormGroup>

                        <FormGroup row>
                            <Label for="exampleSelect" sm={2}>Right Answer</Label>
                            <Col sm={10}>
                                <Input type="text" name="answer" id="answer" onChange={(e) => setAnswer(e.target.value)} >


                                </Input><br></br>
                            </Col>
                        </FormGroup>
                        <FormGroup row>
                            <Label for="exampleSelect" sm={2}>Note </Label>
                            <Col sm={10}>
                                <Input type="text" name="note" id="note" onChange={(e) => setNote(e.target.value)} >


                                </Input><br></br>
                            </Col>
                        </FormGroup>



                        <Col sm={{ size: 10 }}>
                            <FormGroup check row>
                                <Col sm={{ size: 10, offset: 2 }}>
                                    <Button onClick={saveQuestion}>Submit</Button>
                                    <Button type="submit" class="btn btn-danger" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        Reset
                                    </Button>
                                </Col>
                            </FormGroup>
                        </Col>
                    </Form>
                </div>
            </div>
        </>
    )
}
export default AddQuestions;