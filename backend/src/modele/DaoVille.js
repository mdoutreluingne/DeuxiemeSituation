import Dbal from "./Dbal";
import Ville from "../metier/Ville";

export default class DaoVille {
    /**
     * Singleton
     * @returns {DaoVille}
     */
    constructor() {
        if (!!DaoVille.instance) {
            return DaoVille.instance;
        }
        /**@type {DaoVille}**/
        DaoVille.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }
    /**
     * Récupère les villes dont le nom commence par x
     * @param valeur {string}
     * @returns {Promise<[]>}
     */
    async getVilleByNom(valeur){
        const liste = [];
        const reponse = await this.dbal.get("/api/ville/villeByNom/" + valeur);
        const villes = (JSON.parse(reponse));
        villes.forEach((v)=>{
            liste.push(new Ville(v))
        });
        return liste;
    }
}