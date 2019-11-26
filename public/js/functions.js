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

})