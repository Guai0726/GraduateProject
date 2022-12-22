var nameElement = document.getElementById("username");
var emailElement = document.getElementById("useremail");
var feedbackElement = document.getElementById("feedback");
function processFormData() {
const name = nameElement.value;
const email = emailElement.value;
alert("謝謝" + name + "的回饋，我們將再用email:" + email + "與您聯繫!");
}
function addMsg() {
let table = document.getElementById("Feedback_table");
let newRow = table.insertRow();
newRow.insertCell().innerHTML = new Date().toLocaleString();
newRow.insertCell().innerHTML = nameElement.value;
newRow.insertCell().innerHTML = emailElement.value;
newRow.insertCell().innerHTML = feedbackElement.value;
newRow.insertCell().innerHTML = '<input type="button" value="刪除" onclick="delRow(this)"></input>'
nameElement.value = '';
emailElement.value = '';
feedbackElement.value = '';
}
function delRow(r) {
var i = r.parentNode.parentNode.rowIndex;
document.getElementById("Feedback_table").deleteRow(i);
alert("謝謝您的回饋，我們已將資訊刪除!");
}