export default class Ville{
    constructor(infos) {
        this.id = (infos)?infos.id:"";
        this.nom = (infos)?infos.nom:"";
    }
}