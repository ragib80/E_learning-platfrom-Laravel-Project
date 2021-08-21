import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';


export default function CourseDetails(props) {

    const [data, setData] = useState([]);
    const [oprions, setOprions] = useState([]);
    const { id: qid } = useParams();

    useEffect(() => {
        axios.get(`http://127.0.0.1:8000/api/quizes/${qid}`)
            .then(response => {
                setData(response.data.data);
                setOprions(response.data.questions);
                console.log(response.data.data)
                console.log(response.data.questions)


            });


    }, [])


    return (
        <>
            <div className="container" >
                <div className="row">
                    <div className="col-md-12">
                        <div className="card">
                            <h1>Quiz Details</h1>

                            {
                                oprions.map(row => {
                                    return (

                                        <tr key={row.id}> <br></br>

                                            <div class="table-responsive">
                                                <h4> Course Id : {row.c_id} </h4>
                                                <h4>Question : {row.question}</h4>
                                                <h4>Answer: {row.answer}</h4>

                                            </div>

                                        </tr>


                                    );
                                })

                            }



                        </div>
                    </div>
                </div>
            </div>
        </>
    )

}