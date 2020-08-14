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
	input[type=text]:focus {
		width: 100%;
	}
	table { 
		table-layout: fixed; 
	}
	table th, table td { 
		overflow: hidden; 
	}
	.rightJustified {
		text-align: right;
	}	
	.ttotal { font-size: 14px; font-weight: bold; color: blue;}
	.tjumlah { font-size: 14px; font-weight: bold; color: blue;}

	.tjam1 { font-size: 14px; font-weight: bold; color: black;}
	.tjam2 { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_lem1 { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_lem2 { font-size: 14px; font-weight: bold; color: black;}
	.tjam1rp { font-size: 14px; font-weight: bold; color: black;}
	.tjam2rp { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_ms { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_ik { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_nb { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_hr { font-size: 14px; font-weight: bold; color: black;}
	.ttot_hr { font-size: 14px; font-weight: bold; color: black;}
	.ttot_bon { font-size: 14px; font-weight: bold; color: black;}
	.ttot_bon1 { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_sub { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_hari { font-size: 14px; font-weight: bold; color: black;}
    .ttotal_lain { font-size: 14px; font-weight: bold; color: black;}
	.ttotal_poto { font-size: 14px; font-weight: bold; color: black;}

	.bodycontainer { 
		width: 1200px; 
		max-height: 500px; 
		margin: 0; 
		overflow-y: auto; 
	}
	.table-scrollable { 
		margin: 0; 
		padding: 0; 
	}
	.modal-bodys {
		max-height:250px; 
		overflow-y: auto;
	}

</style>

<div class="container-fluid">
   	<div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Input <?php echo $this->session->userdata['judul']; ?>
   	</div>
   	<form id="frmharian" method="post" action="<?php echo base_url('admin/transaksi_harian/input_aksi')?>">
       	<div class="form-body">
		   <div class="col-md-12">
				<div class="form-group row">
					<div class="col-md-1">
						<label style="font-size: 15px; font-weight: bold; color: black;">Bagian </label>
					</div>
					<div class="col-md-2 input-group">
						<input name="KD_BAG" id="KD_BAG" type="text" class="form-control KD_BAG" size="100%"  readonly>																						
						<span class="input-group-btn">
							<a class="btn default" id="0" data-target="#myModala" data-toggle="modal" href="#lupBACNO" onclick="getid(this.id)"><i class="fa fa-search"></i></a>
						</span>	
					</div>
					<div class="col-md-2 ">						
						<input type="text" id="NM_BAG" name="NM_BAG" value="" class="form-control NM_BAG" readonly >
					</div>
                    <div class="col-md-1 ">
				   		<label style="font-size: 15px; font-weight: bold; color: black;">Bukti# </label>
					</div>
					<div class="col-sm-2 nopadding">
					   	<input required type="text" id="NO_BUKTI" name="NO_BUKTI" class="form-control NO_BUKTI" readonly>
                   	</div>
				</div>
			</div>
			<div class="col-md-12">
               	<div class="form-group row">
                    <div class="col-md-1 ">
				   		<label style="font-size: 15px; font-weight: bold; color: black;">Uraian </label>
					</div>
					<div class="col-sm-4 nopadding">
					   	<input required type="text" id="URAIAN" name="URAIAN" class="form-control URAIAN">
                   	</div>
               	</div>
           	</div>
			<div class="col-md-12">
               	<div class="form-group row">
                    <div class="col-md-1 ">
				   		<label style="font-size: 15px; font-weight: bold; color: black;">Notes </label>
					</div>
					<div class="col-sm-4 nopadding">
					   	<input required type="text" id="NOTES" name="NOTES" class="form-control NOTES">
                   	</div>
               	</div>
           	</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive bodycontainer scrollable">
                        <table id="datatable" class="table table-hoverx table-stripedx table-borderedx table-condensed table-scrollable">
                            <thead>
                                <tr>
									<th width="75px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">No.</th>
									<th width="250px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">NIP </th>
									<th width="250px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">NAMA</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">PTKP</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">HR</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">JAM1</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">JAM2</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">LB1</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">LB2</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">JAM1RP</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">JAM2RP</th>
                                    <th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">LAIN</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">POTONG</th>
									<th width="200px" style="font-size: 15px; font-weight: bold; color: black; text-align: center;">TOTAL</th>
									<th width="75px"></th>
                                </tr>
                            </thead>
                            <tbody>
								<tr>	
								<td width="75px"><input name="REC[]" id="REC0" type="text" value="1"  class="form-control REC" onkeypress="return tabE(this,event)" readonly></td>											   
									<td width="250px">
										<div class="input-group">														        
												<input name="KD_PEG[]" id="KD_PEG0" type="text" class="form-control KD_PEG" readonly><span class="input-group-btn">
												<a class="btn default bt_pegawai" id="0" data-target="#myModal" data-toggle="modal" href="#lupACNO" onclick="getid(this.id)"><i class="fa fa-search"></i></a>
											</span>						                
										</div>
									</td>
									<td width="250px"><input name="NM_PEG[]" id="NM_PEG0" type="text" class="form-control NM_PEG" readonly></td>
									<td width="200px"><input name="STATUS[]" id="STATUS0" type="text" class="form-control STATUS" readonly></td>
									<td width="200px" ><input name="HR[]" id="HR0" value="0" onchange="hitung()" type="text" class="form-control HR rightJustified number"></td>
									<td width="200px" ><input name="JAM1[]" id="JAM10" value="0" onchange="hitung()" type="text" class="form-control JAM1 rightJustified number"></td>
									<td width="200px" ><input name="JAM2[]" id="JAM20" value="0" onchange="hitung()" type="text" class="form-control JAM2 rightJustified number"></td>
									<td width="200px" ><input name="LEM1[]" id="LEM10" value="0" onchange="hitung()" type="text" class="form-control LEM1 rightJustified number"></td>
									<td width="200px" ><input name="LEM2[]" id="LEM20" value="0" onchange="hitung()" type="text" class="form-control LEM2 rightJustified number"></td>
									<td width="200px" ><input name="JAM1RP[]" id="JAM1RP0" value="0" onchange="hitung()" type="text" class="form-control JAM1RP rightJustified number"></td>
									<td width="200px" ><input name="JAM2RP[]" id="JAM2RP0" value="0" onchange="hitung()" type="text" class="form-control JAM2RP rightJustified number"></td>
                                    <td width="200px" ><input name="LAIN[]" id="LAIN0" value="0" onchange="hitung()" type="text" class="form-control LAIN rightJustified number"></td>
									<td width="200px" ><input name="POTONG[]" id="POTONG0" value="0" onchange="hitung()" type="text" class="form-control POTONG rightJustified number"></td>
									<td width="200px" ><input name="TOTALD[]" id="TOTALD0" value="0" onchange="hitung()" type="text" class="form-control TOTALD rightJustified number"></td>
									<td width="75px">
										<button type="button" class="btn btn-sm btn-circle btn-outline-danger btn-delete" onclick="">
											<i class="fa fa-fw fa-trash-alt"></i>
										</button>
									</td>      
								</tr>
                            </tbody>
							<tfoot>
								<TD width="75px"></td>
								<TD width="250px"></td>
								<TD width="250px"></td>
                                <TD width="200px" style="font-size: 14px; font-weight: bold; color: black;">TOTAL</td>
								<TD width="200px"><input name="TTOTAL_HR" id="TTOTAL_HR" class="form-control TTOTAL_HR rightJustified number" readonly></td>
								<TD width="200px"><input name="TJAM1" id="TJAM1" class="form-control TJAM1 rightJustified number" readonly></td>
								<TD width="200px"><input name="TJAM2" id="TJAM2" class="form-control TJAM2 rightJustified number" readonly></td>
								<TD width="200px"><input name="TTOTAL_LEM1" id="TTOTAL_LEM1" class="form-control TTOTAL_LEM1 rightJustified number" readonly></td>
								<TD width="200px"><input name="TTOTAL_LEM2" id="TTOTAL_LEM2" class="form-control TTOTAL_LEM2 rightJustified number" readonly></td>
								<TD width="200px"><input name="TJAM1RP" id="TJAM1RP" class="form-control TJAM1RP rightJustified number" readonly></td>
								<TD width="200px"><input name="TJAM2RP" id="TJAM2RP" class="form-control TJAM2RP rightJustified number" readonly></td>
                                <TD width="200px"><input name="TTOTAL_LAIN" id="TTOTAL_LAIN" class="form-control TTOTAL_LAIN rightJustified number" readonly></td>
								<TD width="200px"><input name="TTOTAL_POTO" id="TTOTAL_POTO" class="form-control TTOTAL_POTO rightJustified number" readonly></td>
								<TD width="200px"><input name="TTOTAL" id="TTOTAL" class="form-control TTOTAL rightJustified number" readonly></td>
								<TD width="75px"></td>
                            </tfoot> 
                        </table>                           
                    </div>
                </div>
                <div class="col-md-2 row">  
                    <button type="button"  onclick="tambah()" class="btn btn-sm btn-success"><i class="fas fa-plus fa-sm md-3"></i> </button>               
                </div>
            </div>                    
	        <br>
            <div class="row">
				<div class="col-xs-9">
					<div class="wells">		
						<div class="btn-group">
							<button type="submit"  class="btn btn-success"><i class="fa fa-save"></i> Save</button>										
						  	<a type="button" href="javascript:javascript:history.go(-1)" class="btn btn-danger">Cancel</a>
						</div>
						<h4><span id="error" style="display:none; color:#F00">Terjadi Kesalahan... </span> <span id="success" style="display:none; color:#0C0">Savings.done...</span></h4>								
					</div>															
				</div>						
			</div>													
	    </div>
    </form>
</div>

<!-- Modal Content MyModal-->
<div id="myModal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header"> 
        		<h4 class="modal-title">Data Pegawai</h4>
	   		</div>
	   		<div class="modal-body">
		 		<table class='table table-bordered' id='example'>
			 		<thead>	
				 		<th>Kode Pegawai</th>
				 		<th>Nama Pegawai</th>
						<th>STPTKP</th>
			 		</thead>
			 		<tbody id="show-data">
			
					</tbody>
				</table>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
      		</div>
    	</div>
  	</div>
</div>

<!-- Modal Content MyModal Bagian-->
<div id="myModala" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header"> 
       			<h4 class="modal-title">Data Bagian</h4>
      		</div>
      		<div class="modal-body">
        		<table class='table table-bordered' id='examplea'>
					<thead>	
						<th>Kode Bagian</th>
						<th>Nama Bagian</th>
					</thead>
					<tbody>
					<?php 
						$sql = "SELECT * FROM hrd_bag order by kd_bag ";
						$a = $this->db->query($sql)->result();
						foreach($a as $b ) 
					{ ?>
						<tr>
							<td class='KBVAL'><a href="#" class="select_bag"><?php echo $b->KD_BAG;?></a></td>
                			<td class='NBVAL'><?php echo $b->NM_BAG;?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
      		</div>
    	</div>
  	</div>
</div>

<!-- Modal Content MyModal Pegawai-->
<div id="myModalb" class="modal fade" role="dialog">
  	<div class="modal-dialog">
		<div class="modal-content">
      		<div class="modal-header"> 
        		<h4 class="modal-title">Data Pegawai</h4>
	   		</div>
	   		<div class="modal-body">
		 		<table class='table table-bordered' id='exampleb'>
			 		<thead>	
				 		<th>Kode Pegawai</th>
				 		<th>Nama Pegawai</th>
						<th>STPTKP</th>
			 		</thead>
			 		<tbody>
					<?php 
					 	$sql = "SELECT * FROM `hrd_peg` order by kd_peg ";
			 			$a = $this->db->query($sql)->result();
						 foreach($a as $b ) 
					{ ?>
						<tr>
							<td class='KPVAL'><a href="#" class="select_peg"><?php echo $b->KD_PEG;?></a></td>
							<td class='NPVAL'><?php echo $b->NM_PEG;?></td>
							<td class='SPVAL'><?php echo $b->STATUS;?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal" id="close">Close</button>
      		</div>
    	</div>
  	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable({
			dom: 
					"<'row'<'col-md-6'><'col-md-6'>>" + // 
					"<'row'<'col-md-6'f><'col-md-6'l>>" + // peletakan entries, search, dan test_btn
					"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>", // peletakan show dan halaman
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			],
			order: true,
		});
		$('#examplea').DataTable({
			dom: 
				"<'row'<'col-md-6'><'col-md-6'>>" + // 
				"<'row'<'col-md-6'f><'col-md-6'l>>" + // peletakan entries, search, dan test_btn
				"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>", // peletakan show dan halaman
			buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
			],
			order: true,
		});
		$('#exampleb').DataTable({
		dom: 
				"<'row'<'col-md-6'><'col-md-6'>>" + // 
				"<'row'<'col-md-6'f><'col-md-6'l>>" + // peletakan entries, search, dan test_btn
				"<'row'<'col-md-12't>><'row'<'col-md-12'ip>>", // peletakan show dan halaman
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		],
		order: true,
		});
		$('.modal-footer').on('click', '#close', function() {			 
			$('input[type=search]').val('').keyup();  // this line and next one clear the search dialog
		});
	
	});
</script> 

<script>
	var target;
	var idrow  = 1;
	function numberWithCommas(x) {
    	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}

	$(document).ready(function() {
		//$('input.number').keyup(function(event) {
			$('body').on('keyup', 'input.number', function() {
		  	// skip for arrow keys
		  	if(event.which != 190){
				if(event.which >= 37 && event.which <= 40) return;
		  	}
		  	// format number
		  	$(this).val(function(index, value) {
				return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		  	});
		  	hitung();
		});

		//MY MODAL
		$('#myModal').on('show.bs.modal', function (e) {
		  	target = $(e.relatedTarget);		  
		});
		$('body').on('click', '.select_pegawai', function() {			
			var val = $(this).parents("tr").find(".KPVAL").text();
			target.parents("tr").find(".KD_PEG").val(val);
            var val = $(this).parents("tr").find(".NPVAL").text();
			target.parents("tr").find(".NM_PEG").val(val);
			var val = $(this).parents("tr").find(".SPVAL").text();
			target.parents("tr").find(".STATUS").val(val);
            $('#myModal').modal('toggle');
		});

		//MY MODAL Bagian
		$('#myModala').on('show.bs.modal', function (e) {
		  	target = $(e.relatedTarget);
		});
		$('body').on('click', '.select_bag', function() {
			var val = $(this).parents("tr").find(".KBVAL").text();
			target.parents("div").find(".KD_BAG").val(val);
            var val = $(this).parents("tr").find(".NBVAL").text();
			target.parents("div").find(".NM_BAG").val(val);
            $('#myModala').modal('toggle');
		});
		//MY MODAL Pegawai
		$('#myModalb').on('show.bs.modal', function (e) {
		  	target = $(e.relatedTarget);
		});
		$('body').on('click', '.select_peg', function() {			
			var val = $(this).parents("tr").find(".KPVAL").text();
			target.parents("tr").find(".KD_PEG").val(val);
            var val = $(this).parents("tr").find(".NPVAL").text();
			target.parents("tr").find(".NM_PEG").val(val);
			var val = $(this).parents("tr").find(".SPVAL").text();
			target.parents("tr").find(".STATUS").val(val);
            $('#myModalb').modal('toggle');
		});
		
        $('body').on('click', '.btn-delete', function() {			
			var val = $(this).parents("tr").remove();
			idrow--;
			nomor();
		});
		$(".date").datepicker({
			'dateFormat':'dd-mm-yy',
		});

		$('.bt_pegawai').click(function(){
			var kd_bag = $('#KD_BAG').val();
			$.ajax({
				type:'get',
				url: '<?php echo base_url('index.php/admin/transaksi_harian/filter_bagian'); ?>' 
				data:{kd_bag: kd_bag},
				dataType: 'json',
				success:function(response) {
					var html = '';
					var i;
					for(i=0 i<response.length; i++) {
						html += '<tr>'+
									'<td class="KPVAL"><a href="#" class="select_pegawai">'+response[i].KD_BAG+'</td>'+
									'<td>'+response[i].KD_PEG+'</td>'+
									'<td>'+response[i].NM_PEG+'</td>'+
									'<td>'+response[i].STATUS+'</td>'+
								'</tr>';
					}
					$('myModal').modal({backdrop: 'static', keyboard: true, show: true});
					$('#show-data').html(html);
				}
			});
		});
	});

	function nomor() {
		var i = 1;
		$(".REC").each(function() {
			$(this).val(i++);
		});
		hitung();
	}

	function hitung() {

		var TTOTAL_HR = 0;
		var TJAM1 = 0;
		var TJAM2 = 0;
		var TTOTAL_LEM1 = 0;
		var TTOTAL_LEM2 = 0;
		var TJAM1RP = 0;
		var TJAM2RP = 0;
		var TTOTAL_LAIN = 0;
		var TTOTAL_POTO = 0;
		var TTOTAL = 0;
		var total_row =idrow;
   
	 	for (i=0;i<total_row;i++) {

			var hr = parseFloat($('#HR'+i).val().replace(/,/g, ''));
			var jam1 = parseFloat($('#JAM1'+i).val().replace(/,/g, ''));
			var jam2 = parseFloat($('#JAM2'+i).val().replace(/,/g, ''));
			var lem1 = parseFloat($('#LEM1'+i).val().replace(/,/g, ''));
			var lem2 = parseFloat($('#LEM2'+i).val().replace(/,/g, ''));
			var jam1rp = parseFloat($('#JAM1RP'+i).val().replace(/,/g, ''));
			var jam2rp = parseFloat($('#JAM2RP'+i).val().replace(/,/g, ''));
		 	var lain = parseFloat($('#LAIN'+i).val().replace(/,/g, ''));
			var potong = parseFloat($('#POTONG'+i).val().replace(/,/g, ''));
			var totald = parseFloat($('#TOTALD'+i).val().replace(/,/g, ''));

			TTOTAL_HR+=hr;
			TJAM1+=jam1;
			TJAM2+=jam2;
			TTOTAL_LEM1+=lem1;
			TTOTAL_LEM2+=lem2;
			TJAM1RP+=jam1rp;
			TJAM2RP+=jam2rp;
			TTOTAL_LAIN+=lain;
			TTOTAL_POTO+=potong;
			TTOTAL+=totald;
		};

		if(isNaN(TTOTAL_HR)) TTOTAL_HR = 0;
		if(isNaN(TJAM1)) TJAM1 = 0;
		if(isNaN(TJAM2)) TJAM2 = 0;
		if(isNaN(TTOTAL_LEM1)) TTOTAL_LEM1 = 0;
		if(isNaN(TTOTAL_LEM2)) TTOTAL_LEM2 = 0;
		if(isNaN(TJAM1RP)) TJAM1RP = 0;
		if(isNaN(TJAM2RP)) TJAM2RP = 0;
		if(isNaN(TTOTAL_LAIN)) TTOTAL_LAIN = 0;
		if(isNaN(TTOTAL_POTO)) TTOTAL_POTO = 0;
		if(isNaN(TTOTAL)) TTOTAL = 0;

		$('#TTOTAL_HR').val(numberWithCommas(TTOTAL_HR));
		$('#TJAM1').val(numberWithCommas(TJAM1));
		$('#TJAM2').val(numberWithCommas(TJAM2));
		$('#TTOTAL_LEM1').val(numberWithCommas(TTOTAL_LEM1));
		$('#TTOTAL_LEM2').val(numberWithCommas(TTOTAL_LEM2));
		$('#TJAM1RP').val(numberWithCommas(TJAM1RP));
		$('#TJAM2RP').val(numberWithCommas(TJAM2RP));
		$('#TTOTAL_LAIN').val(numberWithCommas(TTOTAL_LAIN));
		$('#TTOTAL_POTO').val(numberWithCommas(TTOTAL_POTO));
		$('#TTOTAL').val(numberWithCommas(TTOTAL));

	}

	function tambah() {
		var x=document.getElementById('datatable').insertRow(idrow+1);
		var td1=x.insertCell(0);
		var td2=x.insertCell(1);
		var td3=x.insertCell(2);
		var td4=x.insertCell(3);
		var td5=x.insertCell(4);
		var td6=x.insertCell(5);
		var td7=x.insertCell(6);
		var td8=x.insertCell(7);
		var td9=x.insertCell(8);
		var td10=x.insertCell(9);
		var td11=x.insertCell(10);
		var td12=x.insertCell(11);
		var td13=x.insertCell(12);
		var td14=x.insertCell(13);
		var td15=x.insertCell(14);
	
		var akun0="<div class='input-group'>";														        
		var akun1="<input name='KD_PEG[]' type='text' class='form-control KD_PEG' id=KD_PEG"+idrow+" readonly>";
		var akun2="<span class='input-group-btn'>";
		var akun3="<a data-target=\"#myModalb\" data-toggle=\"modal\" class='btn default' data-toggle='modal' href='#lupACNO'  "+"id="+idrow+"><i class='fa fa-search'></i></a>";	
		var akun4="</span></div>";	 
		var akun=akun0+akun1+akun2+akun3+akun4;
		
		td1.innerHTML="<input name='REC[]' id=REC"+idrow+" type='text' class='REC form-control ' onkeypress='return tabE(this,event)' readonly>";
		td2.innerHTML=akun;
		td3.innerHTML="<input name='NM_PEG[]' id=NM_PEG"+idrow+" type='text' class='form-control NM_PEG' readonly>";
		td4.innerHTML="<input name='STATUS[]' id=STATUS"+idrow+" type='text' class='form-control STATUS' readonly>";
		td5.innerHTML="<input name='HR[]' id=HR"+idrow+" onchange='hitung()' value='0' type='text' class='form-control rightJustified HR number'>";
		td6.innerHTML="<input name='JAM1[]' id=JAM1"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified JAM1 number'>";
		td7.innerHTML="<input name='JAM2[]' id=JAM2"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified JAM2 number'>";
		td8.innerHTML="<input name='LEM1[]' id=LEM1"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified LEM1 number'>";
		td9.innerHTML="<input name='LEM2[]' id=LEM2"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified LEM2 number'>";
		td10.innerHTML="<input name='JAM1RP[]' id=JAM1RP"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified JAM1RP number'>";
		td11.innerHTML="<input name='JAM2RP[]' id=JAM2RP"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified JAM2RP number'>";
		td12.innerHTML="<input name='LAIN[]' id=LAIN"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified LAIN number'>";
		td13.innerHTML="<input name='POTONG[]' id=POTONG"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified POTONG number'>";
		td14.innerHTML="<input name='TOTALD[]' id=TOTALD"+idrow+" onchange='hitung()' value='0'  type='text' class='form-control rightJustified TOTALD number'>";
		td15.innerHTML="<button type='button' class='btn btn-sm btn-circle btn-outline-danger btn-delete' onclick=''> <i class='fa fa-fw fa-trash-alt'></i> </button>";

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