import React, { useState, useEffect } from 'react';
import {useNavigate} from "react-router-dom";
import '../../css/createProduct.css';

export default function CreateProduct() {
    const [name, setName] = useState('');
    const [description, setDescription] = useState('');
    const [price, setPrice] = useState('');
    const [category, setCategory] = useState('');
    const [image, setImage] = useState('');
    const [message, setMessage] = useState('');
    const token = localStorage.getItem('token');
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setMessage('');
        try {
            const body = {
                name,
                description,
                price,
                category
            };
            if (image) {
                body.image = image;
            }
            const response = await fetch('/api/products/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(body),
            });
            console.log(response);
            if (!response.ok) {
                throw new Error('Falha ao criar produto.');
            }

            const data = await response.json();
            setMessage('Produto criado com sucesso!');

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
                <h2>Criar Produto</h2>
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
                        <label>Descrição:</label>
                        <input
                            type="text"
                            placeholder="Digite a descrição do produto"
                            value={description}
                            onChange={(e) => setDescription(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <label>Price:</label>
                        <input
                            type="text"
                            placeholder="Digite o preço do produto"
                            value={price}
                            onChange={(e) => setPrice(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <label>Category:</label>
                        <input
                            type="text"
                            placeholder="Digite a categoria do produto"
                            value={category}
                            onChange={(e) => setCategory(e.target.value)}
                            required
                        />
                    </div>
                    <div className="input-group">
                        <label>Image:</label>
                        <input
                            type="text"
                            value={image}
                            onChange={(e) => setImage(e.target.value)}
                        />
                    </div>
                    <button type="submit" className="create-button">Criar Produto</button>
                </form>
            </div>
        </div>
    );
}
