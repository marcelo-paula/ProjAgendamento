import React from 'react';
import { Link } from 'react-router-dom';
import './Buttons.style.css';

const Buttons = ({submit, clear}) => {
    return(
        <>
            <Link to="/" className="btn btn-outline-primary">
                <i class="fa-solid fa-floppy-disk"></i> {submit}
            </Link>

            <Link to="/" className="btn btn-outline-danger">
                <i class="fa-solid fa-spinner"></i> {clear}
            </Link>
        </>
    )
}

export default Buttons