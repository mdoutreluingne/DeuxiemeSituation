import Dbal from "./dbal";
import Obstacle from "../metier/Obstacle";

export default class DaoObstacle {
    constructor() {
        if (!!DaoObstacle.instance) {
            return DaoObstacle.instance;
        }
        DaoObstacle.instance = this;
        this.dbal = new Dbal();
        return this;
    }

    async load(obstacle){
        const reponse = await this.dbal.get(obstacle.article);
        const article = JSON.parse(reponse);
        obstacle.libelle = article[0].libelle;
        obstacle.prix = article[0].montant;
        return obstacle;
    }

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