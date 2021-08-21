
import React from 'react';
import axios from 'axios';
import { Link, useHistory } from 'react-router-dom'
import { useState } from 'react';
import Navbar from './Navbar';
import Header from './Header';

const AddCourse = () => {

    const [c_name, setCName] = useState("");
    const [description, setDescription] = useState("");
    const [img, setImg] = useState("");
    const [status, setStatus] = useState("");

    const [cnameErr, setCnameErr] = useState("");
    const [descriptionErr, setDescriptionErr] = useState("");
    const [statusErr, setstatusErr] = useState("");


    const history = useHistory();

    const validate = (e) => {
        const cnameErr = {};
        const descriptionErr = {};
        const statusErr = {};

        let isValid = true;
        if (c_name.trim().length < 3) {
            cnameErr.c_nameShort = "Course name must be 3 charecter";
            isValid = false;


        }
        if (description.trim().length < 5) {
            descriptionErr.descriptionErrShort = "Course description must be 5 charecter";
            isValid = false;
        }
        if (status.trim().length <= 1) {
            statusErr.statusErrShort = "Course status must be 0 or 1";
            isValid = false;

        }

        setCnameErr(cnameErr);
        setDescriptionErr(descriptionErr);
        setstatusErr(statusErr);

        return isValid;




    }

    async function addCourse() {
        const isValid = validate();

        console.warn(c_name, description, img, status);
        const formData = new FormData();
        formData.append('c_name', c_name);
        formData.append('description', description);
        formData.append('status', status);
        formData.append('img', img);
        const res = await axios.post('http://localhost:8000/api/course-add', formData);


        if (res.data.status === 200) {
            console.log(res.data.message);
        }
        history.push('/instructor-index')

            ``
    }

    return (
        <>
            <Header />
            <Navbar />
            <div className="container">
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <h4>Course Add

                            </h4>

                        </div>
                    </div>

                    <div className="card-body ">

                        <div className="form-group mb-3">

                            <table cellPadding="7px">
                                <tr>
                                    <td >Course Add   </td>


                                    <td><input type="text" name="c_name" onChange={(e) => setCName(e.target.value)} onKeyUp={validate} onBlur={validate} /></td>
                                    <td>
                                        {Object.keys(cnameErr).map((key) => {
                                            return <div style={{ color: "red" }}>{cnameErr[key]} </div>
                                        })}
                                    </td>
                                </tr>
                                <tr>
                                    <td > Course description   </td>


                                    <td><input type="text" name="description" onChange={(e) => setDescription(e.target.value)} onKeyUp={validate} onBlur={validate} /></td>

                                    <td>
                                        {Object.keys(descriptionErr).map((key) => {
                                            return <div style={{ color: "red" }}>{descriptionErr[key]} </div>
                                        })}
                                    </td>
                                </tr>
                                <tr>
                                    <td >  Course Thumbnil   </td>


                                    <td><input type="file" name="img" onChange={(e) => setImg(e.target.files[0])} /></td>
                                </tr>

                                <tr>
                                    <td>Course status </td>

                                    <td><input type="text" name="status" onChange={(e) => setStatus(e.target.value)} onKeyUp={validate} onBlur={validate} /></td>
                                    <td>
                                        {Object.keys(statusErr).map((key) => {
                                            return <div style={{ color: "red" }}>{statusErr[key]} </div>
                                        })}
                                    </td>

                                </tr>

                                <tr>
                                    <td></td>

                                </tr>

                            </table>

                        </div>

                        <button type="submit" onClick={addCourse} onSubmit={validate} className="btn btn-outline-secondary">Save</button>



                    </div>
                </div>

            </div>
        </>
    )


}
export default AddCourse;