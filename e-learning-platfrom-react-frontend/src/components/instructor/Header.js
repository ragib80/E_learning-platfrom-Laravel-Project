
import React, { Component } from 'react';
import {
    Navbar, NavbarBrand, Nav, NavbarToggler, Collapse, NavItem, Jumbotron,
    Button, Modal, ModalHeader, ModalBody,
    Form, FormGroup, Input, Label
} from 'reactstrap';
import { NavLink } from 'react-router-dom';
import axios from 'axios';
class Header extends Component {
    constructor(props) {
        super(props);

        this.toggleNav = this.toggleNav.bind(this);
        this.toggleModal = this.toggleModal.bind(this);
        this.handleLogin = this.handleLogin.bind(this);
        this.state = {
            isNavOpen: false,
            isModalOpen: false,
            isLoggedIn: false,
            name: ""
        };
    }

    toggleNav() {
        this.setState({
            isNavOpen: !this.state.isNavOpen
        });
    }
    toggleModal() {
        this.setState({
            isModalOpen: !this.state.isModalOpen
        });
    }
    async handleLogin(event) {
        event.preventDefault();
        const $data = {
            username: this.username.value,
            password: this.password.value
        }
        this.toggleModal();
        const res = await axios.post('http://localhost:8000/api/login', $data);

        if (res.data.status === 200) {
            this.setState({
                isLoggedIn: !this.state.isLoggedIn,
                name: $data.username
            })
        }
        else {
            console.log("error");
        }

    }


    login() {
        console.log(this.state.name)
        console.log(this.state.isLoggedIn);
        const isLoggedIn = this.state.isLoggedIn;
        if (isLoggedIn) {
            return (
                <Nav className="ml-auto" navbar>
                    <div className="badge bg-primary text-wrap text-white">
                        Hi,{this.state.name}
                    </div>
                    <NavItem>
                        <Button onClick={this.toggleModal} color="white" className="btn btn-primary"><span className="fa fa-sign-out fa-lg"></span>Logout</Button>
                    </NavItem>
                </Nav>);
        }

    }
    render() {
        return (
            <div>
                <Navbar dark expand="md">
                    <div className="container">
                        <NavbarToggler onClick={this.toggleNav} />
                        <NavbarBrand className="mr-auto" href="/"><img src='assets/images/e-learning.svg' height="30" width="41" alt='E-Learning' /></NavbarBrand>
                        <Collapse isOpen={this.state.isNavOpen} navbar>
                            <Nav navbar>


                                {
                                    localStorage.getItem("user-info") ?

                                        <>
                                            <NavItem>
                                                <NavLink className="nav-link" to='/quiz-add'><span className="fa fa-address-card fa-lg"></span>Quiz</NavLink>
                                            </NavItem>
                                            <NavItem>
                                                <NavLink className="nav-link" to='/note'><span className="fa fa-list fa-lg"></span>Notes</NavLink>
                                            </NavItem>
                                            <NavItem>
                                                <NavLink className="nav-link" to='/instructor-index'><span className="fa fa-home fa-lg"></span>Index</NavLink>
                                            </NavItem>
                                        </>
                                        :
                                        <>
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


                                        </>
                                }



                            </Nav>

                            {this.login()}

                        </Collapse>
                    </div>

                </Navbar>


            </div >
        );
    }
}


export default Header;