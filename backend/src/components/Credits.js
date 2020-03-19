import React from 'react';
import Transaction from "../metier/Transaction";
import DaoTransaction from "../modele/DaoTransaction";

/**
 * Composant qui affiche le formulaire d'ajout des crédits
 */
export default class Credits extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            /**@type {Client}**/
            client: props.client,
            /**@type {Transaction}**/
            transaction: new Transaction(),
        }
    }

    /**
     * Change les infos du formulaire
     * @param zone {string}
     * @param event
     */
    change(zone, event) {
        const t = this.state.transaction;
        t[zone] = event.target.value;
        this.setState({transaction: t})
    }

    /**
     * Met à jour le client s'il a changé
     */
    updateClient(){
        this.setState({
            client: this.props.client
        })
    }

    /**
     * Ajoute les crédits
     * @returns {Promise<void>}
     */
    async ajouter() {
        if (this.state.transaction.montant > 0) {
            document.body.style.cursor = 'progress';
            const client = await new DaoTransaction().ajouter(this.state.client, this.state.transaction);
            document.body.style.cursor = 'default';
            alert("Les pépètes ont été ajoutés");
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