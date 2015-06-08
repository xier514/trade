var need = [];


function is_Need() {
    need.push( document.getElementById("classify").value);
    need.push( document.getElementById("subclass").value);
    need.push( document.getElementById("goods_name").value);
    need.push( document.getElementById("goods_author").value);
    need.push( document.getElementById("goods_public").value);
    need.push( document.getElementById("goods_version").value);
    need.push( document.getElementById("goods_cover").value);
    need.push( document.getElementById("goods_summary").value);
    need.push( document.getElementById("goods_price").value);
    need.push( document.getElementById("goods_amount").value);
    need.push( document.getElementById("goods_new").value);
    for(var i = 0; i < need.length; i++) {
        if(!need[i]) {
            alert("请填写所有必填项");
            return false;
        }
    }
}












