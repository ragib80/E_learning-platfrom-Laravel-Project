import React from 'react';
import { useState, useEffect } from 'react';
import { BrowserRouter as Router, Route, Switch, Link } from 'react-router-dom';
import axios from 'axios';
import Iframe from 'react-iframe'
import fileDownload from 'js-file-download'
import Navbar from './Navbar';
import Header from './Header';



const NotesIndex = (props) => {

    const [data, setData] = useState([])

    useEffect(() => {
        axios.get('http://127.0.0.1:8000/api/files/view/')
            .then(response => {
                setData(response.data);

            });


    }, [])

    function dwonload(e, file) {
        console.log(file);
        const clicked = e.currentTarget;
        //clicked.innerText = "Downloading..";
        const res = axios.get(`http://127.0.0.1:8000/api/files/download/${file}`, {
            responseType: 'blob',
        })
            .then(function (response) {

                //handle success
                console.log(response);
                //fileDownload(response.config.url)
                fileDownload(response.data, file)



            }).catch(function (response) {
                //handle error
                console.log(response);
            });


    }

    //http://127.0.0.1:8000/files/download
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
                            <h4>Note Index

                            </h4>


                        </div>
                        <h2><Link to={`/note-upload`} className="btn btn-success">upload Files</Link>

                            || </h2>
                        <div className="card-body">
                            <table className="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>sl</th>
                                        <th>Course Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>view</th>
                                        <th>Dwonload</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    {
                                        data.map(row => {
                                            return (
                                                <tr key={row.id}>
                                                    <td>{row.id}</td>
                                                    <td>{row.c_id}</td>
                                                    <td>{row.title}</td>
                                                    <td>{row.description}</td>

                                                    <td><Link to={`View/file/${row.id}`} className="btn btn-success btn sm">view</Link> </td>
                                                    {/*<td><a href={axios.get('http://127.0.0.1:8000/api/files/download/' + row.file)} className="btn btn-success btn sm">Edit</a> </td>*/}

                                                    {<td> <button type="button" onClick={(e) => dwonload(e, row.file)} className='btn btn-danger btn-sm'>dwonload</button>
                                                    </td>}

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


        </div >
    )

}
export default NotesIndex;