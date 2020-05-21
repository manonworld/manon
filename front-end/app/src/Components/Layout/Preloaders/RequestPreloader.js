import React from 'react';

import { Preloader, Col } from 'react-materialize';

class RequestPreloader extends React.Component {
    
    constructor(props) {
        super(props);
        this.state = {};
    }
    
    render() {
        
        return (
            <Col s={4}>
                <Preloader active color="blue" flashing={true} size="big" />
            </Col>
        );
        
    }
    
}

export default RequestPreloader;