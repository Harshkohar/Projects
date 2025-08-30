let displayContainer = '';
function display() {
  document.querySelector('#main').innerHTML = displayContainer;
}

function equal() {
  let prev = displayContainer;
  document.querySelector('#previous').innerHTML=prev;
  displayContainer=eval(displayContainer);
}
