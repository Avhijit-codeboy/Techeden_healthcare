import React, { Component } from 'react';
import { BrowserRouter as Router, Route } from 'react-router-dom';
import './App.css';
import Homepage from './components/Homepage';
import Authentication from './components/Authentication';
import People from './components/People';
class App extends Component{
  render(){
    return (
      <Router>
        <div>
          <Route exact path='/' component={Homepage} />
          <Route path='/authentication' component={Authentication} />
          <Route path='/people' component={People} />
        </div>
      </Router>
      );
  }
}
export default App;