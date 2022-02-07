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
  var value = obj.options[index].value;
  document.getElementById('number_check').textContent = text;
  document.getElementById('price_check').textContent = (price * value) + '円';
  document.getElementById('price').value = (price * value);
}