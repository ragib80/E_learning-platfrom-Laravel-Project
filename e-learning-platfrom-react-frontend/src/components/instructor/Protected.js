import React from 'react';
import axios from 'axios';
import { Link, useHistory } from 'react-router-dom'
import { useState, useEffect } from 'react';
import Header from './Header';
import { Col, Row, Button, Form, FormGroup, Label, Input } from 'reactstrap';

function Protected(props) {

    let Cmp = props.Cmp;

    const history = useHistory();

    useEffect(() => {
        if (!localStorage.getItem("user-info")) {
            history.push('/login')

        }



    }, [])

    return (


        < div  >
            <Cmp></Cmp>

        </div >


    );






}

export default Protected;
