import React, {Component} from 'react';
import NewTransfer from "./NewTransfer";
import ConfirmTransfer from "./ConfirmTransfer";
import DoneTransfer from "./DoneTransfer";

var config = require("../config");


class Transfer extends Component {
    constructor(props) {
        super(props);
        this.state = {
            account: "",
            title: "",
            page: "new"
        }

        this.alertOptions = {
            offset: 14,
            position: 'bottom left',
            theme: 'light',
            time: 5000,
            transition: 'scale'
        }
    }

    render() {
        if (this.state.page === "confirm") {
            return (
                <ConfirmTransfer context={this}/>
            );
        } else if (this.state.page === "done") {
                return (<DoneTransfer account={this.state.account} title={this.state.title}/>);
        } else {
            return (
                <NewTransfer context={this}/>
            );
        }
    }
}

export default Transfer;