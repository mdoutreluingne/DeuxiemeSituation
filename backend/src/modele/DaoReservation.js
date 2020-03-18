import Dbal from "./dbal";
import Reservation from "../metier/Reservation";

export default class DaoReservation {
    constructor() {
        if (!!DaoReservation.instance) {
            return DaoReservation.instance;
        }
        DaoReservation.instance = this;
        this.dbal = new Dbal();
        return this;
    }

    async getReservationByTransaction(transaction){
        let reponse = await this.dbal.get(transaction.reservation);
        return new Reservation(JSON.parse(reponse));
    }
}