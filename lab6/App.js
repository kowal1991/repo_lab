import React, {Component} from 'react';
import Login from "./Login";
import History from "./pages/History";
import Menu from "./Menu";
import Transfer from "./pages/Transfer";
import AlertContainer from 'react-alert';


class App extends Component {
    constructor() {
        super();
        this.state = {
            page: "history",
            logged: false,
            sessionId: null,
            user: ""
        };
        this.state = {
            page: "history",
            logged: true,
            sessionId: "test",
            user: "7312"
        };

        this.alertOptions = {
            offset: 14,
            position: 'bottom left',
            theme: 'light',
            time: 5000,
            transition: 'scale'
        }


    }

    render() {
        if (!this.state.logged) return (
            <div>
                <AlertContainer ref={a => this.msg = a} {...this.alertOptions} />
                <Login appContext={this}/>
            </div>
        );
        else if (this.state.page === "history") {
            return (
                <div>
                    <AlertContainer ref={a => this.msg = a} {...this.alertOptions} />
                    <Menu appContext={this}/>
                    <History appContext={this}/>
                </div>
            );
        } else if (this.state.page === "transfer") {
            return (
                <div>
                    <AlertContainer ref={a => this.msg = a} {...this.alertOptions} />
                    <Menu appContext={this}/>
                    <Transfer appContext={this}/>
                </div>
            );
        }
    }
}

export default App;
