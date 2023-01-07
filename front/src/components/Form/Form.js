import React from 'react';
import './Form.style.css';
import Buttons from '../Buttons/Buttons.js';


const RegisterUser = () => {
    return(
        <>
            <form className="formLogin col-12">
                <div className="container">
                    <div className="row">
                        <h2>Create acount</h2>
                        <div class="form-floating mb-1">
                            <input type="name" className="form-control" id="name" name="name" placeholder="Inform your name"/>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="email" className="form-control" id="email" name="email" placeholder="name@example.com"/>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" id="confirPassword" name="confirPassword" placeholder="Confirm Password"/>
                            <label for="confirPassword">Confirm Password</label>
                        </div>
                        <div className="buttons">
                            <Buttons redirectSubmit=""
                                     imgSubmit={<i class="fa-solid fa-floppy-disk"></i>}
                                     submit="Save user"
                                     redirectDanger=""
                                     imgDanger={<i class="fa-solid fa-spinner"></i>}
                                     danger="Clear fields"
                            />
                        </div>
                    </div>
                </div>
            </form>
        </>
    )
}

export default RegisterUser