import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import '../App.css';
import axios from 'axios';

class Authentication extends Component{
	constructor(props) {
    super(props);
    this.state = {
      uname: '',
      pname: '',
    };
  }
  myChangeHandler = (event) => {
    let nam = event.target.name;
    let val = event.target.value;
    this.setState({[nam]: val});
  }
	render(){
    return(
      <div id="loginform">
        <FormHeader title="Login" />
        <Form uname = {this.state.uname} pname={this.state.pname} event={this.myChangeHandler}/>
        
      </div>
    )
  }
  }
  
const FormHeader = props => (
  <h2 id="headerTitle">{props.title}</h2>
);


const Form = props => (
 <div>
   <FormInput description="Username" placeholder="Enter your username" type="text" name="uname" event={props.event}/>
   <FormInput description="Password" placeholder="Enter your password" type="password" name="pname" event={props.event}/>
   <FormButton title="Log In"/>
   <div id="alternativeLogin">
    <label>Or sign up with:</label>
    </div>
   <FormButton title="Sign Up" link="/Registration"/>
 </div>
);

const FormButton = props => (
<div id="button" class="row">
  <button><Link to={props.link}>{props.title}</Link></button>
</div>
);

const FormInput = props => (
<div class="row">
  <label>{props.description}</label>
  <input type={props.type} placeholder={props.placeholder} name ={props.name} onChange={props.event}/>
</div>  
);

export default Authentication;
