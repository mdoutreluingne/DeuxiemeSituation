import Dbal from "./Dbal";
import Obstacle from "../metier/Obstacle";

export default class DaoObstacle {
    /**
     * Singleton
     * @returns {DaoObstacle|DaoObstacle}
     */
    constructor() {
        if (!!DaoObstacle.instance) {
            return DaoObstacle.instance;
        }
        /**@type {DaoObstacle}**/
        DaoObstacle.instance = this;
        /**@type {Dbal}**/
        this.dbal = new Dbal();
        return this;
    }

    /**
     * Récupères les données supplémentaire d'un obstacle
     * @param obstacle {Obstacle}
     * @returns {Promise<*>}
     */
    async load(obstacle){
        const reponse = await this.dbal.get(obstacle.article);
        const article = JSON.parse(reponse);
        obstacle.libelle = article[0].libelle;
        obstacle.prix = article[0].montant;
        return obstacle;
    }

    /**
     * Récupère les obstacles d'une réservation
     * @param reservation {Reservation}
     * @returns {Promise<[]>}
     */
    async getObstacleByReservation(reservation){
        const response = await this.dbal.get("/api/obstacle/obstacleByIdReservation/" + reservation.id);
        const obstacles = JSON.parse(response);
        const liste = [];
        for (const i in obstacles) {
            let o = new Obstacle(obstacles[i]);
            o = await this.load(o);
            liste.push(o);
        }
        return liste;
    }
}