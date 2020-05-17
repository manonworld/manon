/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import React from 'react';

import Websocket from 'react-websocket';
import { Badge, Switch } from 'react-materialize';
import Consts from './Consts';
import Notifier from "react-desktop-notification";


class WebSocketListener extends React.Component {
    
    constructor(props) {
        super(props);
        this.state = {
            details: 'Live Discounts Will Be Displayed Here   ',
            special: false
        };
        this.state.conn = new WebSocket(Consts.getConsts().backendSockUrl);
        this.state.conn.onopen = function(e) {  };
    }
    
    handleData(data) {
        let result = JSON.parse(data);
        if( !result.special || ( this.state.special && result.special ) ) {
            
            this.setState({details: result.title});
            
            this.play();
            
            let notification = result.title + " " + result.value + " - ";
            Notifier.focus(notification, result.note, "");
        
        }
    }
    
    play() {
        const beep = new Audio(Consts.getConsts().audioFile);  
        beep.play();
    }
    
    handleSpecial() {
        this.state.special = !this.state.special ? true : false;
    }
    
    render() {
        
        return (
            <div>
                <Badge className="pink white-text" newIcon > {this.state.details} </Badge>
                <br /><br />
                <Switch id="specialDiscount" offLabel="Do Not Receive Special Discounts" onChange={this.handleSpecial.bind(this)} onLabel="Receive Special Discounts" />
                <br /><br />
                <Websocket url={Consts.getConsts().backendSockUrl}
                    onMessage={this.handleData.bind(this)} />
            </div>
        );
        
    }
    
}

export default WebSocketListener;