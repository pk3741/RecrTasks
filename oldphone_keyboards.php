<?php
if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}

class OldphoneKeyboard
{
    private $keyboard;

    function __construct()
    {
        $this->keyboard[0]=" ";
        $this->keyboard[1]=",./?";
        $this->keyboard[2]="abc";
        $this->keyboard[3]="def";
        $this->keyboard[4]="ghi";
        $this->keyboard[5]="jkl";
        $this->keyboard[6]="mno";
        $this->keyboard[7]="pqrs";
        $this->keyboard[8]="tuv";
        $this->keyboard[9]="wxyz";
    }

    function getKeyboard()
    {
        print($this->keyboard);
        return $keyboard;
    }

    function convertToNumeric($input)
    {
        if(!is_string($input)) return 0;
        $output = "";
        $input = strtolower($input);

        for($i = 0; $i<strlen($input); $i++)
        {
            $letter = $input[$i];
            for($j=0; $j<sizeof($this->keyboard); $j++)
            {
                if(str_contains($this->keyboard[$j], $letter))
                {
                    for($k = 0; $k<stripos($this->keyboard[$j], $letter)+1; $k++)
                    {
                        $output.=$j;
                    }
                    if($i+1!=strlen($input)) $output.=",";
                }
            }
        }
        return $output;
    }

    function convertToString($input)
    {
        
    }

}
$opk = new OldPhoneKeyboard();
$test = $opk->convertToNumeric("Ela nie ma kota");
print($test);


?>