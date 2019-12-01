$(document).ready(function(){
    $('form#import select[name="curso"]').on('change', function(){
        var curso = $(this).val();
        $.ajax({
            url: '/api/curso',
            type: 'POST',
            data: { curso: curso },
            success: function (retorno){
                $('form#import select[name="disciplina"]').empty();
                $('form#import select[name="disciplina"]').removeAttr("disabled");
                for(let i in retorno){
                    $('form#import select[name="disciplina"]').append("<option value="+retorno[i].id+">"+retorno[i].nome+"</option>");
                }
            }
        })
    })

    $('form#prova, select[name="curso"]').on('change', function(){
        var curso = $(this).val();
        var professor = $('form#prova, input[name="professor"]').val();
        $.ajax({
            url: '/api/turmas',
            type: 'POST',
            data: { curso: curso, professor: professor },
            success: function (retorno){
                $('form#prova, select[name="turma_id"]').empty();
                $('form#prova, select[name="turma_id"]').removeAttr("disabled");
                for(let i in retorno){
                    $('form#prova, select[name="turma_id"]').append("<option value="+retorno[i].id+">"+retorno[i].nome
                    +" - "+retorno[i].ano+"."+retorno[i].semestre+" | "+retorno[i].turno+"</option>");
                $('form#prova').append('<input type="hidden" name="disciplina_id" value="'+ retorno[i].disciplina+'">');
                }
            }
        })
    })
    $('form').on('keydown', function(event) {
        if (event.ctrlKey && event.keyCode === 13) {
            $(this).trigger('submit');
        }
    })

    $('button#editar').on('click', function(e){
        e.preventDefault();
        const value = JSON.parse($(this).attr('value'));
        var target = $(this).attr('data-target');
        $('body').toggleClass('modal-open');
        $('div#confirm').toggleClass('show');
        $('body').append('<div class="modal-backdrop fade show"></div>');
        $('div#confirm').css('display', 'block');
        $('div#confirm').attr('aria-modal', 'true');
        $('div#confirm').attr('id', target);
        $('form#prova, select[name="turma_id"]').html('<option>'+value.nome+' - '+value.ano + value.semestre + ' | ' + value.turno);
        $('form#prova, select[name="curso"], option[value="'+value.curso_id+'"]').attr('selected', "");
        $('form#prova, button[type="submit"]').html('Atualizar');
        $('form#prova, select[name="turma_id"]').removeAttr("disabled");

        // $.ajax({
        //     url: '',
        //     type: 'POST',
        //     data: {id_curso: value.curso_id},
        //     success: function(retorno){

        //     }
        // })
        console.log(value);
    })
    

})