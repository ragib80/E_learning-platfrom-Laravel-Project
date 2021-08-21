import { Link } from 'react-router-dom';
import { useHistory } from 'react-router-dom'

const Navbar = () => {
    const history = useHistory();
    function logout() {
        localStorage.clear();
        history.push('/')
    }
    return (
        <>
            <nav className="navbar navbar-light bg-light">

                <div className="col col-lg-2">
                    <Link to='/instructor-index' className="btn btn-info">Index</Link>
                </div>

                <Link to='/course-add' className="btn btn-primary btn-sm">Add Course</Link>

                <Link to='/course-search' className='btn btn-info m-2'>Search Course</Link>
                <Link to='/note' className='btn btn-info'>Notes</Link>
                <Link to='/quiz-add' className='btn btn-info'>Quiz</Link>


                <button className="btn btn-outline-danger" onClick={logout} >Logout</button>

                <div className="row">
                    <h1></h1>
                </div>



            </nav>
            <h4>

            </h4>
        </>

    );
}

export default Navbar;