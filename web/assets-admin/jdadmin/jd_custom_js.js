function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("jdtabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("jdtablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
$("#jdAddButton").click(function(){
    var string = '<tr>';
    string = string + '<td><input type="text" class="form-control input-flat input-sm" placeholder="Kích cỡ sản phẩm" name="size"></td>';
    string = string + '<td><input type="number" class="form-control input-flat input-sm" placeholder="Giá tiền" name="price"></td>';
    string = string + '<td><input type="number" class="form-control input-flat input-sm" placeholder="Số lượng tồn" name="amount"></td>';
    string = string + '</tr>';
    $(string).insertBefore('.jdButtonRow');
    
});