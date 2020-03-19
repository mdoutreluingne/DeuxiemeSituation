/**
 * Définition d'un obstacle
 */
class Obstacle{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:0;
        /**@type {string}**/
        this.position = (infos)?infos.position:"";
        /**@type {string}**/
        this.commentaire = (infos)?infos.commentaire:"";
        /**@type {number}**/
        this.qte = (infos)?infos.qte:0;
        /**@type {string}**/
        this.article = (infos)?infos.article:"";
        /**@type {string}**/
        this.reservation = (infos)?infos.reservation:"";
        /**@type {string}**/
        this.libelle = "";
        /**@type {number}**/
        this.prix = 0;
    }
}

export default Obstacle;