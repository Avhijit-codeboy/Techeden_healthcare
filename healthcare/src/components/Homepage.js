import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import '../App.css';
import axios from 'axios';

class Homepage extends Component{
	render(){
		return(
			<div>
			<button id="a"><Link to="/authentication"> Shopkeeper</Link></button>
			<button id="b"><Link to="/people"> People </Link></button>
			</div>
			);
	}
}
export default Homepage;