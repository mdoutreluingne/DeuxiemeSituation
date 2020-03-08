import React from 'react';
import Dbal from "../modele/dbal";
import Reservation from "../metier/Reservation";
import Salle from "../metier/Salle";
import Theme from "../metier/Theme";
import DetailsTransaction from "./DetailsTransaction";
import Obstacle from "../metier/Obstacle";

const d = new Dbal();

export default class Transactions extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            details: -1,
        }
    }

    details(index){
        const transactions = this.props.transactions;
        if (transactions[index].reservation !== " "){
            if (this.state.details === index){
                this.setState({
                    details: -1,
                })
            } else {
                this.setState({
                    details: index,
                })
            }
        }
    }

    async loadSalle(reservation){
        const response = await d.get("http://localhost:8080" + reservation.salle);
        let salle = new Salle(JSON.parse(response));
        return salle;
    }

    async loadObstacles(reservation){
        const response = await d.get("http://localhost:8080/api/obstacle/obstacleByIdReservation/" + reservation.id);
        const obstacles = JSON.parse(response);
        const list = [];
        for (const i in obstacles) {
            list.push(new Obstacle(obstacles[i]));
        }
        return list;
    }

    async loadReservation(){
        const transaction = this.props.transactions[this.state.details];
        let response = await d.get("http://localhost:8080" + transaction.reservation);
        const reservation = new Reservation(JSON.parse(response));
        
        let salle = this.loadSalle(reservation);
        await salle.then((resolve)=>{salle = resolve;});

        let obstacle = await this.loadObstacles(reservation);

        response = await d.get("http://localhost:8080" + salle.theme);
        const theme = new Theme(JSON.parse(response));

        return [reservation, salle, theme, obstacle];
    }

    afficherDetails(){
        if (this.state.details > -1) {
            let reservationDetaille = this.loadReservation();
            return <DetailsTransaction reservationDetailee={reservationDetaille}/>
        } else {
            return null;
        }
    }

    render() {
        const transactions = this.props.transactions;
        const options = {weekday: "short",day: "numeric", month: "short", year: "numeric"};
        if (transactions.length > 0){
            return (
                <section className="transactions">
                    <h2 className="title">TRANSACTIONS</h2>
                    <section className="tableau">
                        <h3 className="colonne">Date</h3>
                        <h3 className="colonne bordure">Montant</h3>
                        {transactions.map((t, i)=>{
                            const date = new Intl.DateTimeFormat("fr-FR", options).format(t.date);
                            if(transactions[i].reservation !== " "){
                                const selected = (this.state.details === i);
                                return (
                                    <section className={"ligne depense " + selected} key={i} onClick={this.details.bind(this, i)}>
                                        <span className="date">{date.toUpperCase()}</span>
                                        <span className="montant bordure">{t.montant}</span>
                                    </section>
                                )
                            } else {
                                return (
                                    <section className={"ligne ajout"} key={i}>
                                        <span className="date">{date.toUpperCase()}</span>
                                        <span className="montant bordure">{t.montant}</span>
                                    </section>
                                )
                            }
                        })}
                    </section>
                    {this.afficherDetails()}
                </section>
            );
        } else{
            return null;
        }
    }
}