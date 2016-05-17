var Transition = React.addons.TransitionGroup;

var Colors = {
  white: '#fff',
  dark: '#444',
  blue: '#09c'
};
var Lang = {
  toggle_item: 'Toggle Item'
};

var App = React.createClass({displayName: "App",
  getInitialState: function() {
    return {
      item: true
    };
  },
  // _addItem: function () {
  //   var now = moment().format('x').substring(7);
  //   this.setState({list: this.state.list.concat(now)});
  // },
  _toggleItem: function () {
    this.setState({item: !this.state.item});
  },
  render: function () {
    console.log('App:render', this.state);
    var style = {
      app: {
        flexFlow: 'column'
      },
      toggle: {
        background: Colors.dark,
        borderRadius: 3,
        color: Colors.white,
        padding: 20,
        position: 'absolute',
        top: 10
      }
    };
    return (
      React.createElement("div", {className: "center", style: style.app}, 
        React.createElement("button", {onClick: this._toggleItem, style: style.toggle}, Lang.toggle_item), 
        React.createElement(Transition, null, 
          this.state.item && React.createElement(Item, null)
        )
      )
    );
  }
});
var Item = React.createClass({displayName: "Item",
  componentWillAppear: function (callback) {
    console.log('componentWillAppear');
    setTimeout(callback, 1); // need at least one tick to fire transition
  },
  componentDidAppear: function () {
    console.log('componentDidAppear');
    this._enterStyle();
  },
  componentWillEnter: function (callback) {
    console.log('componentWillEnter');
    setTimeout(callback, 1);
  },
  componentDidEnter: function () {
    console.log('componentDidEnter');
    this._enterStyle();
  },
  componentWillLeave: function (callback) {
    console.log('componentWillLeave');
    this._leaveStyle();
    setTimeout(callback, 500); // matches transition duration
  },
  componentDidLeave: function () {
    console.log('componentDidLeave');
  },
  _enterStyle: function () {
    var el = this.refs.item.getDOMNode();
    el.style.opacity = 1;
  },
  _leaveStyle: function () {
    var el = this.refs.item.getDOMNode();
    el.style.opacity = 0;
  },
  render: function () {
    var style = {
      width: 100,
      height: 100,
      background: Colors.blue,
      opacity: 0,
      transition: 'opacity .5s'
    };
    return React.createElement("div", {ref: "item", style: style});
  }
});

ReactDOM.render(React.createElement(App, null), document.body);