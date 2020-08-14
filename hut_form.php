<style>
 
#myInput {
     background-image: url('<?php echo base_url()?>assets/img/search-icon-blue.png'); 
    background-position: 10px 12px; 
    background-repeat: no-repeat; 
    width: 100%; 
    font-size: 14px; 
    padding: 12px 20px 12px 40px;
    border: 1px solid #ddd; 
    margin-bottom: 12px; 
}

#myTable {
    border-collapse: collapse; 
    width: 100%; 
    border: 1px solid #ddd; 
    font-size: 14px;
}

#myTable th, #myTable td {
    text-align: left;
    padding: 5px; 
}

#myTable tr {
    border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
   
    background-color: #f1f1f1;
}

table { table-layout: fixed; }
table th, table td { overflow: hidden; }

.rightJustified {
        text-align: right;
    }
    
.total{
        font-size: 14px;
        font-weight: bold;
        color: blue;
   }
   
.bodycontainer { width: 1200px; max-height: 500px; margin: 0; overflow-y: auto; }
.table-scrollable { margin: 0; padding: 0; }

.modal-bodys {
    max-height:250px; 
    overflow-y: auto;
}
</style>



<div class="container-fluid">
   <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input  <?php echo $this->session->userdata['judul']; ?>
   </div>
  
  <!-- Ganti 1 -->
  
   <form id="frmhut" action="<?php echo base_url('admin/hut/input_aksi');?>" class="form-horizontal" method="post">
       <div class="form-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab1" data-toggle="tab">Detail</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#tab2" data-toggle="tab">Posting</a>
                </li> -->
            
            </ul>
                      		
			<div class="tab-content">
				<div class="tab-pane mt-3 active" id="tab1">	
					<div class="col-md-12">
						<div class="form-group row">
							<div class="col-md-1">
								<label>Bukti# </label>
							</div>
							<div class="col-md-3 ">
								<input required type="text" id="NO_BUKTI" name="NO_BUKTI" value='+' class="form-control" readonly >
							</div>

							<div class="col-md-1 ">
								<input type="hidden" class="form-control">
							</div>

							<div class="col-md-1">
								<label>Suplier </label>
							</div>
						
						   <div class="col-md-2 input-group">
								<input name="KODES"  id="KODES"  maxlength="30" type="text" class="form-control KODES" onkeypress="return tabE(this,event)" readonly>																						
								<span class="input-group-btn">
									<a class="btn default" id="0" data-target="#myModalb" data-toggle="modal" href="#lupKODES" onclick="getid(this.id)"><i class="fa fa-search"></i></a>
								</span>	
							</div>
							<div class="col-md-1">
								<input type="text" name="EXP"  id="EXP" class="form-control EXP" readonly>
							</div>

						</div>
					</div>

					<div class="col-md-12">
					
						<div class="form-group row">
							<div class="col-md-1">
								<label>Tanggal</label>
							</div>
							
							<div class="col-md-3 ">	
							<input type="text" class="date form-control" id="TGL" name="TGL" data-date-format="dd-mm-yyyy" 
								   value="<?php if(isset($_POST["tampilkan"])) { echo $_POST["TGL"]; } else echo date('d-m-Y'); ?>" readonly >
							</div>

							<div class="col-md-1 ">
								<input type="hidden" class="form-control">
							</div>

							<div class="col-md-1">
								<label></label>
							</div>
							<div class="col-md-3 ">						
									<input type="text"  id="NAMAS"    name="NAMAS" class="form-control NAMAS" value="" readonly >
							</div>

						</div>

					</div>		

					
					<div class="col-md-12">
					
						<div class="form-group row">
							<div class="col-md-1">
								<label>Type </label>
							</div>
							<div class="col-md-3 ">						
								<select class="form-control" name="TYPE" id="TYPE" style="width: 100%;" >
									<option value="">Please Select</option>
									<option value="CASH">Cash</option>
									<option value="TRANF">Transfer</option>
								</select>
							</div>

							<div class="col-md-1 ">
								<input type="hidden" class="form-control">
							</div>

							<div class="col-md-1">
								<label>-</label>
							</div>
							<div class="col-md-3 ">						
									<input type="text"  id="ALAMAT"    name="ALAMAT" class="form-control ALAMAT" readonly >
							</div>

						</div>

					</div>					
					
					<div class="col-md-12">
					
						<div class="form-group row">
							<div class="col-md-1">
								<label></label>
							</div>
						
						   <div class="col-md-3 ">
								<input type="hidden" class="form-control">
							</div>

							<div class="col-md-1 ">
								<input type="hidden" class="form-control">
							</div>

							<div class="col-md-1">
								<label>Notes</label>
							</div>
							<div class="col-md-3 ">
									<input type="text"  id="NOTES"    name="NOTES" class="form-control NOTES" value="" >	
							</div>
						</div>

					</div>
					
                        <div class="row">
                            <div class="col-md-12">
                            <div class="table-responsive bodycontainer scrollable">
                            <table id="datatable" class="table table-hoverx table-stripedx table-borderedx table-condensed table-scrollable">
                            
                            <thead>
                                <tr>
                                <th width="80px" style="text-align: right">No.</th>
                                <th width="200px" style="text-align: left">Faktur</th>
                                <th width="200px" style="text-align: right">Total</th>
                                <th width="200px" style="text-align: right">Bayar</th>
                                <th width="200px" style="text-align: right">Lain</th>
                                <th width="200px" style="text-align: right">Sisa</th>
                                <th width="60px"></th>			
                                
                                </tr>
                            </thead>
                            <tbody>
                            <tr>	
                                <td width="80px" ><input name="REC[]"    id="REC0" type="text" value="1"  class="form-control REC"  onkeypress="return tabE(this,event)" readonly></td>
                               												   
                                <td width="200px">
                                    <div class="input-group">														        
                                        <input name="NO_FAKTUR[]"  id="NO_FAKTUR0"  maxlength="30" type="text" class="form-control NO_FAKTUR" readonly>
									    <span class="input-group-btn">
                                            <a class="btn default bt_faktur" id="0" data-target="#myModal" data-toggle="modal" href="#lupNO_FAKTUR"  onfocusout="hitung()"><i class="fa fa-search"></i></a>
                                        </span>						                
                                    </div>
                               
                                </td>
                                      
                                <td width="200px" ><input name="TOTAL[]"    onchange="hitung()" value="0" id="TOTAL0" type="text" class="form-control TOTAL rightJustified numinput" readonly ></td>
                                <td width="200px" ><input name="BAYAR[]"    onchange="hitung()" value="0" id="BAYAR0" type="text" class="form-control BAYAR rightJustified numinput"  ></td>
                                <td width="200px" ><input name="LAIN[]"    onchange="hitung()" value="0" id="LAIN0" type="text" class="form-control LAIN rightJustified numinput" ></td>
                                <td width="200px" ><input name="SISA[]"    onchange="hitung()" value="0" id="SISA0" type="text" class="form-control SISA rightJustified numinput" readonly ></td>
                                <td  width="60px">
                                    <button type="button" class="btn btn-sm btn-circle btn-outline-danger btn-delete"
                                        onclick="">
                                        <i class="fa fa-fw fa-trash-alt"></i>
                                    </button>
                                </td>      
                             </tr>
                            
                            </tbody>
							<tfoot>
								<TD width="80px"></td>
								<TD width="200px"></td>
								<TD width="200px"><input class="form-control TTOTAL rightJustified numinput" id="TTOTAL" name="TTOTAL" readonly></td>
								<TD width="200px"><input class="form-control TBAYAR rightJustified numinput" id="TBAYAR" name="TBAYAR" readonly></td>
								<TD width="200px"><input class="form-control TLAIN rightJustified numinput" id="TLAIN" name="TLAIN" readonly></td>
								<TD width="200px"><input class="form-control TSISA rightJustified numinput" id="TSISA" name="TSISA" readonly></td>
								<TD width="60px"></td>
														
                            </tfoot>
                            </table>    
                            </div>
                            </div>
                                     <div class="col-md-2 row">  
                                                       
                                                  <button type="button"  onclick="tambah()" class="btn btn-sm btn-success"><i class="fas fa-plus fa-sm md-3"></i> </button>
                                                      
                                     </div>

							</div>
						</div>
						
				<!--tab-->
						<!-- <div class="tab-pane mt-3" id="tab2">	

							<div class="col-md-12">
								<div class="form-group row">
									<div class="col-md-1">
										<label>Tgl Posting</label>
									</div>
									<div class="col-md-3 ">	
									<input type="text" class="date form-control" id="TGL_POST" name="TGL_POST" data-date-format="dd-mm-yyyy" 
										value="<?php if(isset($_POST["tampilkan"])) { echo $_POST["TGL_POST"]; } else echo date('d-m-Y'); ?>" >
									</div>
									<div class="col-md-2 nopadding">
										<p>Tgl TF / Tgl Cair Uang Giro</p>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group row">
									<div class="col-md-1">
										<label>No Bayar</label>
									</div>
									<div class="col-md-3 ">
										<input required type="text" id="NO_BAYAR" name="NO_BAYAR" value='+' class="form-control" >
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group row">
									<div class="col-md-1">
								<input type="hidden" class="form-control">
									</div>
									<div class="col-md-3 ">
										<button>Posting</button>
									</div>
								</div>
							</div> -->

						</div>
				<!--tab-->
				</div>
		  			 <br>
		               <div class="row">
							<div class="col-xs-9">
								<div class="wells">		
									<div class="btn-group">
										<button type="submit"  class="btn btn-success"><i class="fa fa-save"></i> Save</button>
												
									  	<a type="button" href="javascript:javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
									</div>
									<h4><span id="error" style="display:none; color:#F00">Terjadi Kesalahan... </span> <span id="success" style="display:none; color:#0C0">Data sudah disimpan...</span></h4>								
								</div>															
							</div>						
						</div>													
	       </div>
        </div>  
    </form>
