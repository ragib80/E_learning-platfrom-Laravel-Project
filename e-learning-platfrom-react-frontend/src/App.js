import React, { Component } from 'react';
import "@progress/kendo-theme-material/dist/all.css";
import "hammerjs";
import './App.css';
import Main from './components/admin/MainComponent';
import { BrowserRouter } from 'react-router-dom';

class App extends Component {



  render() {
    return (
      <div>
        <BrowserRouter>
        <Main />

    </BrowserRouter>

      </div>
    );
  }
}


export default App;
