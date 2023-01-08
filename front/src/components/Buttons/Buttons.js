import React from 'react';
import { Link } from 'react-router-dom';
import './Buttons.style.css';

const Buttons = ({submit, 
                  imgSubmit, 
                  imgDanger, 
                  danger, 
                  redirectDanger,
                  visu = true
                }) => {
    return(
        <>
            <button className="btn btn-outline-primary" type='submit'>
                {imgSubmit} {submit} 
            </button>

            {visu === true ? (
                <Link to={redirectDanger} className="btn btn-outline-danger">
                    {imgDanger} {danger} 
                </Link>
            ): (
                <button className="btn btn-outline-danger" type='reset' onClick={redirectDanger}>
                    {imgDanger} {danger} 
                </button>
            )}
        </>
    )
}

export default Buttons