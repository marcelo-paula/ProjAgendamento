import React from 'react';
import { Link } from 'react-router-dom';
import './Buttons.style.css';

const Buttons = ({submit, 
                  imgSubmit, 
                  imgDanger, 
                  danger, 
                  redirectSubmit, 
                  redirectDanger}) => {
    return(
        <>
            <Link to={redirectSubmit} className="btn btn-outline-primary">
                {imgSubmit} {submit}
            </Link>

            <Link to={redirectDanger} className="btn btn-outline-danger">
                {imgDanger} {danger}
            </Link>
        </>
    )
}

export default Buttons