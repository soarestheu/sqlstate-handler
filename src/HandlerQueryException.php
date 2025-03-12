<?php

namespace SqlstateHandler;

use Illuminate\{
    Http\Response,
    Database\QueryException,
    Support\Facades\Log
};

trait HandlerQueryException
{
    /**
     * Converte um QueryException para uma exceção personalizada com mensagem SQLSTATE.
     *
     * @param QueryException $e
     * @return static
     */
    public static function fromQueryException(QueryException $e): self
    {
        $sqlState = $e->errorInfo[0] ?? null;

        $messages = config('sqlstate.messages', []);

        $message = $messages[$sqlState] ?? 'Erro desconhecido no banco de dados.';

        Log::debug("Erro SQLSTATE capturado:", [
            'sqlstate' => $sqlState,
            'mensagem' => $message,
            'query' => $e->getSql(),
            'bindings' => $e->getBindings(),
            'arquivo' => $e->getFile(),
            'linha' => $e->getLine(),
        ]);

        return new self($message, Response::HTTP_INTERNAL_SERVER_ERROR, $e);
    }
}
