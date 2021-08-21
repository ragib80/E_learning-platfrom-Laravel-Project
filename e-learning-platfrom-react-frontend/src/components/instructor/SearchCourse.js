import { Link, useHistory } from 'react-router-dom'
import { useState, useEffect } from 'react';
import Navbar from './Navbar';
import Header from './Header';

import axios from 'axios';

const SearchCourse = () => {

    const [courseSch, setSearchCourse] = useState('');
    const [list, setList] = useState([]);



    async function search(courseSch) {
        if (courseSch.length >= 1) {
            await axios.get("http://127.0.0.1:8000/api/course-search/" + courseSch)
                .then(response => {
                    const result = response.data;
                    setList(result);

                });
        }
    }

    function deleteEmployee(e, id) {
        console.log(id);
        const clicked = e.currentTarget;
        clicked.innerText = "deleting..";
        const res = axios.delete(`http://localhost:8000/api/delete-employee/${id}`);

        if (res.data !== null) {
            clicked.closest("tr").remove();

        }
    }

    return (
        <>
            <Header />
            <Navbar />
            <center className='mt-5'><h1>Search Course</h1></center>
            <div className='row justify-content-center'>
                <div className='col-5 mt-5'>
                    <input type='text' name='search' className='form-control' placeholder='Search by name or email' onChange={(e) => { search(e.target.value) }}></input>
                    <center><button onClick={search} className='btn btn-primary mt-2'>Search</button></center>
                </div>
            </div>
            <div className='row justify-content-center'>
                <div className='col-5 mt-5'>
                    <center>
                        {
                            list.length > 0 ?
                                <table table className="table table-bordered table-striped" cellPadding="15px">
                                    <thead>
                                        <tr>
                                            <td>Course ID </td>
                                            <td>Course Name </td>
                                            <td>Course Description </td>
                                            <td> Course Status </td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        {
                                            list.map((row) =>
                                                <tr key={row.c_id}>
                                                    <td>{row.c_id}</td>
                                                    <td>{row.c_name}</td>
                                                    <td>{row.description}</td>
                                                    <td>{row.status}</td>
                                                    <td>
                                                        <Link to={`/edit-course/update/${row.c_id}`} className="btn btn-success btn sm">Edit</Link> </td>
                                                    <td> <button type="button" onClick={(e) => deleteEmployee(e, row.c_id)} className='btn btn-danger btn-sm'>Delete</button>
                                                    </td>
                                                </tr>
                                            )
                                        }
                                    </tbody>

                                </table>
                                : <h2>Search Course</h2>
                        }

                        <Link to='/instructor-index' className='btn btn-warning'>Go Index</Link>
                    </center>
                </div>
            </div>
        </>
    );
}

export default SearchCourse;