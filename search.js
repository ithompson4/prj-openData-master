var SearchBar = require('react-search-bar');
var React = require('react');
var ReactDOM = require('react-dom');
var fs = require('fs');

var file = fs.readFileSync('/home/scherman/NodeServices/vizInfo.json');
var fileParsed = JSON.parse(file);
var names = [];
for(var item in fileParsed) {
  names.push(fileParsed[item].Name);
}

var App = React.createClass({
  onChange(input, resolve) {

    setTimeout(function() {
      var maps = [];
      var sug = [];

      for(var i = 0; i < names.length; i++) {
      	maps.push(names[i]);
      }

      var toResolve = []; 
      maps.filter(function(d) {
        var isMatch = d.match(new RegExp('^' + input.replace(/\W\s/g, ''), 'i'));
        if(isMatch) toResolve.push(isMatch.input);
      });
      resolve(toResolve);
    }, 25);
  },
	onSearch(input) {
		console.log('search');
	},
  onSubmit(input) {
    console.log('submit');
  },
	render() {
		return <SearchBar placeholder="search 'U'" onChange={this.onChange} onSearch={this.onSearch} autofocus />
	}
});

ReactDOM.render(<App />, document.getElementById('searchBar'));

