/**
 * Définition d'une ville
 */
export default class Ville{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:0;
        /**@type {string}**/
        this.nom = (infos)?infos.nom:"";
    }
}