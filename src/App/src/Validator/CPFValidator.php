<?php


namespace App\Validator;


use Laminas\Validator\AbstractValidator;
use Laminas\Validator\Exception;

class CPFValidator extends AbstractValidator
{
    /**
     * Verifica se o cpf é válido
     *
     * @param mixed $cpf
     * @return bool
     */
    public function isValid($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $tamanho = 10, $soma = 0; $i < 9; $i++, $tamanho--) {
            $soma += $cpf{$i} * $tamanho;
        }

        $resto = $soma % 11;

        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        // Calcula e confere segundo dígito verificador
        for ($i = 0, $tamanho = 11, $soma = 0; $i < 10; $i++, $tamanho--) {
            $soma += $cpf{$i} * $tamanho;
        }

        $resto = $soma % 11;

        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

}