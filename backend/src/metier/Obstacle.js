class Obstacle{
    constructor(infos) {
        this.id = (infos)?infos.id:"";
        this.position = (infos)?infos.position:"";
        this.commentaire = (infos)?infos.commentaire:"";
        this.qte = (infos)?infos.qte:0;
        this.article = (infos)?infos.article:"";
        this.reservation = (infos)?infos.reservation:"";
        this.libelle = "";
        this.prix = 0;
    }
}

export default Obstacle;