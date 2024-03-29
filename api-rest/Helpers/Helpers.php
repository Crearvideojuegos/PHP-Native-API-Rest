<?php

    function strClean(string $strCadena)
    {
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace('<script>','',$string);
        $string = str_ireplace('</script>','',$string);
        $string = str_ireplace('<script src>','',$string);
        $string = str_ireplace('<script type=>','',$string);
        $string = str_ireplace('SELECT * FROM','',$string);
        $string = str_ireplace('DELETE FROM','',$string);
        $string = str_ireplace('INSERT INTO','',$string);
        $string = str_ireplace('SELECT COUNT(*) FROM','',$string);
        $string = str_ireplace('DROP TABLE','',$string);
        $string = str_ireplace("OR '1'='1",'',$string);
        $string = str_ireplace('OR "1"="1"','',$string);
        $string = str_ireplace('OR ´1´=´1´','',$string);
        $string = str_ireplace('is NULL; --','',$string);
        $string = str_ireplace('is NULL; --','',$string);
        $string = str_ireplace("LIKE '",'',$string);
        $string = str_ireplace('LIKE "','',$string);
        $string = str_ireplace("LIKE ´",'',$string);
        $string = str_ireplace("OR 'a'='a",'',$string);
        $string = str_ireplace('OR "a"="a','',$string);
        $string = str_ireplace("OR ´a´=´a",'',$string);
        $string = str_ireplace("OR ´a´=´a",'',$string);
        $string = str_ireplace('--','',$string);
        $string = str_ireplace('^','',$string);
        $string = str_ireplace('[','',$string);
        $string = str_ireplace(']','',$string);
        $string = str_ireplace('==','',$string);
        return $string;
    }

    function JsonResponse(array $arrayData, int $code)
    {
        if(is_array($arrayData))
        {
            header('HTTP/1.1 '.$code);
            header('Content-Type: application/json'); 
            echo json_encode($arrayData, true);
        }
    }


?>