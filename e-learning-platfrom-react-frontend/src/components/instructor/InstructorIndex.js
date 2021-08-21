import React from 'react';
import { useState, useEffect } from 'react';
import { BrowserRouter as Router, Route, Switch, Link } from 'react-router-dom';
import axios from 'axios';
import Navbar from './Navbar';
import Header from './Header';

import { useHistory, useParams } from "react-router-dom";

const InstructorIndex = () => {

    const [data, setData] = useState([])

    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/instructor-index')
            .then(response => {
                setData(response.data);

            });


    }, [])

    const btnstyle = { margin: '8px 0' }


    let history = useHistory();

    function deleteCourse(e, c_id) {
        console.log(c_id);
        const clicked = e.currentTarget;
        clicked.innerText = "deleting..";
        const res = axios.delete(`http://localhost:8000/api/course-delete/${c_id}`);

        if (res.data !== null) {
            clicked.closest("tr").remove();

        }
    }

    const logout = () => {

        history.push("/");
    }

    return (
        <div className="">

            <Header />
            <Navbar />

            <div style={{ float: "right", marginRight: "50px" }}>



            </div>

            <div className="container" >
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <h4>instructor Index

                            </h4>

                        </div>
                        <div className="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="class_table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
                                            <td>Course ID </td>
                                            <td>Course Name </td>
                                            <td>Course Thumnil </td>
                                            <td> Course Status </td>

                                            <td> Action </td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {
                                            data.map(row => {
                                                return (
                                                    <tr key={row.c_id}>
                                                        <td>{row.c_id}</td>
                                                        <td>{row.c_name}</td>
                                                        <td><img src={"http://localhost:8000/" + row.img} /></td>
                                                        {/*<td>{row.img}</td>*/}
                                                        <td>{row.status}</td>

                                                        <td><Link to={`course-info/${row.c_id}`} className="btn btn-warning">Details</Link> ||

                                                            <Link to={`edit-course/update/${row.c_id}`} className="btn btn-success btn sm">Edit</Link> ||

                                                            <button type="button" onClick={(e) => deleteCourse(e, row.c_id)} className='btn btn-danger btn-sm'>Delete</button>

                                                        </td>

                                                    </tr>

                                                );
                                            })
                                        }





                                    </tbody>

                                </table>
                            </div>
                        </div>



                    </div>

                </div>
            </div>




        </div >
    )
}

export default InstructorIndex;