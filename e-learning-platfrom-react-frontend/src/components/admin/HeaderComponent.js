import React, { Component } from 'react';
import { Navbar, NavbarBrand, Nav, NavbarToggler, Collapse, NavItem, Jumbotron,
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
            email: "",
            rememberMe: false
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
            email: this.email.value,
            password: this.password.value
        }
        this.toggleModal();
        const res = await axios.post('http://localhost:8000/api/login', $data);
        if (res.data.status === 200) {
            this.setState({
                isLoggedIn: !this.state.isLoggedIn,
                email: $data.email,
                rememberMe: !this.state.rememberMe
                
            })
        const { email, rememberMe } = this.state;
        localStorage.setItem('rememberMe', 'true');
        localStorage.setItem('email', 'true');
        }
        else {
            console.log("error");
        }

    }
    
    componentDidMount() {
        // const rememberMe = localStorage.getItem('rememberMe') === 'true';
        const email = localStorage.getItem('email');
        const rememberMe = localStorage.getItem('rememberMe');
  const user = rememberMe ? JSON.parse(localStorage.getItem('user')) : '';
        this.setState({ user, rememberMe });
        email && this.setState({ email });
}
     
    login(){
        console.log(this.state.email)
        console.log(this.state.isLoggedIn);
        const isLoggedIn = this.state.rememberMe;
        if (isLoggedIn) {
            return (
                  <Nav className="ml-auto" navbar>
                       <div className="badge bg-primary text-wrap text-white">
                        Hi,{this.state.email}
</div>
                    <NavItem>
                        <Button onClick={this.toggleModal} color="white" className="btn btn-log"><span className="fa fa-sign-out fa-lg"></span>Logout</Button>
                    </NavItem>
                </Nav>);
        }
        else  {
            return (
             
                 <Nav className="ml-auto" navbar>
                    <NavItem>
                        <Button onClick={this.toggleModal} color="white" className="btn btn-log"><span className="fa fa-sign-in fa-lg"></span>Login</Button>
                    </NavItem>
                </Nav>);
        }
    }
    render() {
        return(
            <div>
                <Navbar className="navbar"expand="md">
                    <div className="container">
                        <NavbarToggler onClick={this.toggleNav} />
                        <NavbarBrand className="mr-auto" href="/"><img src='assets/images/e-learning.svg' height="30" width="41" alt='E-Learning' /></NavbarBrand>
                        <Collapse isOpen={this.state.isNavOpen} navbar>
                            <Nav navbar>
                            <NavItem>
                                <NavLink className="nav-link"  to='/home'><span className="fa fa-home fa-lg"></span>Home</NavLink>
                            </NavItem>
                            <NavItem>
                                <NavLink className="nav-link" to='/aboutus'><span className="fa fa-info fa-lg"></span>About Us</NavLink>
                            </NavItem>
                            <NavItem>
                                <NavLink className="nav-link" to='/dashboard'><span className="fa fa-address-card fa-lg"></span>Dashboard</NavLink>
                                </NavItem>
                            <NavItem>
                                <NavLink className="nav-link"  to='/contactus'><span className="fa fa-list fa-lg"></span>Contact Us</NavLink>
                            </NavItem>
                            
                        
                            </Nav>
                            {this.login()}
                        </Collapse>
                    </div>
                    
                </Navbar>

                <Modal isOpen={this.state.isModalOpen} toggle={this.toggleModal}>
                    <ModalHeader toggle={this.toggleModal}>Login</ModalHeader>
                    <ModalBody>
                      <Form onSubmit={this.handleLogin}>
                            <FormGroup>
                                <Label htmlFor="email">Email</Label>
                                <Input type="text" id="email" name="email"
                                    innerRef={(input) => this.email = input} />
                            </FormGroup>
                            <FormGroup>
                                <Label htmlFor="password">Password</Label>
                                <Input type="password" id="password" name="password"
                                    innerRef={(input) => this.password = input}  />
                            </FormGroup>
                            <FormGroup check>
                                <Label check>
                                    <Input type="checkbox" name="rememberMe"
                                    innerRef={(input) => this.rememberMe = input}  />
                                    Remember me
                                </Label>
                            </FormGroup>
                            <Button type="submit" value="submit" color="primary">Login</Button>
                        </Form>
                        
                    </ModalBody>
                </Modal>
                
            </div>
        );
    }
}


export default Header;