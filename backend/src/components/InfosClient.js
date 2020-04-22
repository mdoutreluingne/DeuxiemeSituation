import React from 'react';
import client from "../metier/Client";
import DaoClient from "../modele/DaoClient";
import DaoVille from "../modele/DaoVille";

/**
 * Composant qui affiche le client
 */
class InfosClient extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            /**@type {number}**/
            update: 0,
            /**@type {DaoClient}**/
            daoClient: new DaoClient(),
            /**@type {Client}**/
            client: new client(null),
            /**@type {[Client]}**/
            listeClients: props.clients,
            /**@type {[Ville]}**/
            listeVilles: [],
        }
    }

    /**
     * Force la mise à jour de la page
     */
    update() {
        this.setState({
            update: this.state.update + 1
        })
    }

    /**
     * Change une info du client
     * @param propriete {string}
     * @param event
     * @returns {Promise<void>}
     */
    async change(propriete, event) {
        const client = this.state.client;
        client[propriete] = event.target.value;

        if (propriete === "ville" && event.target.value.length >= 4){
            document.body.style.cursor = 'progress';
            const villes = await new DaoVille().getVilleByNom(event.target.value);
            document.body.style.cursor = 'default';
            this.setState({
                listeVilles: villes,
                client: client
            });
        } else {
            this.setState({
                listeVilles: [],
                client: client
            });
        }
        this.props.onChange(client);
    }

    /**
     * Séléctionne un client
     * @param event
     */
    selectClient(event) {
        const self = this;
        if (event.nativeEvent.data === undefined) {
            const options = Array.from(event.target.list.children);
            options.forEach(async (option) => {
                if (option.value === event.target.value) {
                    const c =  await self.loadClient(JSON.parse(option.dataset.client));
                    this.setState({client: c});
                    this.props.onChange(c);
                }
            });
        //Ou si l'on change son nom
        } else {
            const client = this.state.client;
            client.nom = event.target.value;
            this.setState({
                client: client
            });
            this.props.onChange(client);
        }
    }

    /**
     * Charge les infos d'un client
     * @param c {Client}
     * @returns {Promise<client>}
     */
    async loadClient(c){
        document.body.style.cursor = 'progress';
        const result = await this.state.daoClient.load(c);
        document.body.style.cursor = 'default';
        return result;
    }

    /**
     * Reset les infos du client
     */
    reset() {
        const c = new client(null);
        this.setState({client: c});
        this.props.onChange(c);
    }

    /**
     * Archive le client séléctionné
     * @param archive {string}
     * @returns {Promise<void>}
     */
    async archiver(archive){
        const client = this.state.client;
        client.archive = (archive !== "0");
        document.body.style.cursor = 'progress';
        await this.state.daoClient.archiver(client, archive);
        document.body.style.cursor = 'default';
        this.setState({
            client: client
        })
    }

    /**
     * Modifie le client
     * @returns {Promise<void>}
     */
    async modifier(){
        if (this.state.client.nom !== "" && this.state.client.prenom !== ""){
            document.body.style.cursor = 'progress';
            await this.state.daoClient.modifier(this.state.client);
            alert("Le client a été modifié");
            document.body.style.cursor = 'default';
            this.update();
        } else {
            alert("Le nom et le prénom ne peuvent pas être vide")
        }
    }

    /**
     * Crée un nouveau client
     * @returns {Promise<void>}
     */
    async creer(){
        const client = await this.state.daoClient.creer(this.state.client);
        if (client.nom !== "" && client.prenom !== ""){
            document.body.style.cursor = 'progress';
            document.body.style.cursor = 'default';
            alert("Le client a été crée");
            this.setState({client: client});
            this.props.onChange(client);
        } else {
            alert("Merci de renseigner les champs obligatoires")
        }
    }

    /**
     * Affiche les boutons d'actions
     * @returns {*}
     */
    afficherActions() {
        if (this.state.client.id !== 0 && !this.state.client.archive) {
            return (
                <section className="actions">
                    <button className="editer" onClick={this.modifier.bind(this)}>MODIFIER</button>
                    <button className="archiver" onClick={this.archiver.bind(this,"1")}>ARCHIVER</button>
                    <button className="nouveau" onClick={this.reset.bind(this)}>NOUVEAU</button>
                </section>
            )
        } else if (this.state.client.id !== 0) {
            return (
                <section className="actions">
                    <button className="editer" onClick={this.modifier.bind(this)}>MODIFIER</button>
                    <button className="desarchiver" onClick={this.archiver.bind(this,"0")}>DESARCHIVER</button>
                    <button className="nouveau" onClick={this.reset.bind(this)}>NOUVEAU</button>
                </section>
            )
        } else {
            return (
                <section className="actions">
                    <button className="editer" onClick={this.creer.bind(this)}>CREER</button>
                    <button className="archiver" disabled>ARCHIVER</button>
                </section>
            )
        }
    }

    render() {
        const client = this.state.client;
        return (
            <section className="selectionClient">
                <section className="client">
                    <h2 className="title">CLIENTS</h2>
                    <div className="saisie">
                        <legend className="description">NOM</legend>
                        <input className="zone prenom" type="text" list="listeClient" value={client.nom}
                               onChange={this.selectClient.bind(this)}/>
                        <datalist id="listeClient">
                            {this.state.listeClients.map((client, index) => {
                                return (
                                    <option key={index}
                                            data-client={JSON.stringify(client)}>{client.nom + " " +  client.prenom}</option>
                                )
                            })}
                        </datalist>
                    </div>
                    <div className="saisie">
                        <legend className="description">PRENOM</legend>
                        <input className="zone prenom" type="text" value={client.prenom}
                               onChange={this.change.bind(this, "prenom")}/>
                    </div>
                    <div className="saisie">
                        <legend className="description">VILLE</legend>
                        <input className="zone ville" type="text" list="listeVille" value={client.ville}
                               onChange={this.change.bind(this, "ville")}/>
                        <datalist id="listeVille">
                            {this.state.listeVilles.map((ville, index) => {
                                return (
                                    <option key={index}
                                            data-client={JSON.stringify(ville)}>{ville.nom}</option>
                                )
                            })}
                        </datalist>
                    </div>
                    <div className="saisie">
                        <legend className="description">E-MAIL</legend>
                        <input className="zone mail" type="text" value={client.mail}
                               onChange={this.change.bind(this, "mail")}/>
                    </div>
                    <div className="saisie">
                        <legend className="description">TELEPHONE</legend>
                        <input className="zone telephone" type="text" value={client.tel}
                               onChange={this.change.bind(this, "tel")}/>
                    </div>
                    <div className="saisie">
                        <legend className="description">SOLDE</legend>
                        <input className="zone solde" type="text" value={client.solde} disabled/>
                    </div>
                    {this.afficherActions()}
                </section>
            </section>
        )
    }
}

export default InfosClient;