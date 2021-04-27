import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import '../App.css';
import axios from 'axios';

class Authentication extends Component{
	render(){
		return(
			<form>
			Name:<br></br>
			<input type = "text"></input><br></br><br></br>
			Password:<br></br>
			<input type = "password"></input><br></br><br></br>
			<input type = "submit"></input>
			<input type = "reset"></input><br></br><br></br>
			<button id="c"><Link to="/">Back</Link></button>
			</form>
			);
	}
}
export default Authentication;