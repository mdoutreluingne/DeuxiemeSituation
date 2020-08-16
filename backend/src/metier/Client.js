/**
 * Definition d'un client
 */
export default class client{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:0;
        /**@type {string}**/
        this.nom = (infos)?infos.nom:"";
        /**@type {string}**/
        this.prenom = (infos)?infos.prenom:"";
        /**@type {string}**/
        this.ville = (infos)?infos.ville:"";
        /**@type {string}**/
        this.tel = (infos)?infos.tel:"";
        /**@type {string}**/
        this.mail = (infos)?infos.mail:"";
        /**@type {string}**/
        this.solde = (infos)?infos.solde:"";
        /**@type {string}**/
        this.archive = (infos)?infos.archive:"";
    }
}