</div>


 
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
 
	 <!-- Modal content-->
	 <div class="modal-content">
	   <div class="modal-header">
		 
		 <h4 class="modal-title">Faktur#</h4>
	   </div>
	   <div class="modal-body">
		 <table class='table table-bordered' id='example'>
		 <thead>	
				  <th>Faktur#</th>
				  <th>Tgl</th>
				  <th>Suplier</th>
				  <th>Total</th>
				  <th>Bayar</th>
				  <th>Sisa</th>				 
				  </thead>
			  <tbody id="show-data">
			  
			  </tbody>
		 </table>
	   </div>
	   <div class="modal-footer">
		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   </div>
	 </div>
 
   </div>
 </div>
 
 

<div id="myModalb" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
       <h4 class="modal-title">Suplier</h4>
      </div>
      <div class="modal-body">
        <table class='table table-bordered' id='exampleb'>
			<thead>	
				<th>Kode</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kota</th>				
				<th>Exp</th>
				<th>Type</th>				
				</thead>
			<tbody>
			<?php $sql = "SELECT KODES,NAMAS,ALAMAT,KOTA,sup.EXP,sup.TYPE from sup where sup.type='A' order by kodes ";
			$a = $this->db->query($sql)->result();
			foreach($a as $b ) { ?>
			<tr>
				<td class='NOVAL'><a href="#" class="select_kodes"><?php echo $b->KODES;?></a></td>
				<td class='NAVAL'><?php echo $b->NAMAS;?></td>
				<td class='ALMVAL'><?php echo $b->ALAMAT;?></td>
				<td class='KOTVAL'><?php echo $b->KOTA;?></td>
				<td class='EXPVAL'><?php echo $b->EXP;?></td>
				<td class='TYPVAL'><?php echo $b->TYPE;?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#example').DataTable({
      dom: "<'row'<'col-md-6'><'col-md-6'>>" + // 
			"<'row'<'col-md-6'f><'col-md-6'l>>" + // peletakan entries, search, dan test_btn
			"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>", // peletakan show dan halaman
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
	  order: true,
  });

  $('#exampleb').DataTable({
      dom: "<'row'<'col-md-6'><'col-md-6'>>" + // 
			"<'row'<'col-md-6'f><'col-md-6'l>>" + // peletakan entries, search, dan test_btn
			"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>", // peletakan show dan halaman
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
	  order: true,
  });

  $('#examplec').DataTable({
      dom: "<'row'<'col-md-6'><'col-md-6'>>" + // 
			"<'row'<'col-md-6'f><'col-md-6'l>>" + // peletakan entries, search, dan test_btn
			"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>", // peletakan show dan halaman
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ],
	  order: true,
  });
  
  
} );
</script> 


