import React, {Component} from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import axios from 'axios';

var config = require("../config");


class ConfirmTransfer extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <MuiThemeProvider>
                    <div>
                        <TextField
                            hintText="Nr konta"
                            floatingLabelText="Nr konta"
                            disabled={true}
                            value={this.props.context.state.account}
                        />
                        <br/>
                        <TextField
                            multiLine={true}
                            hintText="Tytuł"
                            disabled={true}
                            floatingLabelText="Tytuł"
                            value={this.props.context.state.title}
                        />
                        <br/>
                        <RaisedButton label="Wykonaj" primary={true} style={style}
                                      onClick={(event) => this.handleClick(event)}/>
                    </div>
                </MuiThemeProvider>
            </div>
        );
    }

    handleClick(event) {
        axios.post(config.apiUrl + "/transfer", {
            account: this.props.context.state.account,
            title: this.props.context.state.title,
            session: this.props.context.props.appContext.state.sessionId
        }).then((response) => {
            if (response.status === 200) {
                this.props.context.setState({page: "done", account: response.data.account, title: response.data.title});
            }
        }).catch((error) => {
            this.props.context.props.appContext.msg.error(error.response.data.error);
        });
    }
}
const style = {
    margin: 15,
};
export default ConfirmTransfer;