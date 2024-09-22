import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Login from './components/Login';
import CreateUser from './components/CreateUser';
import ListProducts from './components/ListProducts';
import CreateProduct from './components/CreateProduct';
import UpdateProduct from './components/UpdateProduct';
import UpdateUser from './components/UpdateUser';

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Login />} />
                <Route path="/criar-conta" element={<CreateUser />} />
                <Route path="/listar-produtos" element={<ListProducts />} />
                <Route path="/criar-produto" element={<CreateProduct />} />
                <Route path="/editar-produto" element={<UpdateProduct />} />
                <Route path="/editar-usuario" element={<UpdateUser />} />
            </Routes>
        </Router>
    );
}
const container = document.getElementById('root');
console.log(container);
if (container) {
    const root = ReactDOM.createRoot(container);
    root.render(<App />);
} else {
    console.error("Elemento root não encontrado no DOM.");
}

