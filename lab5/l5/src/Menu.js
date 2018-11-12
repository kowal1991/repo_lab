import React, {Component} from 'react';

class Menu extends Component {
    constructor(props) {
        super(props);
        this.state = this.props.appContext.state;
    }

    render() {
        return (
            <div>
                <div>Zalogowany jako: {this.state.user}</div>
                <div id="menu">
                    <a href="#historia" onClick={(event) => {
                        event.preventDefault();
                        this.props.appContext.setState({page: "history"});
                    }}>Historia</a>
                    <a href="#transfer" onClick={(event) => {
                        event.preventDefault();
                        this.props.appContext.setState({page: "transfer"});
                    }}>Zleć przelew</a>
                </div>
            </div>
        );
    }
}

export default Menu;