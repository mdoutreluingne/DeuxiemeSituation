import Dbal from "./Dbal";
import Transaction from "../metier/Transaction";

export default class DaoTransaction {
    /**
     * Singleton
     * @returns {DaoTransaction}
     */
    constructor() {
        if (!!DaoTransaction.instance) {
            return DaoTransaction.instance;
        }
        /**@type {DaoTransaction}**/
        DaoTransaction.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Récupère les transaction d'un client
     * @param id {number}
     * @returns {Promise<[]>}
     */
    async getAllByClientId(id){
        const liste = [];
        const reponse = await this.dbal.get("/api/transaction/byIdClient/" + id);
        const transactions = (JSON.parse(reponse));
        transactions.forEach((t)=>{
            liste.push(new Transaction(t))
        });
        return liste;
    }

    /**
     * Ajoute la transaction de bienvenue
     * @param client {Client}
     * @returns {Promise<string>}
     */
    async initialiser(client){
        const aujourdhui = this.dbal.date2amd(new Date());
        const url = "/api/transaction/addTransaction";
        const params = '{"date":"'+aujourdhui+'","montant":"0,00","type":"Carte Bancaire","numero":" ","commentaire":"Création du compte","reservation":" ","client":"'+client.id+'"}';
        return await this.dbal.post(url, params);
    }

    /**
     * Ajoute une transaction
     * @param client {Client}
     * @param transaction {Transaction}
     * @returns {Promise<*>}
     */
    async ajouter(client, transaction){
        const aujourdhui = this.dbal.date2amd(new Date());
        const url = "/api/transaction/addTransaction";
        const params = '{"date":"'+aujourdhui+'","montant":"'+transaction.montant+'","type":"'+transaction.type+'","numero":"'+transaction.numero+'","commentaire":"'+transaction.commentaire+'","reservation":" ","client":"'+client.id+'"}';
        await this.dbal.post(url, params);
        client.solde = parseFloat(client.solde) + parseFloat(transaction.montant);
        return client;
    }
}