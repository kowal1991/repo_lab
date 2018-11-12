import React, {Component} from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import RaisedButton from 'material-ui/RaisedButton';
import TextField from 'material-ui/TextField';
import AlertContainer from 'react-alert';

var config = require("../config");

class DoneTransfer extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div>
                <MuiThemeProvider>
                    <div>
                        <h3>Wykonano</h3>
                        <br/>
                        <TextField
                            hintText="Nr konta"
                            floatingLabelText="Nr konta"
                            disabled={true}
                            value={this.props.account}
                        />
                        <br/>
                        <TextField
                            multiLine={true}
                            hintText="Tytuł"
                            disabled={true}
                            floatingLabelText="Tytuł"
                            value={this.props.title}
                        />
                        <br/>
                    </div>
                </MuiThemeProvider>
            </div>
        );
    }

}

export default DoneTransfer;