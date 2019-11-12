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
        @foreach($provas as $id => $prova)
        <?php shuffle($prova['questoes']); ?>
        <pre>{{$prova['cabecalho']}}</pre>
            @for($i=0; $i<=2; $i++)
                @foreach($prova['questoes'][$i] as $key => $questoes)
                    <p>{{ $i+$key+1 }}º) {{ $questoes->pergunta }}</p>
                    <ul style="list-style: none;">
                        <?php  $letras = ['A', 'B', 'C', 'D', 'E'];?>
                        @foreach($questoes->alternativas as $id => $alternativas)
                            <li>{{ $letras[$id] }}) {{ $alternativas->resposta }}</li><br><br>
                        @endforeach
                    </ul><br>
                @endforeach
            @endfor
        @endforeach
    </div>
</body>
</html>