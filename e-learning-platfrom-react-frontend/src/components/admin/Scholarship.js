import React, {useState,useEffect} from 'react';
import { Link } from 'react-router-dom';
import { Card, CardImg, CardText, CardBody,
    CardTitle, CardSubtitle,FormGroup,Row,Col,Input,Label,Breadcrumb,BreadcrumbItem,Table,Modal,ModalBody,ModalHeader,ModalFooter, Button,
} from 'reactstrap';
import { useHistory } from 'react-router-dom';
import axios from 'axios';
function RenderRow({items,modal,loading,AcceptScholarship,RejectScholarship,toggleModal,isModalOpen,setModalIsOpenToFalse,}) {
    var data = "";

          if (loading) {
            data =  <div className="col-12 col-md-3"> <img width="100%" src="assets/images/loading.gif" alt="loading" /></div>

        }
          else {
              data = items.map((item) => {
                  return (
               <React.Fragment>
                    <tr key={item.s_id}>
                        <td>{item.s_id}</td>
                        <td>{item.name}</td>
                        <td>{item.email}</td>
                        <td>{item.address}</td>
                        <td>{item.status}</td>
                        <td> 
                    <Button onClick={(e)=>toggleModal(e, item.s_id)} color="primary" className="btn btn-primary">View</Button>
                        {/* <Button type="submit" color="success" onClick={(e) => AcceptScholarship(e, item.s_id)}>
                                            Accept
                                  </Button>
                                  <Button type="submit" color="danger" onClick={(e) => RejectScholarship(e, item.s_id)}>
                                            Reject
                                        </Button> */}
                              </td>
                          </tr>
                                <Modal isOpen={isModalOpen} toggle={toggleModal}>
                    <ModalHeader toggle={setModalIsOpenToFalse}>Scholarship Request</ModalHeader>
                            <ModalBody toggle={setModalIsOpenToFalse}>
                                <CardBody>
                                <CardTitle>{modal.name}</CardTitle>
                                <CardText> {modal.email}
                                </CardText>   <CardText> 
                                    {modal.address}
                                </CardText>   <CardText> 
                                    {modal.status}
                                </CardText>
                            </CardBody>
                              </ModalBody >
                              <ModalFooter toggle={setModalIsOpenToFalse}>
                                     <Button type="submit" color="success" onClick={(e) => AcceptScholarship(e, modal.s_id)}>
                                            Accept
                                  </Button>
                                  <Button type="submit" color="danger" onClick={(e) => RejectScholarship(e, modal.s_id)}>
                                            Reject
                                        </Button>
                              </ModalFooter>
                              </Modal>
                          </React.Fragment>
            );
 
        });
       
    }

    return (
        <>
        {data}
        </>
    )

}


function Scholarship(props) {
    const [scholarship,setData] = useState([props.scholarships]);
    const history = useHistory();
    const [isModalOpen, setModal] = useState(false);
    const [id, setId] = useState();
    const loading = props.loading
    const [modal,setModalData]=useState([])
    
    const toggleModal = (e, id) => {
        const clicked = e.currentTarget;
        clicked.innerText = "Viewed";
        setModal(true)
        console.log(modal)
        setModalData(props.scholarships.filter((modal) => modal.s_id === id)[0]);
      

    }
    const setModalIsOpenToFalse = () => {
        setModal(false);
        
    }

    return (
        <div className="container">
                 <Breadcrumb>
                        <BreadcrumbItem><Link to="/dashboard">Dashboard</Link></BreadcrumbItem>
                            <BreadcrumbItem active>Scholarship</BreadcrumbItem>
                    </Breadcrumb>   
            <div className="row align-items">
                <Card className="m-2">
                    <CardBody>
                        <Table className="table" hover responsive>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <RenderRow key={props.scholarships.id} items={props.scholarships} modal={modal} loading={props.loading} AcceptScholarship={props.AcceptScholarship} RejectScholarship={props.RejectScholarship} toggleModal={toggleModal} isModalOpen={isModalOpen} setModalIsOpenToFalse={setModalIsOpenToFalse}/>
                </tbody>
                    </Table>
                    </CardBody>
                 </Card>
            </div>
            </div>
    );
    }

 
export default Scholarship;
