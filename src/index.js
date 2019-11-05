import React from 'react';
import { render } from 'react-dom';
import { BrowserRouter as Router, Route } from 'react-router-dom';
import 'antd/dist/antd.css';
import SignInPage from './pages/SignInPage';

class App extends React.Component {
    render() {
        return (
            <div>
                <Router>
                    <Route path="/" exact component={SignInPage} />
                    <Route path="/signinpage" exact component={SignInPage} />
                </Router>
            </div>
        );
    }
}

render(<App />, document.getElementById('root'));