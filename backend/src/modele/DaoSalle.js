import Dbal from "./dbal";
import Salle from "../metier/Salle";

export default class DaoSalle {
    constructor() {
        if (!!DaoSalle.instance) {
            return DaoSalle.instance;
        }
        DaoSalle.instance = this;
        this.dbal = new Dbal();
        return this;
    }

    async getSalleByReservation(reservation){
        const reponse = await this.dbal.get(reservation.salle);
        return  new Salle(JSON.parse(reponse));
    }
}