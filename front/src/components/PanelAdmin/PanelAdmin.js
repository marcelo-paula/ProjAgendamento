import React from "react"
import { Link } from 'react-router-dom';
import "./PanelAdmin.style.css"

function PanelAdmin(){
    return(
        <div>
            <input type="checkbox" id="check"></input>
            <label for="check">
                <i class="fa-solid fa-bars"></i>
            </label>
            <nav>
                <Link to="">
                    <i class="fa-solid fa-house"></i>  Home
                </Link>
                <Link to="">
                    <i class="fa-solid fa-user-group"></i>  Register user
                </Link>
                <Link to="">
                    <i class="fa-brands fa-servicestack"></i>  Services
                </Link>
                <Link to="">
                    <i class="fa-solid fa-right-to-bracket"></i>  Logout
                </Link>
            </nav>
        </div>
    )
}

export default PanelAdmin