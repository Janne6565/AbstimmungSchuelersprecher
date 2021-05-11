function changed(number){
    var obj = document.getElementById('verify' + number);
    if (obj.value !== ""){
        if (obj.value.length > 1){
            obj.value = obj.value.charAt(1);
        }
        try {
            var newObj = document.getElementById('verify' + (number + 1))
            newObj.select()
        }catch{
            var code = document.getElementById('verify1').value + document.getElementById('verify2').value + document.getElementById('verify3').value + document.getElementById('verify4').value + document.getElementById('verify5').value
            var data = new FormData();
            data.append("code", code);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "checkCode.php");
            xhr.send(data);
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var antwort = this.responseText;
                    if (antwort == "true"){
                        document.getElementById('verify').classList.add('verified');
                        document.getElementById('verify').classList.add('worked');
                        document.getElementById('verify').setAttribute("src", "Assets/verify.svg");
                        openSelection();
                    }else{
                        document.getElementById('verify').classList.add('verified');
                        document.getElementById('verify').setAttribute("src", "Assets/unverified.svg");
                        document.getElementById('openLater').innerHTML = "";
                    }
                }
            };
        }
    } else{
        try {
            var newObj = document.getElementById('verify' + (number - 1))
            newObj.select()
        }catch{

        }
    }
}

function openSelection(){
    document.getElementById('openLater').innerHTML = "<input type=\"text\" class=\"searchName\" id=\"searchName\" oninput=\"changeSelection()\" placeholder=\"Max Musterman\">\n" +
        "        <section class=\"selection\" id=\"selection\">\n" +
        "        </section>\n" +
        "        <input type=\"button\" value=\"Absenden\" onclick=\"submit()\" class='submit'>";

}

function changeSelection(){
    let input = document.getElementById("searchName");
    let querry = input.value;
    var data = new FormData();
    data.append("Id", getSelected())
    data.append("querry", querry);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "checkUser.php");
    xhr.send(data);
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var antwort = this.responseText;
            document.getElementById("selection").innerHTML = (antwort);
        }
    };
}

let selected;

function getSelected(){
    return selected;
}

function setSelected(num){
    selected = num;
}

function select(num){
    if (getSelected() != null) {
        let newSelected = document.getElementById('select' + getSelected());
        newSelected.setAttribute("selected", "false");
    }
    setSelected(num);
    let selectedNew = document.getElementById('select' + getSelected());
    selectedNew.setAttribute("selected", "true");
}

function submit(){
    if (selected != null) {
        var code = document.getElementById('verify1').value + document.getElementById('verify2').value + document.getElementById('verify3').value + document.getElementById('verify4').value + document.getElementById('verify5').value
        var data = new FormData();
        data.append("id", getSelected())
        data.append("code", code);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "submit.php");
        xhr.send(data);
        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var antwort = this.responseText;
                alert(antwort)
            }
        };
    }
}