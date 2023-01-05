import { Link } from 'react-router-dom';
import './Banner.style.css'

const Banner = ({ image }) => {
    return (
        <div className="banner" style={{backgroundImage: `url(${image})`}}>
           <div className="banner__overlay"></div> 
           <div className="container">
                <div className="row">
                    <div className="col-12">
                        <div className="banner__content">
                            <h1 className="banner__title">Bem-vindo <span>A Barbearia</span></h1>
                            <p className="banner__text">O melhor lugar para o seu penteado.</p>
                            <Link to="/agendamento" className="banner__btn btn_agendamento">
                                <i class="fa-regular fa-clock"></i>
                                Agendar um horário
                            </Link>

                            <Link to="/dashboard" className="banner__btn">
                                <i class="fa-regular fa-user"></i>
                                Meus Agendamentos
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Banner;