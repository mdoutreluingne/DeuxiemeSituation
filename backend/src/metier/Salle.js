/**
 * Définition d'une salle
 */
export default class Salle{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:0;
        /**@type {string}**/
        this.ville = (infos)?infos.ville:"";
        /**@type {string}**/
        this.numero = (infos)?infos.numero:"";
        /**@type {string}**/
        this.prix = (infos)?infos.prix:"";
        /**@type {string}**/
        this.heureOuverture = (infos)?new Date(infos.heureOuverture):"";
        /**@type {string}**/
        this.heureFermeture = (infos)?new Date(infos.heureFermeture):"";
        /**@type {string}**/
        this.archive = (infos)?infos.archive:"";
        /**@type {string}**/
        this.theme = (infos)?infos.theme:"";
    }
}