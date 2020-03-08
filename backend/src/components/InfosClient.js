import React from 'react';
import client from "../metier/client";
import Dbal from "../modele/dbal";

const d = new Dbal();

class InfosClient extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            update: 0,
            listeClients: props.clients,
            client: new client(null),
        }
    }

    update() {
        this.setState({
            update: this.state.update + 1
        })
    }

    change(propriete, event) {
        const client = this.state.client;
        client[propriete] = event.target.value;
        this.setState({
            client: client
        });
        this.props.onChange(client);
    }

    selectClient(event) {
        //Indique si l'on a séléctionne le client
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

    async loadClient(c){
        let response = await d.get("http://localhost:8080" + c.ville);
        c.ville = (JSON.parse(response)).nom;
        response = await d.get("http://localhost:8080/api/client/soldeById/" + c.id);
        c.solde = JSON.parse(response);
        return new client(c);
    }

    reset() {
        const c = new client(null);
        this.setState({
            client: c
        });
        this.props.onChange(c);
    }

    async archiver(archive){
        const client = this.state.client;
        client.archive = (archive !== "0");
        const url = "http://localhost:8080/api/client/modifClient/"+ client.id + "/,/,/,/,/,/" + archive;
        d.put(url);
        this.setState({
            client: client
        })
    }

    async modifier(){
        const client = this.state.client;
        const archive = (!client.archive)?"0":"1";
        const mail = client.mail.replace(".", ",");
        const url = "http://localhost:8080/api/client/modifClient/"+ client.id + "/"
            + client.nom + "/"
            + client.prenom + "/"
            + client.ville + "/"
            + client.tel + "/"
            + mail + "/"
            + archive;
        d.put(url);
        this.update();
    }

    async creer(){
        let client = this.state.client;
        const mail = client.mail.replace(".", ",");
        const aujourdhui = d.date2amd(new Date());
        const ville = client.ville;
        let url = "http://localhost:8080/api/client/addClient/"
            + client.nom + "/"
            + client.prenom + "/"
            + ville + "/"
            + client.tel + "/"
            + mail + "/0";
        let response = await d.post(url);
        const lastId = JSON.parse(response);
        url = "http://localhost:8080/api/clients/" + lastId;
        response = await d.get(url);
        client = JSON.parse(response);
        url = "http://localhost:8080/api/transaction/addTransaction/" + aujourdhui + "/0,00/Carte bancaire/ /Creation du compte/ /" + client.id;
        response = await d.post(url);
        client =  await this.loadClient(client);
        this.setState({client: client});
        this.props.onChange(client);
        if(JSON.parse(response)){alert("Le joueur à bien été crée.")}
    }

    afficherActions() {
        if (this.state.client.id !== "" && !this.state.client.archive) {
            return (
                <section className="actions">
                    <button className="editer" onClick={this.modifier.bind(this)}>MODIFIER</button>
                    <button className="archiver" onClick={this.archiver.bind(this,"1")}>ARCHIVER</button>
                    <button className="nouveau" onClick={this.reset.bind(this)}>NOUVEAU</button>
                </section>
            )
        } else if (this.state.client.id !== "") {
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
                                            data-client={JSON.stringify(client)}>{client.nom + client.prenom}</option>
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
                        <input className="zone ville" type="text" value={client.ville}
                               onChange={this.change.bind(this, "ville")}/>
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