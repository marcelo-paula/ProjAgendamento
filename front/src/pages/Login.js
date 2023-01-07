import { Link } from "react-router-dom"
import Buttons from "../components/Buttons/Buttons"
import NavBar from "../components/NavBar/NavBar"

function Login(){

    function esqueciSenha(){
        window.prompt("Esqueci minha senha", "Informe seu e-mail");
    }

    return (
        <div>
            <NavBar logo="/images/logo.png" />
            <form className="formLogin col-12">
                <div className="container">
                    <div className="row">
                        <h2>Login</h2>
                        <div class="form-floating mb-1">
                            <input type="email" className="form-control" id="email" name="email" placeholder="name@example.com"/>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-1">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
                            <label for="password">Password</label>
                        </div>
                        <div className="buttons">
                             <Buttons redirectSubmit="" 
                                     imgSubmit={<i class="fa-solid fa-right-to-bracket"></i>} 
                                     submit="Log-in"
                                     redirectDanger="/register"
                                     imgDanger={<i class="fa-regular fa-plus"></i>}
                                     danger="Create acount"
                            />
                        </div>
                        <Link to="#" onClick={esqueciSenha}>Esqueceu a senha?</Link>
                    </div>
                </div>
            </form>
        </div>
    )
}

export default Login