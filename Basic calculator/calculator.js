const display = document.getElementById("display")
let curValue = "";
let operator = "";
let previousValue = "";

function appendToDisplay(input){
  display.value += input
}

// function clearDisplay(){
//   display.value = "";
// }
// function calculate(){
//   try{
//     display.value = eval(display.value)
//   }
//   catch(error){
//     display.value = "Error";

//   }

function Operator(op){
  if (curValue == " "){
    return;
  }
  if(previousValue != ""){
    calculate();
  }
  operator= op;
  previousValue = curValue;
  curValue = "";
}
function clearDisplay(){
  curValue="";
  previousValue= "";
  operator= "";
  display.value= "";
}
function add(num1, num2) {
    return num1 + num2;
}
function calculate(){
  if (previousValue === "" || curValue === "" || operator === "") {
        return;
    }
    switch (operator) {
        case "+":
            result = add(num1, num2);
            break;
        default:
            return;
    }
    display.value = result;
    curValue = result.toString();
    previousValue = "";
    operator = "";

  }





