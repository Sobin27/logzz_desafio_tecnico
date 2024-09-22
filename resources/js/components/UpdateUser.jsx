import React, { useState, useEffect } from 'react';
import { useLocation } from 'react-router-dom';
import {useNavigate} from "react-router-dom";

export default function UpdateUser() {
    const location = useLocation();
    const token = location.state.token;
    const [name, setName] = useState(location.state.userName);
    const [email, setEmail] = useState(location.state.userEmail);
    const [message, setMessage] = useState('');
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setMessage('');
        try {
            const response = await fetch('/api/user/update', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({ name, email}),
            });
            console.log(response);
            if (!response.ok) {
                throw new Error('Falha ao editar conta.');
            }
            setTimeout(() => {
                navigate('/listar-produtos');
            }, 500);
        } catch (error) {
            setMessage(error.message);
        }
    };

    return (
        <div className="create-user-container">
            <div className="create-user-box">
                <h2>Editar Conta</h2>
                {message && <p className="message">{message}</p>}
                <form onSubmit={handleSubmit}>
                    <div className="input-group">
                        <label>Nome:</label>
                        <input
                            type="text"
                            placeholder="Digite seu nome"
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <label>Email:</label>
                        <input
                            type="email"
                            placeholder="Digite seu email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                            required
                        />
                    </div>
                    <button type="submit" className="create-button">Editar Conta</button>
                </form>
            </div>
        </div>
    );
}