<script>
var target;
var idrow  = 1;

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

$(document).ready(function()
{
	$('.numinput').on('input', function() {
		this.value = this.value.replace(/(?!^-)[^0-9.]/g, "").replace(/(\..*)\./g, '$1').replace(/\B(?=(\d{3})+(?!\d))/g, ","); 
		hitung();
	});
	
	 //$('input.number').keyup(function(event) {
		$('body').on('keyup', 'input.number', function() {

		  // skip for arrow keys
		  if(event.which != 190)
		  {
			if(event.which >= 37 && event.which <= 40) return;
		  }
		  
		  // format number
		  $(this).val(function(index, value) {
			return value
			.replace(/\D/g, "")
			.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			;
		  });
		  
		  hitung();
		});
		
		$('#myModal').on('show.bs.modal', function (e) {
		  target = $(e.relatedTarget);
		  
		});

		$('body').on('click', '.select_faktur', function() 
		{			
			var val = $(this).parents("tr").find(".NOVAL").text();
			
			target.parents("tr").find(".NO_FAKTUR").val(val);

            var val = $(this).parents("tr").find(".TOTVAL").text();
			
			target.parents("tr").find(".TOTAL").val(val);

			if( $(this).parents("tr").find(".BAYVAL").text()=='0.00'){
				
            var val = $(this).parents("tr").find(".TOTVAL").text();
			
			target.parents("tr").find(".BAYAR").val(val);

			} else {
			
            var val = $(this).parents("tr").find(".BAYVAL").text();
			
			target.parents("tr").find(".BAYAR").val(val);

			}
			
            var val = $(this).parents("tr").find(".SISAVAL").text();
			
			target.parents("tr").find(".SISA").val(val);
			
            $('#myModal').modal('toggle');	
		});

		
		$('#myModalb').on('show.bs.modal', function (e) {
		  target = $(e.relatedTarget);
		  
		});
		
		$('body').on('click', '.select_kodes', function() 
		{			

			var val = $(this).parents("tr").find(".NOVAL").text();
			
			target.parents("div").find(".KODES").val(val);
      
            var val = $(this).parents("tr").find(".NAVAL").text();
			
			target.parents("div").find(".NAMAS").val(val);

			var val = $(this).parents("tr").find(".ALMVAL").text();
			
			target.parents("div").find(".ALAMAT").val(val);
			
			var val = $(this).parents("tr").find(".KOTVAL").text();
			
			target.parents("div").find(".KOTA").val(val);

			var val = $(this).parents("tr").find(".EXPVAL").text();
			
			target.parents("div").find(".EXP").val(val);

            $('#myModalb').modal('toggle');			

		});
		
		$('#myModalc').on('show.bs.modal', function (e) {
		  target = $(e.relatedTarget);
		  
		});
		
		$('body').on('click', '.selectacno', function() 
		{			

			var val = $(this).parents("tr").find(".NOVAL").text();
			
			target.parents("div").find(".BACNO").val(val);
			
			var val = $(this).parents("tr").find(".TGVAL").text();
			
			target.parents("div").find(".BNAMA").val(val);
    
            $('#myModalc').modal('toggle');			

		});
		
        $('body').on('click', '.btn-delete', function() 
		{			
			var val = $(this).parents("tr").remove();
			idrow--;
			nomor();
		});

		$(".date").datepicker({
			'dateFormat':'dd-mm-yy',
		});

		$('.bt_faktur').click(function(){
          var type = $('#TYPE option:selected').val(); //get the attribute value
		  var kodes = $('#KODES').val();
          $.ajax({
              type:'get',
              url : '<?php echo base_url('index.php/admin/hut/no_faktur'); ?>',
              data:{type : type, kodes : kodes},
              dataType: 'json',
              success:function(response) {
				// alert(response);
					var html = '';
                    var i;
                    for(i=0; i<response.length; i++){
                        html += '<tr>'+
								 '<td class="NOVAL"><a href="#" class="select_faktur">'+response[i].NO_BUKTI+'</td>'+
								 '<td>'+response[i].TGL+'</td>'+
								 '<td>'+response[i].NAMAS+'</td>'+
								 '<td class="TOTVAL">'+numberWithCommas(response[i].TOTAL)+'</td>'+
								 '<td class="BAYVAL align="right">'+numberWithCommas(response[i].BAYAR)+'</td>'+
								 '<td class="SISVAL align="right">'+numberWithCommas(response[i].SISA)+'</td>'+
								 '</tr>';
                    }
					$('#myModal').modal({backdrop: 'static', keyboard: true, show: true});
					$('#show-data').html(html);
			}
          });
      	});

});

