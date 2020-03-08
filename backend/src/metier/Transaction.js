class Transaction{
    constructor(infos) {
        this.id = (infos)?infos.id:"";
        this.date = (infos)?new Date(infos.date):"";
        this.montant = (infos)?infos.montant:0;
        this.type = (infos)?infos.type:"Carte bancaire";
        this.numero = (infos)?infos.numero:" ";
        this.commentaire = (infos)?infos.commentaire:" ";
        this.reservation = (infos && infos.reservation)?infos.reservation:" ";
        this.client = (infos)?infos.client:"";
    }
}

export default Transaction;