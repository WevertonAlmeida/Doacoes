$(document).ready(function(){
	
	$("#btnSalvar").click(function(e) {
		e.preventDefault();

		var vnome = "";
		vnome = $("input[name=nome]").val();
		
		var vcpf = "";
		vcpf = $("input[name=cpf]").val();
		
		var vdtnascimento = "";
		vdtnascimento = $("input[name=dtnascimento]").val();
		
		var vemail = "";
		vemail = $("input[name=email]").val();
		
		var vcelular = "";
		vcelular = $("input[name=celular]").val();
		
		var vfixo = "";
		vfixo = $("input[name=fixo]").val();
		
		var vdtcadastro = "";
		vdtcadastro = $("input[name=dtcadastro]").val();
		
		var vendereco = "";
		vendereco = $("input[name=endereco]").val();

		var vintervalo
		vintervalo = $("select[name=intervalo]").val();
		
		var vvalor = "";
		vvalor = $("input[name=valor]").val();
		
		var vpagamento = "";
		vpagamento = $("select[name=forma-pagamento]").val();		
		
		$.post("controller.php", {Consulta: "inserirDoacao", nome: vnome, cpf: vcpf, dtnascimento: vdtnascimento, email: vemail, celular: vcelular, fixo: vfixo, dtcadastro: vdtcadastro, endereco: vendereco, intervalo: vintervalo, valor: vvalor, pagamento: vpagamento}, Retorno);
		                                                
	});
	
	function Retorno(AResult){

	  if(AResult == "true"){
		window.location.href = "index.html";
	  }else{
		alert("Erro ao salvar"+AResult);
	  }								
	};
	
	$("#btnSalvarFormaPagamento").click(function(e) {
		e.preventDefault();

		var vnomeFormaPagamento = "";
		vnomeFormaPagamento = $("input[name=nome-forma-pagamento]").val();	
		
		$.post("controller.php", {Consulta: "inserirFormaPagamento", nomeFormaPagamento: vnomeFormaPagamento}, resultAddFormaPagamento);                                               
	});
	
	function resultAddFormaPagamento(AResult){

	  if(AResult == "true"){
		window.location.href = "index.html"; 
	  }else{
		alert("Erro ao salvar"+AResult);
	  }								
	};
	
	function resultPreencherSelectFormaPagamento(AResult){
		$("select[name=forma-pagamento]").html(AResult);
		                                                                   
	};
	
	function preencherSelectFormaPagamento(){                   				
	  $.post("controller.php", {Consulta: "ConsultaFormaPagamento"}, resultPreencherSelectFormaPagamento);
	}; 

	preencherSelectFormaPagamento();
	
	function resultListarDoacoes(AResult){                  
		$("#tbody-doacoes").html(AResult);
                                                                   
	};
	
	function listarDoacoes(){                                
	  $.post("controller.php", {Consulta: "ListarDoacoes"}, resultListarDoacoes);
	}; 

	listarDoacoes();
	
});
	