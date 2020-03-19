/**
 * Définition d'une réservation
 */
export default class Reservation{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:"";
        /**@type {Date}**/
        this.date = (infos)?new Date(infos.date):"";
        /**@type {string}**/
        this.commentaire = (infos)?infos.commentaire:"";
        /**@type {string}**/
        this.nbJoueur = (infos)?infos.nbJoueur:"";
        /**@type {string}**/
        this.client = (infos)?infos.client:"";
        /**@type {string}**/
        this.salle = (infos)?infos.salle:"";
    }
}