import React,  { useState }  from 'react';
import ReactDOM from 'react-dom/client';
import { Link } from 'react-router-dom';
import '../../css/login.css';
import { useNavigate } from 'react-router-dom';


export default function Login(){
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [error, setError] = useState('');
    const navigate = useNavigate();
    const handleSubmit = async (e) => {
        e.preventDefault();
        setError('');

        try {
            const response = await fetch('/api/authentication/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email, password }),
            });
            if (!response.ok) {
                throw new Error('Falha no login, verifique suas credenciais.');
            }
            const data = await response.json();
            localStorage.setItem('token', data.data.token);
            localStorage.setItem('user-name', data.data.name);
            localStorage.setItem('user-email', data.data.email);

            setTimeout(() => {
                navigate('/listar-produtos');
            }, 500);
        } catch (error) {
            setError(error.message);
        }
    };
    return (
        <div className="login-container">
            <div className="login-box">
                <h2>Login</h2>
                {error && <p className="error-message">{error}</p>}
                <form onSubmit={handleSubmit}>
                    <div className="input-group">
                        <label>Email:</label>
                        <input
                            type="email"
                            placeholder="Digite seu email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)} // Atualiza o estado com o valor do campo email
                            required
                        />
                    </div>
                    <div className="input-group">
                        <label>Password:</label>
                        <input
                            type="password"
                            placeholder="Digite sua senha"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)} // Atualiza o estado com o valor do campo password
                            required
                        />
                    </div>
                    <button type="submit" className="login-button">Login</button>
                    <div className="create-account">
                        <Link to="/criar-conta">Criar Conta</Link>
                    </div>
                </form>
            </div>
        </div>
    );
};
