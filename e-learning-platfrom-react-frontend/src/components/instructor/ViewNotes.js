import { useParams } from 'react-router-dom';
import React from 'react';
import { useState, useEffect } from 'react';
import axios from 'axios';
import Iframe from 'react-iframe';
import Navbar from './Navbar';
import Header from './Header';

const ViewNotes = () => {
    const { id: eid } = useParams();
    const [c_id, setCourseid] = useState('');
    const [title, setTile] = useState('');
    const [file, setFile] = useState('');

    useEffect(() => {
        axios.get(`http://127.0.0.1:8000/api/View/file/${eid}`)
            .then(response => {
                setCourseid(response.data.c_id)
                setTile(response.data.title)
                setFile(response.data.file);
                console.log(response)


            });

    }, [])


    return (

        <>
            <Header />
            <Navbar />
            <div class="card-body">

                <div class="table-responsive">
                    <h4> Course Id : {c_id} </h4>
                    <h4>Course Name : {title}</h4>
                    {file}
                </div>

                <Iframe src={file}
                    width="450px"
                    height="450px"
                    id="myId"
                    className="myClassname"
                    display="initial"
                    position="relative" />

            </div>
        </>
    )
}

export default ViewNotes;