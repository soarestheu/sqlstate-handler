<?php

return [
    'messages' => [
      //Erros de conexão
      '08001' => 'Não foi possível conectar ao banco de dados.',
      '08003' => 'Conexão não existe.',
      '08004' => 'Conexão rejeitada pelo servidor.',
      '08006' => 'Falha na conexão com o servidor.',

      //Erros de sintaxe e SQL inválido
      '42000' => 'Erro de sintaxe na query. Verifique os comandos SQL.',
      '42601' => 'Erro de sintaxe próximo a um token inválido.',
      '42803' => 'Uso inválido de função de agregação.',
      '42P01' => 'Tabela ou view não encontrada.',
      '42P02' => 'Parâmetro indefinido.',
      '42S02' => 'Tabela ou view não existe.',
      '42S22' => 'Coluna não existe.',

      //Erros de integridade referencial e restrições
      '23000' => 'Violação de integridade: dado já cadastrado ou relacionado.',
      '23502' => 'Erro: um campo obrigatório não foi preenchido.',
      '23503' => 'Violação de chave estrangeira: dado referenciado não existe.',
      '23505' => 'Erro: esse registro já existe no banco de dados.',
      '23514' => 'Violação de restrição CHECK.',

      //Erros de transação
      '40001' => 'Deadlock detectado: transação foi interrompida.',
      '40003' => 'Transação inválida.',
      
      //Erros de permissão
      '28000' => 'Acesso negado: credenciais inválidas.',
      '28001' => 'A senha expirou.',
      '28P01' => 'Autenticação falhou: usuário ou senha incorretos.',
      
      //Erros de cursor e transações
      '24000' => 'Operação inválida no estado atual do cursor.',
      '25000' => 'Operação inválida no estado atual da transação.',
      '25001' => 'SET TRANSACTION deve ser chamado antes do COMMIT.',
      '25002' => 'Transação ainda ativa.',

      //Erros de parâmetros
      '07002' => 'Erro na contagem de parâmetros da consulta. Verifique se todos os placeholders possuem valores correspondentes.',
      '07006' => 'Conversão de dados incompatível para um parâmetro.',
      
      //Erros de dados inválidos
      '22001' => 'Valor excede o tamanho permitido para a coluna.',
      '22003' => 'Valor numérico fora do intervalo permitido.',
      '22007' => 'Formato de data/hora inválido.',
      '22012' => 'Divisão por zero não permitida.',
      '22023' => 'Violação de tipo de dado.',

      //Erros diversos
      'HY000' => 'Erro SQL genérico: consulte os detalhes do erro.',
      'XX000' => 'Erro interno do banco de dados.',
      'XX001' => 'Erro no sistema de armazenamento de dados.',
    ]
];
