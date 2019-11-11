<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <pre>{{ $provas['cabecalho'] }}</pre>
        <?php shuffle($provas['questoes']); ?>
        @for($i=0; $i<=2; $i++)
            @foreach($provas['questoes'][$i] as $key => $prova)
                <p>{{ $i+$key+1 }}º) {{ $prova->pergunta }}</p>
                <ul style="list-style: none;">
                    <?php  $letras = ['A', 'B', 'C', 'D', 'E'];?>
                    @foreach($prova->alternativas as $id => $alternativas)
                        <li>{{ $letras[$id] }}) {{ $alternativas->resposta }}</li><br><br>
                    @endforeach
                </ul><br>
            @endforeach
        @endfor


    </div>
    
</body>
</html>