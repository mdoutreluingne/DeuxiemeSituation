import Dbal from "./Dbal";
import client from "../metier/Client";
import DaoTransaction from "./DaoTransaction";

export default class DaoClient {
    /**
     * Singleon
     * @returns {DaoClient|DaoClient}
     */
    constructor() {
        if (!!DaoClient.instance) {
            return DaoClient.instance;
        }
        /**@type {DaoClient}**/
        DaoClient.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Récupère tous les clients
     * @returns {Promise<[]>}
     */
    async getAll(){
        const liste =  [];
        const reponse = await this.dbal.get("/api/clients");
        const clients = JSON.parse(reponse);
        for (const c of clients) {
            liste.push(new client(c));
        }
        return liste;
    }

    /**
     * Récupère un client à partir de sn Id
     * @param id {number}
     * @returns {Promise<client>}
     */
    async getById(id){
        const url = "/api/clients/" + id;
        const reponse = await this.dbal.get(url);
        return new client(JSON.parse(reponse));
    }

    /**
     * Récupère les données spécifiques d'un client
     * @param c {Client}
     * @returns {Promise<client>}
     */
    async load(c){
        let reponse = await this.dbal.get(c.ville);
        c.ville = (JSON.parse(reponse)).nom;
        reponse = await this.dbal.get("/api/client/soldeById/" + c.id);
        c.solde = JSON.parse(reponse);
        return new client(c);
    }

    /**
     * Archive un client
     * @param client {Client}
     * @param valeur {string}
     * @returns {Promise<string>}
     */
    async archiver(client, valeur){
        const url = "/api/client/modifClient/"+ client.id + "/,/,/,/,/,/" + valeur;
        return await this.dbal.put(url);
    }

    /**
     * Modifie un client
     * @param client {Client}
     * @returns {Promise<string>}
     */
    async modifier(client){
        const archive = (!client.archive)?"0":"1";
        const url = "/api/clients/modifclient";
        const params = '{\"id\":\"'+client.id+'\",\"nom\":\"'+client.nom+'\",\"prenom\":\"'+client.prenom+'\",\"ville\":\"'+client.ville+'\",\"tel\":\"'+client.tel+'\",\"mail\":\"'+client.mail+'\",\"archive\":\"'+archive+'\"}';
        return await this.dbal.put(url, params);
    }

    /**
     * Crée un client
     * @param client {Client}
     * @returns {Promise<client>}
     */
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