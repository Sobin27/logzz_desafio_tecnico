import React, { useState, useEffect } from 'react';
import '../../css/listProducts.css';
import { Link } from "react-router-dom";

export default function ListProducts() {
    const [products, setProducts] = useState([]);
    const [error, setError] = useState(null);
    const [page, setPage] = useState(1);
    const [total, setTotal] = useState(1);
    const token = localStorage.getItem('token');
    const userName = localStorage.getItem('user-name');
    const userEmail = localStorage.getItem('user-email');

    useEffect(() => {
        const fetchProducts = async () => {
            try {
                const response = await fetch(`http://localhost:8000/api/products/list?page=${page}&perPage=10`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!response.ok) {
                    throw new Error('Erro ao buscar produtos');
                }

                const data = await response.json();
                setProducts(data.data.list);
                setTotal(data.data.pagination.total);
            } catch (error) {
                setError(error.message);
            }
        };

        fetchProducts();
    }, [page, token]);

    const previousPage = () => {
        if (page > 1) {
            setPage(page - 1);
        }
    };

    const nextPage = () => {
        if (page < total) {
            setPage(page + 1);
        }
    };

    const handleDelete = async (productId) => {
        const confirmDelete = window.confirm('Tem certeza que deseja excluir este produto?');
        if (confirmDelete) {
            try {
                const response = await fetch(`http://localhost:8000/api/products/delete/${productId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    }
                });

                if (!response.ok) {
                    throw new Error('Erro ao excluir produto');
                }
                setProducts(products.filter(product => product.id !== productId));
            } catch (error) {
                setError(error.message);
            }
        }
    };

    return (
        <div className="container">
            <header className="header">
                <Link
                    to="/editar-usuario"
                    state={{ userName: userName, token: token,  userEmail: userEmail }}
                    className="user-name">
                    Editar Usuário
                </Link>
            </header>
            <main>
                <div className="header-container">
                    <h2>Listagem de Produtos</h2>
                    <Link to="/criar-produto" className="create-product-button">Criar Produto</Link>
                </div>
                {error ? (
                    <p className="error-message">{error}</p>
                ) : (
                    <table className="order-table">
                        <thead>
                        <tr>
                            <th>ID do Produto</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        {products.length > 0 ? (
                            products.map((product) => (
                                <tr key={product.id}>
                                    <td>{product.id}</td>
                                    <td>{product.name}</td>
                                    <td>{product.price}</td>
                                    <td>{product.category}</td>
                                    <td>
                                        <Link
                                            to="/editar-produto"
                                            state={{ product: product }}
                                            className="edit-button"
                                        >
                                            Editar
                                        </Link>
                                        <button
                                            className="delete-button"
                                            onClick={() => handleDelete(product.id)}
                                        >
                                            Excluir
                                        </button>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="5">Nenhum produto encontrado.</td>
                            </tr>
                        )}
                        </tbody>
                    </table>
                )}
                <div className="pagination">
                    <button onClick={previousPage} disabled={page === 1}>Anterior</button>
                    <span>Página {page} de {Math.round(total / 10)}</span>
                    <button onClick={nextPage} disabled={page === total}>Próxima</button>
                </div>
            </main>
        </div>
    );
}
