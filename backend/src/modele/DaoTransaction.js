import Dbal from "./dbal";
import Transaction from "../metier/Transaction";

export default class DaoTransaction {
    constructor() {
        if (!!DaoTransaction.instance) {
            return DaoTransaction.instance;
        }
        DaoTransaction.instance = this;
        this.dbal = new Dbal();
        return this;
    }

    async getAllByClientId(id){
        const liste = [];
        const reponse = await this.dbal.get("/api/transaction/byIdClient/" + id);
        const transactions = (JSON.parse(reponse));
        transactions.forEach((t)=>{
            liste.push(new Transaction(t))
        });
        return liste;
    }

    async initialiser(client){
        const aujourdhui = this.dbal.date2amd(new Date());
        const url = "/api/transaction/addTransaction/" + aujourdhui + "/0,00/Carte bancaire/ /Creation du compte/ /" + client.id;
        return await this.dbal.post(url);
    }

    async ajouter(client, transaction){
        const aujourdhui = this.dbal.date2amd(new Date());
        const url = "/api/transaction/addTransaction/" + aujourdhui + "/"
            + transaction.montant + "/"
            + transaction.type + "/"
            + transaction.numero + "/"
            + transaction.commentaire
            + "/ /"
            + client.id;
        await this.dbal.post(url);
        client.solde = parseFloat(client.solde) + parseFloat(transaction.montant);
        return client;
    }
}