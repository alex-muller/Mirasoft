<?php


function checkBrackets(string $string) : bool
{
    // Определяем виды скобок согласно ТЗ
    $bracketsPairs = [
        '(' => ')',
        '[' => ']'
    ];

    $stack = [];

    // Разбиваем строку на массив символов
    $symbols = str_split($string);

    foreach ($symbols as $symbol) {

        foreach ($bracketsPairs as $openBracket => $closeBracket) {

            switch ($symbol) {
                case $openBracket: // если символ соответствует открывающейся скобке, добавляем ее в массив $stack
                    array_push($stack, $openBracket);
                    BREAK;
                case $closeBracket: // если символ соответствует закрывающейся скобке, извлекаем последний символ стека и сравниваем с ним
                    $lastOpenedBracket = array_pop($stack);

                    // если закрывающаяся скобка не совпадает с открывающейся, возвращаем false
                    if ($lastOpenedBracket !== $openBracket) {
                        return false;
                    }
            }

        }

    }

    // если стек не пуст, возвращаем false
    return empty($stack);
}