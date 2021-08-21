import React, { Component } from 'react';
import {
    Navbar, NavbarBrand, Nav, NavbarToggler, Collapse, NavItem, Jumbotron,
    Button, Modal, ModalHeader, ModalBody,
    Form, FormGroup, Input, Label
} from 'reactstrap';
import { NavLink } from 'react-router-dom';
import axios from 'axios';
class HomeNav extends Component {

    render() {
        return (
            <div>
                <Navbar dark expand="md">
                    <div className="container">
                        <NavbarToggler />
                        <NavbarBrand className="mr-auto" href="/"><img src='assets/images/e-learning.svg' height="30" width="41" alt='E-Learning' /></NavbarBrand>
                        <Collapse navbar>
                            <Nav navbar>






                                <NavItem>
                                    <NavLink className="nav-link" to='/aboutus'><span className="fa fa-info fa-lg"></span>About Us</NavLink>
                                </NavItem>
                                <NavItem>
                                    <NavLink className="nav-link" to='/'><span className="fa fa-home fa-lg"></span>Home</NavLink>
                                </NavItem>
                                <Nav className="ml-auto" navbar>
                                    <NavItem>
                                        <NavLink className="nav-link" to='/login'><span className="btn btn-primary" className="fa fa-sign-in fa-lg" color="white"></span>Login</NavLink>

                                    </NavItem>
                                </Nav>);

                                <Nav className="ml-auto" navbar>
                                    <NavItem>
                                        <NavLink className="nav-link" to='/registration'><span className="btn btn-primary" className="fa fa-signup-in fa-lg" color="white"></span>Registration</NavLink>

                                    </NavItem>
                                </Nav>);







                            </Nav>



                        </Collapse>
                    </div>

                </Navbar>


            </div >
        );
    }
}
export default HomeNav;