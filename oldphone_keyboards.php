<?php

// php version <8.0
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
        //keyboard value assignment
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

    /**
    * Function converting text to old phone numeric keyboards format
    *
    * @param string $text The text to convert
    * @return string Return old phones numer keyboards format
    */
    function convertToNumeric($input)
    {
        if(!is_string($input)) return 0;
        $output = "";
        $input = strtolower($input);

        for($i = 0; $i<strlen($input); $i++)
        {
            $letter = $input[$i];
            for($j=0; $j<sizeof(($this->keyboard)); $j++)
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

    /**
    * Function converting old phone numeric keyboards format to text
    * @param string $text The text in old phone numeric keyboards format to convert
    * @return string Return text hidden under the input    
    */
    function convertToString($input)
    {
        if(!is_string($input)) return 0;
        $output = "";
        $input = explode(",", $input);
        for($i=0; $i<sizeof($input); $i++)
        {
            $number = substr($input[$i],0,1);
            $output.=$this->keyboard[$number][strlen($input[$i])-1];
        }
        return $output;
    }

}

$opk = new OldPhoneKeyboard();
$test1 = $opk->convertToNumeric("Ela nie ma kota");
print($test1."<br />");
$test2 = $opk->convertToString("5,2,22,555,33,222,9999,66,444,55");
print($test2);

?>