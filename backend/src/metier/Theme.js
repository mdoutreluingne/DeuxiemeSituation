/**
 * Définition d'un theme
 */
export default class Theme{
    constructor(infos) {
        /**@type {number}**/
        this.id = (infos)?infos.id:0;
        /**@type {string}**/
        this.nom = (infos)?infos.nom:"";
    }
}