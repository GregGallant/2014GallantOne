import React from 'react';
import ReactDOM from 'react-dom';


export default class Container extends React.Component {

    render() {

        var styles = {
          container: {
            marginRight: 'auto',
            marginLeft: 'auto',
            paddingLeft: '15px',
            paddingRight: '15px',
            boxSizing: 'border-box'
          },
          before: {
            content: ' ',
            display: 'table'
          },
          after: {
            content: ' ',
            display: 'table',
            clear: 'both'
          }
        };

    if (this.props.style){
      for (var key in this.props.style) { styles.container[key] = this.props.style[key]; }
    }

    return (
      <div>
        <div style={styles.before}></div>
        <div style={styles.container}>
          {this.props.children}
        </div>
        <div style={styles.after}></div>
      </div>
    );
  }
}
