// checkbox
function toggle(source) {
    checkboxes = document.getElementsByClassName("checkbox");
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}
function update() {
    alert("Rất tiếc chức năng này chưa hoàn thành!");
    history.back();
}
