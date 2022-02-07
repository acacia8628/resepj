function inputDate() {
  const inputValue = document.getElementById('r_date').value;
  document.getElementById('date_check').innerHTML = inputValue;
}
function inputTime(obj) {
  var index = obj.selectedIndex;
  var text = obj.options[index].text;
  document.getElementById('time_check').textContent = text;
}
function inputNumber(obj) {
  var index = obj.selectedIndex;
  var text = obj.options[index].text;
  document.getElementById('number_check').textContent = text;
}