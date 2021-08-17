import { Link } from "react-router-dom";

const Navbar = () => {
    return (
        <div>
            <Link to="/">Home</Link> |
            <Link to="/createEmployee">Add New Employee</Link> |
            <Link to="/createJob">Add New Job</Link> |
            <Link to="/employeeList">Employee List</Link> |
            <Link to="/jobList">Job List</Link>
        </div>
    );
};

export default Navbar;