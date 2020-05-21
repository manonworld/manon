import React from 'react';

import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

import Home                         from './../../Views/Home';
import { Link }                     from "react-router-dom";

class Routes extends React.Component {

    constructor(props) {
        super(props);
        this.state = {  };
    }

    render() {
        
        return (
            <Router>
                <div>
                    <nav className="pink">
                        <ul>
                            <li>
                                <Link to="/">Home</Link>
                            </li>
                        </ul>
                    </nav>
                    <Switch>
                          <Route path="/">
                              <Home />
                          </Route>
                    </Switch>
                </div>
            </Router>
        );
    }

}

export default Routes;
