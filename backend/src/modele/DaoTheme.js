import Dbal from "./Dbal";
import Theme from "../metier/Theme";

export default class DaoTheme {
    /**
     * Singleton
     * @returns {DaoTheme|DaoTheme}
     */
    constructor() {
        if (!!DaoTheme.instance) {
            return DaoTheme.instance;
        }
        /**@type {DaoTheme}**/
        DaoTheme.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Récupère le thème d'une salle
     * @param salle {Salle}
     * @returns {Promise<Theme>}
     */
    async getThemeBySalle(salle){
        const reponse = await this.dbal.get(salle.theme);
        return new Theme(JSON.parse(reponse));
    }
}