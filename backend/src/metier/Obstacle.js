import Dbal from "../modele/dbal";

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
        if (infos.article && infos.article !== ""){this.loadArticle(infos.article)}
    }

    async loadArticle(id){
        const d = new Dbal();
        const response = await d.get("http://localhost:8080" + id);
        const article = JSON.parse(response);
        this.libelle = article[0].libelle;
        this.prix = article[0].montant;
    }
}

export default Obstacle;