<?php
namespace habibullinrustam\skobka_library
class Skobka
{
	private $open_sk = 0;
	private $close_sk = 0;
	
	public function compare(String $str){
		$i=0;
		$str = preg_replace("/[\t\r\n\s]+/", '', $str);	
		while(isset($str[$i])){
			if($str[$i]=='('){
				$this->open_sk++;
			}elseif($str[$i]==')'){
				$this->close_sk++;
			}else{
				throw new InvalidArgumentException('Недопустимый символ в строке:'.$str[$i]);			
			}
			$i++;
		}
		if($this->open_sk == $this->close_sk)
			return true;
		return false;
	} 
}

$str = "(())";
$sk_ex = new Skobka();
try{
	echo var_dump($sk_ex->compare($str));
}catch(InvalidArgumentException $e){
	echo $e->getMessage();
}

