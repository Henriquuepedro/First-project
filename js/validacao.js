function checkForm() {
        var nome = document.getElementById("nome").value;
        var tel = document.getElementById("tel").value;
        var cpf = document.getElementById("cpf").value;
        var email = document.getElementById("email").value;
        var user = document.getElementById("user").value;
        var senha = document.getElementById("senha").value;

        //CAMPOS INCORRETOS
        if (senha.length < 6){            
			document.getElementById("senha").style.border = "2px solid #ef3c59";
			document.getElementById('div_senha').innerHTML = 'A sua senha não pode conter menos que 6 caracteres!';
			document.getElementById('div_senha').style.color = '#ef3c59';
			document.getElementById("senha").focus();
        }if (user.length < 6){            
			document.getElementById("user").style.border = "2px solid #ef3c59";
			document.getElementById('div_user').innerHTML = 'O seu usuário não pode conter menos que 6 caracteres!';
			document.getElementById('div_user').style.color = '#ef3c59';
			document.getElementById("user").focus();
        }if (email == ""){            
			document.getElementById("email").style.border = "2px solid #ef3c59";
			document.getElementById('div_email').innerHTML = 'O seu email não pode ser nulo!';
			document.getElementById('div_email').style.color = '#ef3c59';
			document.getElementById("email").focus();
        }if (cpf.length < 11){            
			document.getElementById("cpf").style.border = "2px solid #ef3c59";
			document.getElementById('div_cpf').innerHTML = 'Informe seu CPF corretamente!';
			document.getElementById('div_cpf').style.color = '#ef3c59';
			document.getElementById("cpf").focus();
        }if (tel.length < 8){            
			document.getElementById("tel").style.border = "2px solid #ef3c59";
			document.getElementById('div_tel').innerHTML = 'Informe seu telefone corretamente!';
			document.getElementById('div_tel').style.color = '#ef3c59';
			document.getElementById("tel").focus();
        }if (nome == ""){            
			document.getElementById("nome").style.border = "2px solid #ef3c59";
			document.getElementById('div_nome').innerHTML = 'O seu nome não pode ser nulo!';
			document.getElementById('div_nome').style.color = '#ef3c59';
			document.getElementById("nome").focus();
        }

        //CAMPOS CORRETOS
		if (nome != '') {            
			document.getElementById("nome").style.border = "";
			document.getElementById('div_nome').innerHTML = '';
        }if (tel.length >= 8) {            
			document.getElementById("tel").style.border = "";
			document.getElementById('div_tel').innerHTML = '';
        }if (cpf.length >= 11) {            
			document.getElementById("cpf").style.border = "";
			document.getElementById('div_cpf').innerHTML = '';
        }if (email != '') {            
			document.getElementById("email").style.border = "";
			document.getElementById('div_email').innerHTML = '';
        }if (user.length >= 6) {            
			document.getElementById("user").style.border = "";
			document.getElementById('div_user').innerHTML = '';
        }if (senha.length >= 6) {            
			document.getElementById("senha").style.border = "";
			document.getElementById('div_senha').innerHTML = '';
        }

        //SE HOUVER ERRO
        if((nome == '') || (tel.length < 8) || (cpf.length < 11) || (email == '') || (user.length < 6) || (senha.length < 6)){
        	return false;
        }else{
        }
    }