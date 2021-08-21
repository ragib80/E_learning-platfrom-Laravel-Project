import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import Navbar from './Navbar';
import Header from './Header';

export default function CourseDetails(props) {
    const { id: cid } = useParams();
    const [data, setData] = useState([]);

    useEffect(() => {
        axios.get(`http://127.0.0.1:8000/api/course-info/${cid}`)
            .then(response => {
                console.log(response.data)
                setData(response.data);


            });
    }, [])

    return (
        <>
            <Header />
            <div className="container" >
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <h1>Edit Course Details</h1>




                            <div class="table-responsive">
                                <table cellpadding="7px" class="table table-striped">

                                    <thead>
                                        <tr class="table-info">
                                            <td>Course ID </td>
                                            <td>Course Name </td>
                                            <td>Course Thumnil </td>
                                            <td> Course Status </td>

                                            <td>Course description </td>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        <tr >
                                            <td>{data.c_id}</td>
                                            <td>{data.c_name}</td>
                                            <td>{data.img}</td>
                                            <td>{data.status}</td>
                                            <td>{data.description}</td>



                                        </tr>






                                    </tbody>


                                    <button type="button" className="btn btn-outline-secondary">Update</button>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )

}