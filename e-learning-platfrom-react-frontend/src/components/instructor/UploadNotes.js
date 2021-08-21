
import { Link, useHistory } from 'react-router-dom'
import { useState, useEffect } from 'react';
import Navbar from './Navbar';
import Header from './Header';

import axios from 'axios';


const UploadNotes = () => {
    const [c_id, setCid] = useState("");
    const [title, setTitle] = useState("");
    const [description, setDescription] = useState("");
    const [file, setFile] = useState("");
    //const history = useHistory();

    async function addNote() {
        console.warn(c_id, title, description, file);
        const formData = new FormData();
        formData.append('c_id', c_id);
        formData.append('title', title);
        formData.append('description', description);
        formData.append('file', file);
        //let data = { c_id, title, description, file };

        const res = await axios.post('http://127.0.0.1:8000/api/files', formData)
            .then(function (response) {
                //handle success
                console.log(response);
            }).catch(function (response) {
                //handle error
                console.log(response);
            });



    }

    return (
        <>
            <Header />
            <Navbar />
            <center className='mt-5'><h1>Upload notes</h1></center>
            <div className='row justify-content-center'>
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">

                        </div>
                        <div className='row justify-content-center'>
                            <div className='col-5 mt-5'>
                                <center>
                                    <table>
                                        <tr>

                                            <td><input type="text" name="c_id" placeholder="Course ID" onChange={(e) => setCid(e.target.value)} /></td>
                                        </tr>
                                        <tr>
                                            <td> <input type="text" name="title" placeholder="title" onChange={(e) => setTitle(e.target.value)} /> </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="description" placeholder="description" onChange={(e) => setDescription(e.target.value)} /> </td>
                                        </tr>
                                        <tr>
                                            <td><input type="file" name="file" onChange={(e) => setFile(e.target.files[0])} /></td>
                                        </tr>

                                        <input type="submit" class="btn btn-lg btn-primary" onClick={addNote} />
                                    </table>
                                </center>
                                <br></br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
export default UploadNotes;