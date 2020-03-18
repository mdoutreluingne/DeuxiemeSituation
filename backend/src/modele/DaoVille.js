import Dbal from "./dbal";
import Ville from "../metier/Ville";

export default class DaoVille {
    constructor() {
        if (!!DaoVille.instance) {
            return DaoVille.instance;
        }
        DaoVille.instance = this;
        this.dbal = new Dbal();
        return this;
    }

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