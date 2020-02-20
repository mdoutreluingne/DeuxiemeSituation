import React from 'react';
import InfosClient from './InfosClient';
import client from "../metier/client";
import Dbal from "../modele/dbal";

export default class Page extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            initialized: false,
            liste_clients: props.clients,
            client: new client(null),
        }
    }

    async componentDidMount() {
        const d = new Dbal();
        const liste =  [];
        let response = await d.get("http://localhost:8080/api/clients");
        const clients = JSON.parse(response);
        for (const c of clients) {
            liste.push(new client(c));
        }
        this.setState({
            initialized: true,
            liste_clients: liste
        })
    }

    changeClient(client){
        this.setState({
            client: client,
        })
    }

    render() {
        if (!this.state.initialized) {
            return null
        } else {
            const client = this.state.client;
            return (
                <section className="page">
                    <section className="entete">
                        <section className="navigation">
                            <h2 className="title">Comptabilité</h2>
                            <h3 className="nav">Client</h3>
                            <h3 className="nav">Transactions</h3>
                            <h3 className="nav">Crédits</h3>
                        </section>
                        <section className="stickClient">
                            <h3>{client.nom}</h3>
                            <h3>{client.prenom}</h3>
                            <h3>{client.mail}</h3>
                        </section>
                    </section>
                    <section className="corps">
                        <InfosClient clients={this.state.liste_clients} onChange={this.changeClient.bind(this)}/>
                    </section>
                </section>
            )
        }
    }
}