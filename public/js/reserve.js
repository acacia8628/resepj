function inputDate() {
  const inputValue = document.getElementById('inputDate').value;
  console.log(inputValue);
  document.getElementById('date').innerHTML = inputValue;
}

function inputTime(obj) {
  var index = obj.selectedIndex;
  var text = obj.options[index].text;
  document.getElementById('time').textContent = text;
}
function inputNumber(obj) {
  var index = obj.selectedIndex;
  var text = obj.options[index].text;
  document.getElementById('number').textContent = text;
}