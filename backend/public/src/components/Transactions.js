import React from 'react';
import Dbal from "../modele/dbal";
import Reservation from "../metier/Reservation";
import Salle from "../metier/Salle";
import Theme from "../metier/Theme";
import DetailsTransaction from "./DetailsTransaction";

export default class Transactions extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            details: -1,
        }
    }

    componentDidMount() {
    }

    details(index){
        const transactions = this.props.transactions;
        if (transactions[index].reservation){
            if (index === this.state.details){
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

    async loadReservation(){
        const transaction = this.props.transactions[this.state.details];
        const d = new Dbal();
        let response = await d.get("http://localhost:8080" + transaction.reservation);
        const reservation = new Reservation(JSON.parse(response));
        response = await d.get("http://localhost:8080" + reservation.salle);
        const salle = new Salle(JSON.parse(response));
        response = await d.get("http://localhost:8080" + salle.theme);
        const theme = new Theme(JSON.parse(response));
        return [reservation, salle, theme];
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
                            const selected = (this.state.details === i);
                            return (
                                <section className={"ligne " + selected} key={i} onClick={this.details.bind(this, i)}>
                                    <span className="date">{date.toUpperCase()}</span>
                                    <span className="montant bordure">{t.montant}</span>
                                </section>
                            )
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