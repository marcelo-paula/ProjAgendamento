import { BrowserRouter, Route, Routes } from "react-router-dom";
import Agendamento from "./pages/Agendamento";
import Home from "./pages/Home";
import Login from "./pages/Login";
import MainPage from "./pages/MainPage";
import RegisterUser from './pages/RegisterUser';

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/agendamento" element={<Agendamento />} />
          <Route path="/register" element={<RegisterUser />} />
          <Route path="/login" element={<Login />} />
          <Route path="/mainPage" element={<MainPage />} />
          <Route path="*" element={<h1>404 - Not Found</h1>} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;