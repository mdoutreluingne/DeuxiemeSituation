import Dbal from "../modele/dbal";
import client from "../metier/client";
import DaoTransaction from "./DaoTransaction";

export default class DaoClient {
    constructor() {
        if (!!DaoClient.instance) {
            return DaoClient.instance;
        }
        DaoClient.instance = this;
        this.dbal = new Dbal();
        return this;
    }

    async getAll(){
        const liste =  [];
        const reponse = await this.dbal.get("/api/clients");
        const clients = JSON.parse(reponse);
        for (const c of clients) {
            liste.push(new client(c));
        }
        return liste;
    }

    async getById(id){
        const url = "/api/clients/" + id;
        const reponse = await this.dbal.get(url);
        return new client(JSON.parse(reponse));
    }

    async load(c){
        let reponse = await this.dbal.get(c.ville);
        c.ville = (JSON.parse(reponse)).nom;
        reponse = await this.dbal.get("/api/client/soldeById/" + c.id);
        c.solde = JSON.parse(reponse);
        return new client(c);
    }

    async archiver(client, valeur){
        const url = "/api/client/modifClient/"+ client.id + "/,/,/,/,/,/" + valeur;
        return await this.dbal.put(url);
    }

    async modifier(client){
        const archive = (!client.archive)?"0":"1";
        const mail = client.mail.replace(".", ",");
        const url = "/api/client/modifClient/"+ client.id + "/"
            + client.nom + "/"
            + client.prenom + "/"
            + client.ville + "/"
            + client.tel + "/"
            + mail + "/"
            + archive;
        return await this.dbal.put(url);
    }

    async creer(client){
        const mail = client.mail.replace(".", ",");
        const ville = client.ville;

        let url = "/api/client/addClient/"
            + client.nom + "/"
            + client.prenom + "/"
            + ville + "/"
            + client.tel + "/"
            + mail + "/0";
        let reponse = await this.dbal.post(url);
        const lastId = JSON.parse(reponse);
        client = await this.getById(lastId);

        new DaoTransaction().initialiser(client);
        return await this.load(client);
    }
}