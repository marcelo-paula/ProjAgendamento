import React, { useState } from 'react';
import Swal from "sweetalert2";
import './Form.style.css';
import Buttons from '../Buttons/Buttons.js';


function RegisterUser() {    

    const [name, setName] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const [confirmPassword, setConfirmPassword] = useState('')

    function handleSubmit(event){
        event.preventDefault() //vai fazer com que a pagina não atualiza
        var dados = new FormData()
        dados.append('name',name)
        dados.append('email',email)
        dados.append('password',password)

        fetch('http://localhost:8080/ProjAgendamento/api/user/create',{
            method: 'POST',
            body: dados
        }).then(response => response.json())
          .then(response => {
            if (response.error?.message){ //se tiver mensagem cai no if
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: response.error.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cadastrado com sucesso!',
                    showConfirmButton: false,
                    timer: 1500
                })
                clearForm()
            }
        });
    }

    function clearForm(){
        setName("")
        setEmail("")
        setPassword("")
        setConfirmPassword("")
    }
    
    return(
        <>
            <form className="formLogin col-12" onSubmit={(event) => handleSubmit(event)}>
                <div className="container">
                    <div className="row">
                        <h2>Create acount</h2>
                        <div class="form-floating mb-1">
                            <input type="name" 
                                   className="form-control" 
                                   id="name" name="name" 
                                   placeholder="Inform your name" 
                                   value={name} 
                                   onChange={(e) => setName(e.target.value)}
                                   required
                            />
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="email" 
                                   className="form-control" 
                                   id="email" 
                                   name="email" 
                                   placeholder="name@example.com"
                                   value={email} 
                                   onChange={(e) => setEmail(e.target.value)}
                                   required
                            />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="password" 
                                   class="form-control" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Password"
                                   value={password} 
                                   onChange={(e) => setPassword(e.target.value)}
                                   required       
                            />
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" 
                                   class="form-control" 
                                   id="confirPassword" 
                                   name="confirPassword" 
                                   placeholder="Confirm Password"
                                   value={confirmPassword} 
                                   onChange={(e) => setConfirmPassword(e.target.value)}
                                   required       
                            />
                            <label for="confirPassword">Confirm Password</label>
                        </div>
                        <div className="buttons">
                            <Buttons imgSubmit={<i class="fa-solid fa-floppy-disk"></i>}
                                     submit="Save user"
                                     visu="false"
                                     redirectDanger={clearForm}
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