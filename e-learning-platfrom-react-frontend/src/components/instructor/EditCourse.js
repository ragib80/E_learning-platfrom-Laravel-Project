import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useParams, useHistory } from 'react-router-dom';
import Navbar from './Navbar';
import Header from './Header';
export default function EditCourse() {

    const { id: cid } = useParams();
    const [c_name, setCName] = useState("");
    const [description, setDescription] = useState("");
    // const [img, setImg] = useState("");
    const [status, setStatus] = useState("");
    const [msg, setMsg] = useState('');

    const history = useHistory();

    const handleCNameChange = (e) => {
        setCName(e.target.value)
    }

    const handleDescriptionChange = (e) => {
        setDescription(e.target.value)
    }

    /*const handleImgChange = (e) => {
        setImg(e.target.files[0])
    }*/
    const handleStatusChange = (e) => {
        setStatus(e.target.value)
    }

    const handleUpdate = () => {


        const data = {
            c_name: c_name,
            description: description,
            //img: img,
            status: status


        }
        axios.put(`http://127.0.0.1:8000/api/edit-course/update/${cid}`, data)
            .then(response => {
                setMsg("updated ")

            }).catch((err) => {
                setMsg("error")
            })

    }
    useEffect(() => {
        axios.get(`http://127.0.0.1:8000/api/course-info/${cid}`)
            .then(response => {
                console.log(response.data)
                setCName(response.data.c_name)
                setDescription(response.data.description)
                //setImg(response.data.img)
                setStatus(response.data.status)

            });
    }, [])
    return (
        <>
            <Header />
            <Navbar />
            <h1>Edit Course Details</h1>
            <h3>{msg}</h3>
            <form >
                <table>
                    <tr>
                        <td>  <label htmlFor="name" className="form-label">Name</label></td>
                        <td>  <input
                            type="text"
                            name="c_name"
                            className="form-control"
                            id="c_name"
                            value={c_name}
                            onChange={handleCNameChange}
                            //onKeyUp={validate}
                            placeholder="Enter Company Name"

                        /></td>
                        <td>{/*
                            {Object.keys(cnameErr).map((key) => {
                                return <div style={{ color: "red" }}>{cnameErr[key]} </div>
                            })*/}
                        </td>
                    </tr>
                    <tr>
                        <td>   <label htmlFor="name" className="form-label"> Course Description</label></td>
                        <td>  <input
                            type="text"
                            name="description"
                            className="form-control"
                            id="description"
                            value={description}
                            onChange={handleDescriptionChange}
                            //onKeyUp={validate}
                            placeholder="Enter job title"

                        /></td>
                        <td>{/*
                            {Object.keys(jobtitleErr).map((key) => {
                                return <div style={{ color: "red" }}>{jobtitleErr[key]} </div>
                            })}*/}
                        </td>
                    </tr>
                    <tr>
                        <td> {/*  <label htmlFor="name" className="form-label">Course Thumbnil</label></td>
                        <td>  <input
                            type="file"
                            name="img"
                            className="form-control"
                            id="img"
                            value={img}
                            onChange={handleImgChange}
                            //onKeyUp={validate}
                            placeholder="Enter job location"

                        /></td>
                        <td>{/*
                            {Object.keys(joblocationErr).map((key) => {
                                return <div style={{ color: "red" }}>{joblocationErr[key]} </div>
                            })}*/}
                        </td>
                    </tr>

                    <tr>
                        <td> <label htmlFor="name" className="form-label"> Status</label></td>
                        <td> <input
                            type="text"
                            name="status"
                            className="form-control"
                            id="status"
                            value={status}
                            onChange={handleStatusChange}
                            //onKeyUp={validate}
                            placeholder="Set Course status"


                        /></td>
                        <td>{/*
                            {Object.keys(salaryErr).map((key) => {
                                return <div style={{ color: "red" }}>{salaryErr[key]} </div>
                            })}*/}
                        </td>
                    </tr>


                    <td></td>
                    <button type="button" onClick={handleUpdate} className="btn btn-outline-secondary">Update</button>
                </table>

            </form>

        </>
    )

}
