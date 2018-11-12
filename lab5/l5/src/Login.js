import React, {Component} from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import axios from 'axios';

var config = require("./config");

class Login extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: '',
            password: ''
        }
    }

    render() {
        return (
            <div>
                <MuiThemeProvider>
                    <div>
                        <TextField
                            hintText="Numer klienta"
                            floatingLabelText="Numer klienta"
                            onChange={(event, newValue) => this.setState({user: newValue})}
                        />
                        <br/>
                        <TextField
                            type="password"
                            hintText="Hasło"
                            floatingLabelText="Hasło"
                            onChange={(event, newValue) => this.setState({password: newValue})}
                        />
                        <br/>
                        <RaisedButton label="Zaloguj" primary={true} style={style}
                                      onClick={(event) => this.handleClick(event)}/>
                    </div>
                </MuiThemeProvider>
            </div>
        );
    }

    handleClick(event) {
        axios.post(config.apiUrl + "/login", {user: this.state.user, password: this.state.password}).then((response) => {
            if (response.status === 200) {
                this.props.appContext.setState({logged: true, sessionId: response.data.sessionId, user: this.state.user});
            }
        }).catch((error) => {
            this.props.appContext.msg.error(error.response.data.error);
        });
    }
}
const style = {
    margin: 15,
};
export default Login;