import Dbal from "./dbal";
import Theme from "../metier/Theme";

export default class DaoTheme {
    constructor() {
        if (!!DaoTheme.instance) {
            return DaoTheme.instance;
        }
        DaoTheme.instance = this;
        this.dbal = new Dbal();
        return this;
    }

    async getThemeBySalle(salle){
        const reponse = await this.dbal.get(salle.theme);
        return new Theme(JSON.parse(reponse));
    }
}