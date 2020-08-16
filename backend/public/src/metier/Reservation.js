export default class Reservation{
    constructor(infos) {
        this.id = (infos)?infos.id:"";
        this.date = (infos)?new Date(infos.date):"";
        this.commentaire = (infos)?infos.commentaire:"";
        this.nbJoueur = (infos)?infos.nbJoueur:"";
        this.client = (infos)?infos.client:"";
        this.salle = (infos)?infos.salle:"";
    }
}