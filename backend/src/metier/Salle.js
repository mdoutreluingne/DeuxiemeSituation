export default class Salle{
    constructor(infos) {
        this.id = (infos)?infos.id:"";
        this.ville = (infos)?infos.ville:"";
        this.numero = (infos)?infos.numero:"";
        this.prix = (infos)?infos.prix:"";
        this.heureOuverture = (infos)?new Date(infos.heureOuverture):"";
        this.heureFermeture = (infos)?new Date(infos.heureFermeture):"";
        this.archive = (infos)?infos.archive:"";
        this.theme = (infos)?infos.theme:"";
    }
}