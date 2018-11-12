import React, {Component} from 'react';
import MuiThemeProvider from 'material-ui/styles/MuiThemeProvider';
import axios from 'axios';
import {
    Table,
    TableBody,
    TableHeader,
    TableHeaderColumn,
    TableRow,
    TableRowColumn,
} from 'material-ui/Table';

var config = require("../config");

class History extends Component {
    constructor(props) {
        super(props);
        this.state = {
            history: []
        }
    }

    componentDidMount() {
        this.getHistory();
    }

    render() {
        return (
            <div>
                <MuiThemeProvider>
                    <div>
                        <Table
                            selectable={false}
                        >
                            <TableHeader
                                displaySelectAll={false}
                            >
                                <TableRow>
                                    <TableHeaderColumn>Rachunek</TableHeaderColumn>
                                    <TableHeaderColumn>Tytuł</TableHeaderColumn>
                                </TableRow>
                            </TableHeader>
                            <TableBody
                                displayRowCheckbox={false}
                            >
                                {this.state.history.map((row, index) => (
                                    <TableRow>
                                        <TableRowColumn>{row.account}</TableRowColumn>
                                        <TableRowColumn>{row.title}</TableRowColumn>
                                    </TableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </div>
                </MuiThemeProvider>
            </div>
        );
    }

    getHistory() {
        axios.get(config.apiUrl + "/history", {
            params: {
                session: this.props.appContext.state.sessionId,
                _: Date.now()
            }
        }).then((response) => {
            if (response.status === 200) {
                this.setState({history: response.data.transactions});
            }
        }).catch((error) => {
            this.props.appContext.msg.error(error.response.data.error);
        });
    }
}
const style = {
    margin: 15,
};
export default History;