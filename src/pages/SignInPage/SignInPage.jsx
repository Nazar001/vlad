import React, { Component } from 'react';
import { withRouter } from "react-router";
import './News.scss';


class SignInPage extends Component {
    async addClient(e) {
        e.preventDefault();
        let today = new Date();
        let day = today.getDate();
        let month = today.getMonth() + 1;
        let year = today.getFullYear();
        if (day < 10) {
            day = '0' + day;
        }
        if (month < 10) {
            month = '0' + month;
        }
        let date = year + "." + month + "." + day;
        let id;

        await fetch(`/addclient`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                name: e.target[0].value,
                phone: e.target[1].value,
                region: e.target[2].value
            })
        })
            .then((response) => {
                return response.json()
            }).then(res =>
                id = res
            );
    };
    render() {
        return (
            <form action="" onSubmit={this.addClient}>
                <input
                    type="text"
                    placeholder="Имя"
                    maxLength={64}
                    required
                />
                <input
                    type="number"
                    placeholder="Телефон"
                    maxLength={15}
                    required
                />
                <input
                    type="text"
                    placeholder="Регион"
                    maxLength={2}
                    required
                />
                <input type="button" value="Добавить" />
            </form>
        );
    }
};

export default withRouter(SignInPage);