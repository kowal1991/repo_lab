import React, {Component} from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import AlertContainer from 'react-alert';


var config = require("../config");

class NewTransfer extends Component {
    constructor(props) {
        super(props);
        this.state = {
            account: '',
            title: ''
        }

    }

    render() {
        return (
            <div>
                <MuiThemeProvider>
                    <div>
                        <TextField
                            hintText="Nr konta"
                            floatingLabelText="Nr konta"
                            onChange={(event, newValue) => this.setState({account: newValue})}
                        />
                        <br/>
                        <TextField
                            multiLine={true}
                            hintText="Tytuł"
                            floatingLabelText="Tytuł"
                            onChange={(event, newValue) => this.setState({title: newValue})}
                        />
                        <br/>
                        <RaisedButton label="Dalej" primary={true} style={style}
                                      onClick={(event) => this.handleClick(event)}/>
                    </div>
                </MuiThemeProvider>
            </div>
        );
    }

    handleClick(event) {
        if (this.state.account && this.state.title) {
            this.props.context.setState({page: "confirm", account: this.state.account, title: this.state.title});
        } else {
            this.props.context.props.appContext.msg.error("Podaj wszystkie dane");
        }
    }
}
const style = {
    margin: 15,
};
export default NewTransfer;