function openChat(username) {
    var chatDiv = document.getElementById("chat");
    chatDiv.style.display = "block";
    var chatTitle = document.getElementById("chat-title");
    chatTitle.innerHTML = "Czat z użytkownikiem " + username;
    var recipient_idInput = document.querySelector("#chat-form input[name='recipient_id']");
    recipient_idInput.value = username;
    setInterval(function () {
        loadChatHistory(username);
    }, 5000);

};
function loadChatHistory(username) {
    var chatHistory = document.getElementById("history");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            chatHistory.innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "get_chat_history.php?recipient_id=" + username, true);

    xhttp.send();
};
document.getElementById("chat-form").addEventListener("submit", function (event) {
    event.preventDefault();
    var form = this;
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            form.reset();
            loadChatHistory(formData.get('recipient_id')); // załaduj historię czatu na nowo
        }
    };
    xhr.open(form.method, form.action, true);
    xhr.send(formData);
});


function dodajForm() {
    document.querySelector(".formulaz").style.display = "block";
    document.querySelector(".addbtn2").style.display = "none";
};



