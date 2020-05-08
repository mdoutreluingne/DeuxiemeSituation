class client{
    constructor(infos) {
        this.id = (infos)?infos.id:"";
        this.nom = (infos)?infos.nom:"";
        this.prenom = (infos)?infos.prenom:"";
        this.ville = (infos)?infos.ville:"";
        this.tel = (infos)?infos.tel:"";
        this.mail = (infos)?infos.mail:"";
        this.solde = (infos)?infos.solde:"";
        this.archive = (infos)?infos.archive:"";
    }
}

export default client;