function nomor()
{
	var i = 1;
	$(".REC").each(function()
	{
		$(this).val(i++);
	});
	hitung();
}

function hitung()
{
    
	var TBAY = 0;
	var TTOT = 0;
	var TLAIN = 0;
	var TSISA = 0;
    var total_row =idrow;
  
    for (i=0;i<total_row;i++)
    {
        var tot = parseFloat($('#TOTAL'+i).val().replace(/,/g, ''));
        var bay = parseFloat($('#BAYAR'+i).val().replace(/,/g, ''));
        var lain = parseFloat($('#LAIN'+i).val().replace(/,/g, ''));

        var sis = tot-bay+lain;
        if(isNaN(sis)) sis = 0;
        $('#SISA'+i).val(numberWithCommas(sis));
		TBAY+=bay;
		TLAIN+=lain;
		TSISA+=sis;
    };

	$(".TOTAL").each(function()
	{
		var val = parseFloat($(this).val().replace(/,/g, ''));
		if(isNaN(val)) val = 0;
		TTOT+=val;
	});
	

	$("#TTOTAL").val(numberWithCommas(TTOT));
    $('#TBAYAR').val(numberWithCommas(TBAY));
	$("#TLAIN").val(numberWithCommas(TLAIN));
    $('#TSISA').val(numberWithCommas(TSISA));

}


