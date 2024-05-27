<?

// class B extends A{
//     public $param2;
//     function operation2(){

//     }
// }

// class A{
//     public $param1;
//     function operation1(){
// return "smth";
//     }
// }


// $b = new B();
// $a = new A();
// $b -> param1 = 10;
// $b -> operation1();

//INHERITENCE

// class A{
// private function operation1(){
// echo "operation1 called";
// }

// protected function operation2(){
// echo "operation2 called";
// }
// public function operation3(){
// echo "operation3 called";
// }

// }
// class B extends A{
// function __construct(){
// // $this->operation1();
// $this->operation2();
// $this->operation3();
// }}

// $b = new B;
// $b -> operation3();


//OVERRIDING

class A{
public $attribute = 'default value';
function operation(){
echo 'Something<br />';
echo 'The value of $attribute is '. $this->attribute.'<br />';
}}
class B extends A{
public $attribute = 'different value';
function operation(){
echo 'Something else<br />';
echo 'The value of $attribute is '. $this->attribute.'<br />';
}}
$a = new A();
$a->operation();
?>