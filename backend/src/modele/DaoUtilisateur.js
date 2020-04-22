import Dbal from "./Dbal";

export default class DaoUtilisateur {
    /**
     * Singleton
     * @returns {DaoUtilisateur|DaoUtilisateur}
     */
    constructor() {
        if (!!DaoUtilisateur.instance) {
            return DaoUtilisateur.instance;
        }
        /**@type {DaoUtilisateur}**/
        DaoUtilisateur.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Ajoute l'utilsateur correspondant au nouveau client pour se connecter sur l'appli mobile
     * @param client {Client}
     * @returns {Promise<string>}
     */
    async addUser(client){
        const login = client.nom + client.prenom.substr(0, 2);
        const url = "/api/users/addUtilisateur/" + login + "/"+client.nom.toLowerCase()+"'/Joueur/" + client.id;
        return await this.dbal.post(url);
    }
}