function tambah(){
    
    var x=document.getElementById('datatable').insertRow(idrow+1);
    var td1=x.insertCell(0);
    var td2=x.insertCell(1);
    var td3=x.insertCell(2);
	var td4=x.insertCell(3);
	var td5=x.insertCell(4);
	var td6=x.insertCell(5);
	var td7=x.insertCell(6);

	
	 var akun0="<div class='input-group'>";														        
	 var akun1="<input name='NO_FAKTUR[]'  maxlength='20' type='text' class='form-control NO_FAKTUR'  id=KD_BRG"+idrow+" readonly>";
	 var akun2="<span class='input-group-btn'>";
	 var akun3="<a data-target=\"#myModal\" data-toggle=\"modal\" class='btn default' data-toggle='modal' href='#lupNO_FAKTUR'  "+"id="+idrow+" onfocusout='hitung()'><i class='fa fa-search'></i></a>";	
	 var akun4="</span></div>";	 
	 var akun=akun0+akun1+akun2+akun3+akun4;
	 
	
	td1.innerHTML="<input name='REC[]'    id=REC"+idrow+" type='text' class='REC form-control '  onkeypress='return tabE(this,event)' readonly>";
    td2.innerHTML=akun;
	td3.innerHTML="<input name='TOTAL[]'    id=TOTAL"+idrow+"   onchange='hitung()' value='0'  type='text' class='form-control rightJustified TOTAL  numinput' readonly >";
	td4.innerHTML="<input name='BAYAR[]'    id=BAYAR"+idrow+"   onchange='hitung()' value='0'  type='text' class='form-control rightJustified BAYAR  numinput'  >";
	td5.innerHTML="<input name='LAIN[]'    id=LAIN"+idrow+"   onchange='hitung()' value='0'  type='text' class='form-control rightJustified LAIN  numinput' >";
	td6.innerHTML="<input name='SISA[]'    id=SISA"+idrow+"   onchange='hitung()' value='0'  type='text' class='form-control rightJustified SISA  numinput' readonly >";
    td7.innerHTML="<button type='button' class='btn btn-sm btn-circle btn-outline-danger btn-delete' onclick=''> <i class='fa fa-fw fa-trash-alt'></i> </button>";
                                 
	



    idrow++;
	nomor();


}


   
function hapus(){
		if(idrow>1){
			var x=document.getElementById('datatable').deleteRow(idrow);
			idrow--;
			nomor();
		}
	}


</script>
