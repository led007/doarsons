</div>
</div>

<!-- [ Main Content ] end -->

<!-- Required Js -->
<script src="{{ asset('/vendor/sweetalert/sweetalert.all.js') }}" @include('sweetalert::alert')> </script>
<script src="/assets/js/vendor-all.min.js"></script>
<script src="/assets/js/plugins/bootstrap.min.js"></script>
<script src="/assets/js/ripple.js"></script>
<script src="/assets/js/pcoded.js"></script>

<!-- Apex Chart -->
<!-- custom-chart js -->
<script src="/assets/js/pages/dashboard-main.js"></script>


<!-- MASCARAS CPF E ETC -->
<script>
    function MascaraInteiro(num) {
        var er = /[^0-9]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) { ///verifica se é string, caso seja então apaga
            var texto = $(campo).val();
            $(campo).val(texto.substring(0, texto.length - 1));
            return false;
        } else {
            return true;
        }
    }

    function MascaraFloat(num) {
        var er = /[^0-9.,]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) { ///verifica se é string, caso seja então apaga
            var texto = $(campo).val();
            $(campo).val(texto.substring(0, texto.length - 1));
            return false;
        } else {
            return true;
        }
    }
    //formata de forma generica os campos
    function formataCampo(campo, Mascara) {
        var er = /[^0-9/ (),.-]/;
        er.lastIndex = 0;
        if (er.test(campo.value)) { ///verifica se é string, caso seja então apaga
            var texto = $(campo).val();
            $(campo).val(texto.substring(0, texto.length - 1));
        }
        var boleanoMascara;
        var exp = /\-|\.|\/|\(|\)| /g
        var campoSoNumeros = campo.value.toString().replace(exp, "");
        var posicaoCampo = 0;
        var NovoValorCampo = "";
        var TamanhoMascara = campoSoNumeros.length;
        for (var i = 0; i <= TamanhoMascara; i++) {
            boleanoMascara = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".") ||
                (Mascara.charAt(i) == "/"))
            boleanoMascara = boleanoMascara || ((Mascara.charAt(i) == "(") ||
                (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " "))
            if (boleanoMascara) {
                NovoValorCampo += Mascara.charAt(i);
                TamanhoMascara++;
            } else {
                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                posicaoCampo++;
            }
        }
        campo.value = NovoValorCampo;
        ////LIMITAR TAMANHO DE CARACTERES NO CAMPO DE ACORDO COM A MASCARA//
        if (campo.value.length > Mascara.length) {
            var texto = $(campo).val();
            $(campo).val(texto.substring(0, texto.length - 1));
        }
        //////////////
        return true;
    }

    function MascaraMoeda(i) {
        var v = i.value.replace(/\D/g, '');
        v = (v / 100).toFixed(2) + '';
        v = v.replace(",", ".");
        v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
        v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
        i.value = v;
    }

    function MascaraGenerica(seletor, tipoMascara) {
        setTimeout(function() {
            if (tipoMascara == 'CPFCNPJ') {
                if (seletor.value.length <= 14) { //cpf
                    formataCampo(seletor, '000.000.000-00');
                } else { //cnpj
                    formataCampo(seletor, '00.000.000/0000-00');
                }
            } else if (tipoMascara == 'RG') {
                formataCampo(seletor, '0.000.000');
            } else if (tipoMascara == 'CEP') {
                formataCampo(seletor, '00.000-000');
            } else if (tipoMascara == 'TELEFONE') {
                formataCampo(seletor, '(00) 0-0000-0000');
            } else if (tipoMascara == 'INTEIRO') {
                MascaraInteiro(seletor);
            } else if (tipoMascara == 'FLOAT') {
                MascaraFloat(seletor);
            } else if (tipoMascara == 'CPF') {
                formataCampo(seletor, '000.000.000-00');
            } else if (tipoMascara == 'CNPJ') {
                formataCampo(seletor, '00.000.000/0000-00');
            } else if (tipoMascara == 'MOEDA') {
                MascaraMoeda(seletor);

            }
        }, 200);
    }
</script>
<script>
    //deletar 

    function deleta(url) {
        Swal.fire({
            title: 'Tem Certeza?',
            text: "Esta ação não pode ser desfeita!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, Deletar!'
        }).then((result) => {
            console.log(result)
            if (result.isConfirmed) {
                window.location.href = url
                Swal.fire(
                    'Deletado!',
                    'O registro foi deletado!',
                    'success'
                )
            }
        })
    }
</script>

<script src="" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
        }
        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {
            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
                //Valida o formato do CEP.
                if (validacep.test(cep)) {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $
                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            Swal.fire({
                                icon: 'info',
                                text: 'Formato de CEP inválido',
                            });
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    Swal.fire({
                        icon: 'info',
                        text: 'Formato de CEP inválido',
                    });
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });
</script>
</body>

</html>