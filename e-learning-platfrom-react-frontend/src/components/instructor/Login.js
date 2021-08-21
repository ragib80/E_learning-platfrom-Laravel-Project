import React from 'react';
import axios from 'axios';
import { Link, useHistory } from 'react-router-dom'
import { useState, useEffect } from 'react';
import { Col, Row, Button, Form, FormGroup, Label, Input } from 'reactstrap';

const Login = () => {

    const [user_name, setuser_name] = useState('');
    const [password, setPassword] = useState('');
    const history = useHistory();
    const user = JSON.parse(localStorage.getItem('user-info'));
    console.warn(user);


    useEffect(() => {
        if (localStorage.getItem('user-info')) {
            history.push("/instructor-index");

        }

    }, [])

    async function validateLogin() {
        if (user_name === '') {
            alert('user_name Field is empty')
        }
        else if (password === '') {
            alert('Password Field is empty')
        }
        else if (user_name === 'admin' && password === 'admin' || user_name === 'ragib@admin' && password === 'admin') {
            history.push("/admin");
        }
        let data = { user_name, password };
        const res = axios.post("http://127.0.0.1:8000/api/login", data)
            .then(res => {
                console.log(res.data);
                localStorage.setItem("user-info", JSON.stringify(res.data));
                history.push("/instructor-index");

            });

        console.log(res.data);
        //res = await res.JSON();
        // localStorage.setItem("user-info", JSON.stringify(res));

    }

    return (


        < div className="container" >
            <div className="card-body ">

                <Form>
                    <h1>Login Page</h1>
                    <FormGroup row>
                        <Label for="quiz_name" sm={31}>User Name</Label>
                        <Label for="quiz_name" sm={3}>User Name</Label>
                        <Col sm={6}>
                            <input type="text" name="user_name" id="user_name" placeholder="Enter user name" onChange={(e) => setuser_name(e.target.value)} />
                        </Col>
                        {/* <Col> {Object.keys(quiznameErr).map((key) => {
                            return <div style={{ color: "red" }}>{quiznameErr[key]} </div>
                        })} 
                    </Col>*/}
                    </FormGroup><br></br>
                    <FormGroup row>
                        <Label for="c_id" sm={3}>Password</Label>
                        <Col sm={6}>
                            <input type="password" name="password" placeholder="Enter password" onChange={(e) => setPassword(e.target.value)} />
                        </Col>
                        {/*<Col> {Object.keys(cidErr).map((key) => {
                        return <div style={{ color: "red" }}>{cidErr[key]} </div>
                    })}
                </Col>*/}
                    </FormGroup>



                    <br></br>




                    <Col sm={{ size: 10 }}>
                        <FormGroup check row>
                            <Col sm={{ size: 10, offset: 2 }}>
                                <Button onClick={validateLogin} >Submit</Button>
                                <Button type="submit" class="btn btn-danger" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Reset
                                </Button>
                            </Col>
                        </FormGroup>
                    </Col>
                </Form>
            </div >
        </div >


    );


    {/*<div>
            <div className="container">
                <div className="className='row justify-content-center">
                    <div className="col-md-12">
                        <div className="card">
                            <h4> Login

                            </h4>

                        </div>
                    </div>

                    <div className="card-body " >

                        <div className="form-group mb-3">

                            <table cellPadding="7px">

                                <tr>
                                    <td>User Name </td>

                                    <td><input type="text" name="user_name" onChange={(e) => setuser_name(e.target.value)} /></td>

                                </tr>

                                <tr>
                                    <td>Password </td>

                                    <td><input type="password" name="password" onChange={(e) => setPassword(e.target.value)} /></td>

                                </tr>
                                <tr>

                                </tr>
                                <td></td><br />
                                <button type="submit" onClick={validateLogin} className="btn btn-outline-secondary">Save</button>
                            </table>

                        </div>

                    </div>
                </div>

            </div >


        </div >*/}




}

export default Login;
