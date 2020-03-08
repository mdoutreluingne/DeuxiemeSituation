import React from 'react';
import Transaction from "../metier/Transaction";
import Dbal from "../modele/dbal";

const d = new Dbal();

export default class Page extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            client: props.client,
            transaction: new Transaction(),
        }
    }

    change(zone, event) {
        const t = this.state.transaction;
        t[zone] = event.target.value;
        this.setState({transaction: t})
    }

    updateClient(){
        this.setState({
            client: this.props.client
        })
    }

    async ajouter() {
        const t = this.state.transaction;
        if (t.montant > 0) {
            const aujourdhui = d.date2amd(new Date());

            const url = "http://localhost:8080/api/transaction/addTransaction/" + aujourdhui + "/"
                + t.montant + "/"
                + t.type + "/"
                + t.numero + "/"
                + t.commentaire
                + "/ /"
                + this.state.client.id;
            const response = await d.post(url);
            if (JSON.parse(response)) {
                alert("Les crédits ont bien été ajoutés.")
            }
            const client = this.state.client;
            client.solde = parseFloat(client.solde) + parseFloat(t.montant);
            this.props.onAdd(client);
        } else {
            alert("Veuillez saisir un montant supérieur à 0");
        }
    }

    render() {
        if (this.state.client.id !== this.props.client.id) {
            this.updateClient();
            return null
        } else {
            const t = this.state.transaction;
            return (
                <section className="credits">
                    <h2 className="title">CREDITS</h2>
                    <div className="saisie">
                        <legend className="description">TYPE</legend>
                        <select className="zone type" value={t.type} onChange={this.change.bind(this, "type")}>
                            <option value="Carte bancaire">Carte bancaire</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>
                    <div className="saisie">
                        <legend className="description">MONTANT</legend>
                        <input type="number" min="0" className="zone montant" value={t.montant}
                               onChange={this.change.bind(this, "montant")}/>
                    </div>
                    <div className="saisie">
                        <legend className="description">NUMERO</legend>
                        <input type="text" className="zone numero" value={t.numero}
                               onChange={this.change.bind(this, "numero")}/>
                    </div>
                    <div className="saisie">
                        <legend className="description">COMMENTAIRE</legend>
                        <textarea className="zone commentaire" value={t.commentaire}
                                  onChange={this.change.bind(this, "commentaire")}/>
                    </div>
                    <section className="actions">
                        <button className="ajouter" onClick={this.ajouter.bind(this)}>AJOUTER</button>
                    </section>
                </section>
            )
        }
    }
}