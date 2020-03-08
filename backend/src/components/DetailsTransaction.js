import React from 'react';

export default class DetailsTransaction extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            initialized: false,
            reservationDetailee: null,
        }
    }

    async componentDidMount() {
        let resaDetail = this.props.reservationDetailee;
        await resaDetail.then((resolve)=>{
            resaDetail = resolve;
        });
        this.setState({
            initialized: true,
            reservationDetailee: resaDetail,
        });
    }

    render() {
        if (!this.state.initialized) {return null}
        else{
            const rd = this.state.reservationDetailee;
            const options = {hour: "2-digit", minute: "2-digit"};
            const arrivee = new Intl.DateTimeFormat("fr-FR", options).format(rd[0].date);
            return (
                <section className="details">
                    <div className="salle">{"Salle n°" + rd[1].numero}</div>
                    <div className="theme">{"Theme : " + rd[2].nom}</div>
                    <div className="nbJoueur">{"Nombre de joueur : " + rd[0].nbJoueur}</div>
                    <div className="heureArrivee">{"Heure d'arrivée : " + arrivee}</div>
                    <ul>
                    {rd[3].map((o, i)=>{
                        return(
                            <li key={i} className="obstacle">{o.qte + " " + o.libelle + "s à " + o.prix + "€"}</li>
                        )
                    })}
                    </ul>
                </section>
            )
        }
    }
}