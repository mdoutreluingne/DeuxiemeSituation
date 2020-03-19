import Dbal from "./Dbal";
import Salle from "../metier/Salle";

export default class DaoSalle {
    /**
     * Singleton
     * @returns {DaoSalle}
     */
    constructor() {
        if (!!DaoSalle.instance) {
            return DaoSalle.instance;
        }
        /**@type {DaoSalle}**/
        DaoSalle.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Récupère la salle d'une réservation
     * @param reservation {Reservation}
     * @returns {Promise<Salle>}
     */
    async getSalleByReservation(reservation){
        const reponse = await this.dbal.get(reservation.salle);
        return  new Salle(JSON.parse(reponse));
    }
}