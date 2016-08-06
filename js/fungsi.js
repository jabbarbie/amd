//$(".nav li").click(function(){
//             $(this).addClass("active");
//             return false;  
//});
         
$(function(){
	 $("[rel=popover]").popover();
	 $("[rel=tooltip]").tooltip({placement : 'bottom'});
	 
	 $("#formcoba").submit(function(){
		var nama = $("#nama").val();
		$.ajax({
			type: 'POST',
			url : $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				$("#hasil").html(data);
			}
		});
		return false;
	 });
	 
	 $("#inputnama").submit(function(){
		$.ajax({
			type: 'POST',
			url : 'proses.php',
			data: $(this).serialize(),
			success: function(data) {
				$("#hasil").html(data);
			}
		});
		return false;
		//$("#inputform").modal('hide');
	 });
	 
	 $(".forminput").submit(function(){
		//alert("test");
                $.ajax({
			type: $(this).attr("method"),
			url : $(this).attr("action"),
			//url : "input_query.php",
			data: $(this).serialize(),
			success : function(data) {
				if (data == 0){
					tutup();
				}
				else {
					alert("Isi Datanya: "+data);
				}
			},
			error : function(data){
				alert (data);
			}
		});
		return false;
	 });
        var totalestimasi = $("#totalestimasi").offset().top;
        var totalpart     = $("#totalPart").offset().top;
        $("#btotalestimasi").click(function(){
           $('html, body').animate({scrollTop:totalestimasi}, 1500);
           return false;
        });
        $("#btotalpart").click(function(){
           $('html, body').animate({scrollTop:(totalpart - 500)}, 1500);
           return false;
        });
        $("#batas").click(function(){
           $('html, body').animate({scrollTop:0}, 1500);
           return false;
        });
        
        
});
 
function convertToRupiah(angka){
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
    return rupiah.split('',rupiah.length-1).reverse().join('');
}
function rupiah(){
    var nominal= document.getElementById("nominal").value;
    var rupiah = convertToRupiah(nominal);
    document.getElementById("nominal").value = rupiah;
}
// Fungsi Kormirmasi Delete
function KonfirHapus(delUrl,pesan) {
  if (confirm(pesan)) {
    window.open(delUrl, '_blank');
  }
  else {
	alert("no");
  }
}
function test(){
	alert('zzz');
}