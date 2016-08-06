
function inputdata(data,lebar,tinggi){
    window.open(data,"Tambah PO","menubar=no,width="+lebar+",screenX=300,screenY=50,location=no,height="+tinggi);
}
function sate(kambing){
    window.open(kambing,"Delete PO","menubar=no,width=175,height=20");
}
function tutup(){
    self.close();
    window.opener.location.reload();
}
function directlink(url){
    tutup();
}