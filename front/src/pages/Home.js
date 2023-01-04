import Banner from "../components/Banner/Banner";
import NavBar from "../components/NavBar/NavBar";

const Home = () => {
    return (
        <>
            <NavBar logo="/images/logo.png" />
            <Banner image="/images/banner.jpg" />
        </>
    );
}

export default Home;