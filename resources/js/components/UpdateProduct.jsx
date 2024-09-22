import React, { useState, useEffect } from 'react';
import { useLocation } from 'react-router-dom';
import {useNavigate} from "react-router-dom";
import '../../css/createProduct.css';


export default function UpdateProduct() {
    const location = useLocation();
    const { product } = location.state;

    const [name, setName] = useState(product.name);
    const [description, setDescription] = useState(product.description);
    const [price, setPrice] = useState(product.price);
    const [category, setCategory] = useState(product.category);
    const [image, setImage] = useState(product.image);
    const [productId, setProductId] = useState(product.id);
    const [message, setMessage] = useState('');
    const token = localStorage.getItem('token');
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        setMessage('');
        try {
            const body = {
                productId,
                name,
                description,
                price,
                category
            };
            if (image) {
                body.image = image;
            }
            const response = await fetch('/api/products/update', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(body),
            });
            console.log(response);
            if (!response.ok) {
                throw new Error('Falha ao Editar produto.');
            }

            const data = await response.json();
            setMessage('Produto editado com sucesso!');

            setTimeout(() => {
                navigate('/listar-produtos');
            }, 500);
        } catch (error) {
            setMessage(error.message);
        }
    }
    return (
        <div className="create-user-container">
            <div className="create-user-box">
                <h2>Editar Produto</h2>
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
                    <button type="submit" className="create-button">Editar Produto</button>
                </form>
            </div>
        </div>
    );
}
