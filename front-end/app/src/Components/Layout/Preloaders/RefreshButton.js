import React from 'react';

import { Button, Icon } from 'react-materialize';

class RefreshButton extends React.Component {
    
    constructor(props) {
        super(props);
        this.state = {};
    }
    
    render() {
        
        return (
            <Button
                onClick={() => this.props.makeRequest.makeRequest({ params: { refresh: true } })}
                className="pink"
                floating
                style={{margin: '10px'}}
                icon={<Icon>refresh</Icon>}
                large
                node="button"
                waves="light" />
        );
        
    }
    
}

export default RefreshButton;
