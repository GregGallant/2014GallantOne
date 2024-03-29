import React from 'react';

export default class Row extends React.Component {

    render() {
        var styles = {
          row: {
            marginLeft: '-15px',
            marginRight: '-15px',
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

    if (this.props.padding === 0 || this.props.padding){
      styles.row.paddingLeft = this.props.padding + 'px';
      styles.row.paddingRight = this.props.padding + 'px';
    }

    if (this.props.style){
      for (var key in this.props.style) { styles.row[key] = this.props.style[key]; }
    }

    return (
      <div>
        <div style={styles.before}></div>
        <div style={styles.row}>
          {this.props.children}
        </div>
        <div style={styles.after}></div>
      </div>
    );
  }
}
