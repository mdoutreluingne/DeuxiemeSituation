import React from 'react';
import Page from './components/Page';

class App extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            liste_clients: props.clients,
        }
    }

    render() {
        return (
            <div className="App">
                <Page clients={this.state.liste_clients}/>
            </div>
        );
    }
}
export default App;