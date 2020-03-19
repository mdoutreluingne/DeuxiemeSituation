import Dbal from "./Dbal";
import Reservation from "../metier/Reservation";

export default class DaoReservation {
    /**
     * Singleton
     * @returns {DaoReservation}
     */
    constructor() {
        if (!!DaoReservation.instance) {
            return DaoReservation.instance;
        }
        /**@type {DaoReservation}**/
        DaoReservation.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Récupère la réservation lié à une transaction
     * @param transaction {Transaction}
     * @returns {Promise<Reservation>}
     */
    async getReservationByTransaction(transaction){
        let reponse = await this.dbal.get(transaction.reservation);
        return new Reservation(JSON.parse(reponse));
    }
}