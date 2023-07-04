function showScheduleBlock() {
    document.getElementById("scheduleBlock").style.display = "block";
    document.getElementById("newsBlock").style.display = "none";
}

function showNewsBlock() {
    document.getElementById("scheduleBlock").style.display = "none";
    document.getElementById("newsBlock").style.display = "block";
}
function showAddNewsForm() {
    document.getElementById("addNewsForm").style.display = "block";
    document.getElementById("deleteNewsForm").style.display = "none";
    document.getElementById("editNewsForm").style.display = "none";
}

function showDeleteNewsForm() {
    document.getElementById("addNewsForm").style.display = "none";
    document.getElementById("deleteNewsForm").style.display = "block";
    document.getElementById("editNewsForm").style.display = "none";
}

function showEditNewsForm() {
    document.getElementById("addNewsForm").style.display = "none";
    document.getElementById("deleteNewsForm").style.display = "none";
    document.getElementById("editNewsForm").style.display = "block";
}

function showAddForm() {
    document.getElementById("addForm").style.display = "block";
    document.getElementById("deleteForm").style.display = "none";
    document.getElementById("editForm").style.display = "none";
}

function showDeleteForm() {
    document.getElementById("addForm").style.display = "none";
    document.getElementById("deleteForm").style.display = "block";
    document.getElementById("editForm").style.display = "none";
}

function showEditForm(newsId) {
    // Скрыть все формы изменения новостей
    var editForms = document.getElementsByClassName("edit-form");
    for (var i = 0; i < editForms.length; i++) {
        editForms[i].style.display = "none";
    }

    // Найти форму изменения новости по ID и отобразить ее
    var editForm = document.getElementById("editForm_" + newsId);
    if (editForm) {
        editForm.style.display = "block";
    }
}
