import React from 'react';

import DaoClient from "../modele/DaoClient";
import DaoTransaction from "../modele/DaoTransaction";

import client from "../metier/client";

import InfosClient from './InfosClient';
import Transactions from './Transactions';
import Credits from "./Credits";

export default class Page extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            initialized: false,
            liste_clients: props.clients,
            client: new client(null),
            transactions: [],
        }
    }

    async componentDidMount() {
        const liste = await new DaoClient().getAll();
        this.setState({
            initialized: true,
            liste_clients: liste
        })
    }

    async changeClient(client){
        let list = [];
        if (client.id !== ""){
            list = await new DaoTransaction().getAllByClientId(client.id);
        }
        this.setState({
            client: client,
            transactions: list,
        });
    }

    afficherDonnees(){
        if (this.state.client.id !== ""){
            return(
                <section>
                    <Transactions transactions={this.state.transactions}/>
                    <Credits client={this.state.client} onAdd={this.changeClient.bind(this)}/>
                </section>
            )
        }
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
                        </section>
                        <section className="stickClient">
                            <h3>{client.nom}</h3>
                            <h3>{client.prenom}</h3>
                            <h3>{client.mail}</h3>
                        </section>
                    </section>
                    <section className="corps">
                        <InfosClient clients={this.state.liste_clients} onChange={this.changeClient.bind(this)}/>
                        {this.afficherDonnees()}
                    </section>
                </section>
            )
        }
    }
}