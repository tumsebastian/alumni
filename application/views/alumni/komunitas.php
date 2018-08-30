	<div class="col-md-12">
		<div class="card card-stats">
			<div class="card-header" data-background-color="blue" style="padding:5px;">
				<?php if ($profil->foto_profil==''){?>
					<img style="height:60px !important; width: 60px; border-radius:4px;" src="<?php echo base_url()?>assets/img/faces/avatar.png" />
				<?php }else{?>
					<img style="height:45px !important; border-radius:5px;" src="<?php echo base_url('assets/img/pp/'.$profil->foto_profil)?>" />
				<?php }?>
			</div>
			<div class="card-content">
				<h4 class="title" align="justify"><?php echo $profil->nama?></h4>
				<div class="chat direct-chat direct-chat-warning">
					<div class="direct-chat-messages" id="tchat">
						<div class="direct-chat-msg">
							
					</div>
				</div>
			</div>
			<div class="card-content">
				<div class="stats">
					<div class="col-xs-8 col-md-10">
						<textarea name="chat_isi" id="chat-isi" placeholder="Ketik pesan..." class="form-control"></textarea>
					</div>
					<div class="col-xs-4 col-md-2" align="left">
						<button type="button" class="btn btn-success" onclick="kirimchat()" title="kirim"><i class="material-icons">send</i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
	$(function(){
		$("#tchat").load("<?php echo base_url().'alumni/chat/'?>");
		
		setInterval(function(){
			$("#tchat").load("<?php echo base_url().'alumni/chat/'?>");
			if (document.getElementById("tchat").scrollTop>=100){
				document.getElementById("tchat").scrollTop = document.getElementById("tchat").scrollHeight;
			}
		}, 3000);
		document.getElementById("tchat").scrollTop = document.getElementById("tchat").scrollHeight;
	});
	
	function GetxhrObject(){
		var xhr=null;
		try {xhr=new XMLHttpRequest();}
		catch (e){
			try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
			catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
		}
		return xhr;
	};
	
	function kirimchat(){
		if ($("#chat-isi").val()!=""){
			var xhr		 = GetxhrObject();
			var formData = new FormData();
			formData.append("isi", $("#chat-isi").val());
			if (xhr) {
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						$("#tchat").load("<?php echo base_url().'alumni/chat/'?>");
						document.getElementById("tchat").scrollTop = document.getElementById("tchat").scrollHeight;
						
						$("#chat-isi").val("");
					}
				}
				xhr.open("POST","<?php echo base_url().'proses/chat'?>");
				xhr.send(formData);
			}
		}else{alert('Harap isi dengan lengkap.!!');$("#chat-isi").focus();}
	}
</script>