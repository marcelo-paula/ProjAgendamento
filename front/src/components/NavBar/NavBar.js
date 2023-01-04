import React from 'react';
import './NavBar.style.css';

const NavBar = ({ logo }) => {
    return (
        <>
            <header className="menu">
                <div className="container">
                    <div className="row">
                        <div className="col-12 text-center">
                            <div className="menu__logo">
                                <img src={logo} alt="logo" />
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </>
    );
};

export default NavBar;