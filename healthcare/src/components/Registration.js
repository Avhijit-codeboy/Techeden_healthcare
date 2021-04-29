import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import '../App.css';

class Registration extends Component{
	render(){
		return(
			<div id="form-container">
			<form>
			Id:<br></br>
			<input type = "text"></input><br></br><br></br>
			Password:<br></br>
			<input type = "password"></input><br></br><br></br>
			Confirm Password:<br></br>
			<input type = "password"></input><br></br><br></br>
			<input type = "submit" value="Sign Up"></input>
			<input type = "reset"></input><br></br><br></br>
			</form>
			</div>
			);
	}
}
export default Registration;