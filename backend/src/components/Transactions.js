import React from 'react';
import DetailsTransaction from "./DetailsTransaction";
import DaoSalle from "../modele/DaoSalle";
import DaoReservation from "../modele/DaoReservation";
import DaoObstacle from "../modele/DaoObstacle";
import DaoTheme from "../modele/DaoTheme";

/**
 * Composant qui affiche la liste des transaction
 */
export default class Transactions extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            /**@type {Transaction}**/
            transactions: null,
            /**@type {Client}**/
            client: props.client,
            /**@type {number}**/
            details: -1,
            /**@type {number}**/
            lastDetails: -1,
            /**@type {[Reservation, Salle, Theme, [Obstacle]]}**/
            reservationDetailee: null
        }
    }

    /**
     * Définit la transaction qui a été séléctionné
     * @param index {number}
     */
    details(index){
        const transactions = this.props.transactions;
        if (transactions[index].reservation !== " "){
            if (this.state.details === index){
                this.setState({
                    lastDetails: this.state.details,
                    details: -1
                })
            } else {
                this.setState({
                    details: index,
                })
            }
        }
    }

    /**
     * Charge le détail d'une réservation
     * @returns {Promise<(Reservation|Salle|Theme|Obstacle[])[]|null|[Reservation, Salle, Theme, *[]]>}
     */
    async loadReservation(){
        if (this.state.lastDetails !== this.state.details) {
            document.body.style.cursor = 'progress';
            const transaction = this.props.transactions[this.state.details];
            const reservation = await new DaoReservation().getReservationByTransaction(transaction);
            const salle = await new DaoSalle().getSalleByReservation(reservation);
            const obstacle = await new DaoObstacle().getObstacleByReservation(reservation);
            const theme = await new DaoTheme().getThemeBySalle(salle);
            const resaDetail = [reservation, salle, theme, obstacle];
            this.setState({
                reservationDetailee: resaDetail,
            });
            document.body.style.cursor = 'default';
            return resaDetail;
        } else{
            return  this.state.reservationDetailee;
        }
    }

    /**
     * Affiche ou non le composant DetailsTransaction
     * @link {DetailsTransaction}
     * @returns {null|*}
     */
    afficherDetails(){
        if (this.state.details > -1) {
            let reservationDetaille = this.loadReservation();
            return <DetailsTransaction reservationDetailee={reservationDetaille}/>
        } else {
            return null;
        }
    }

    updateTransaction(){
        this.setState({
            client: this.props.client,
            details : -1,
            lastDetails: -1
        });
    }

    render() {
        const transactions = this.props.transactions;
        if (this.state.client.id !== this.props.client.id) {
            this.updateTransaction();
            return null
        } else {
            const options = {weekday: "short", day: "numeric", month: "short", year: "numeric"};
            if (transactions.length > 0) {
                return (
                    <section className="transactions">
                        <h2 className="title">TRANSACTIONS</h2>
                        <section className="tableau">
                            <h3 className="colonne">Date</h3>
                            <h3 className="colonne bordure">Montant</h3>
                            {transactions.map((t, i) => {
                                const date = new Intl.DateTimeFormat("fr-FR", options).format(t.date);
                                if (transactions[i].reservation !== " ") {
                                    const selected = (this.state.details === i);
                                    return (
                                        <section className={"ligne depense " + selected} key={i}
                                                 onClick={this.details.bind(this, i)}>
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
            } else {
                return null;
            }
        }
    }
}