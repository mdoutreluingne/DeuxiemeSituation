/**
 * Définition d'une transaction
 */
export default class Transaction{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:0;
        /**@type {Date}**/
        this.date = (infos)?new Date(infos.date):"";
        /**@type {number}**/
        this.montant = (infos)?infos.montant:0;
        /**@type {string}**/
        this.type = (infos)?infos.type:"Carte bancaire";
        /**@type {string}**/
        this.numero = (infos)?infos.numero:" ";
        /**@type {string}**/
        this.commentaire = (infos)?infos.commentaire:" ";
        /**@type {string}**/
        this.reservation = (infos && infos.reservation)?infos.reservation:" ";
        /**@type {string}**/
        this.client = (infos)?infos.client:"";
    }
}