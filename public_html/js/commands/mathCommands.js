$.getScript("/js/mathjs.js", function(){ /* Optional function */ });
//Settings
var mathSettings = [];
mathSettings['decimals'] = 3;

function mathCommand(action) {
    var result = [];
    var formula = action.split(" ");
    switch (formula[0]) {
        case "set":
            result = setting(formula);
            break;
        case "abc":
            result = abc(formula);
            break;
        case "random":
        case "rand":
            result = random(formula);
            break;
        case "equation":
        case "eq":
            result = equation(formula);
            break;
        default:
            result[0] = "Invalid MATH command " + formula[0].toUpperCase();
            break;
    }

    return result;
}


function setting(formula) {
    var result = [];
    var ind = 0;
    $.each(formula, function (index, value) {
        if (index > 0) {
            var setting = value.split('=');
            switch (setting[0]) {
                case 'decimals':
                    if (!isNaN(setting[1])) {
                        mathSettings['decimals'] = setting[1];
                        result[ind] = "Number of decimals for MATH command set to " + setting[1] + ".";
                        ind++;
                    }
                    break;
                default:
                    result[ind] = '"' + setting[0].toUpperCase() + '" is not a valid setting for MATH command.';
                    ind++;
                    break;
            }
        }
    });
    return result;
}

function abc(formula) {
    var result = [];
    if (formula.length == 4) {
        var a = formula[1];
        var b = formula[2];
        var c = formula[3];

        if ((b * b) >= (4 * a * c)) {
            result = abcPos(a, b, c);
        }
        else if ((b * b) < (4 * a * c)) {
            result = abcNeg(a, b, c);
        }
        else {
            result[0] = "Invalid input in MATH ABC command.</br>When using 3 inputs, make sure each input is a number.</br>Example:</br>3 -1 7</br>or</br>3.2 5.113 7.25996";
        }
    } else if (formula.length == 2) {
        var equation = formula[1].split("x^2");
        if (equation.length == 2) {
            var a = "1";
            if (equation[0] != "") {
                a = equation[0];
            }
            if (a == "-") {
                a = "-1";
            }
            if (equation[1].indexOf("x") > -1) {
                equation = equation[1].split("x");
                if (equation[1] == "") {
                    equation[1] = "0";
                }
            } else if (equation[1] == "") {
                equation[0] = "0";
                equation[1] = "0";
            } else {
                equation[0] = "0";
            }

            if (equation.length == 2) {
                var b = equation[0].replace("+", "");
                var c = equation[1].replace("+", "");
                if (a == "") {
                    a = "1";
                }
                if (b == "") {
                    b = "1";
                }
                if ((b * b) >= (4 * a * c)) {
                    result = abcPos(a, b, c);
                }
                else if ((b * b) < (4 * a * c)) {
                    result = abcNeg(a, b, c);
                }
                else {
                    result[0] = "Invalid input in MATH ABC command.</br>When writing the equation, make sure the syntax is correct without spacing.</br>Example:</br>2x^2-4x+6";
                }
            } else {
                result[0] = "Invalid input in MATH ABC command.</br>When writing the equation, make sure the syntax is correct without spacing.</br>Example:</br>2x^2-4x+6";
            }

        } else {
            result[0] = "Invalid input in MATH ABC command.</br>When writing the equation, make sure the syntax is correct without spacing.</br>Example:</br>2x^2-4x+6";
        }
    } else {
        result[0] = "Invalid input in MATH ABC command.</br>Accepted inputs are 3 numbers representing A, B and C, or the full equation without spacing.</br>Example:</br>3 -1 7.25</br>or</br>2x^2-4x+6";
    }
    return result;
};

function abcPos(a, b, c) {
    var result = [];
    var square = Math.sqrt((b * b) - (4 * a * c));
    var x1 = ((-1) * b + square) / (2 * a);
    var x2 = ((-1) * b - square) / (2 * a);
    result[0] = "X1: " + x1;
    result[1] = "X2: " + x2;
    return result;
}
function abcNeg(a, b, c) {
    var result = [];
    var square = Math.abs((b * b) - (4 * a * c));
    square = Math.sqrt(square);
    square = square / (2 * a);
    b = b / (2 * a);
    if (mathSettings['decimals'] > 0) {
        square = +square.toFixed(mathSettings['decimals']);
        b = +b.toFixed(mathSettings['decimals']);
    }
    result[0] = "X1: " + b + " + " + square + "i";
    result[1] = "X2: " + b + " - " + square + "i";
    return result;
}

function random(formula) {
    var result = [];
    if (formula.length >= 3 && Number(formula[1]) <= Number(formula[2])) {
        var minNumber = Number(formula[1]);
        var maxNumber = Number(formula[2]);
        var dec = 1;
        var loop = 1;
        if (formula.length >= 4 && !isNaN(Number(formula[3]))) {
            dec = Number(formula[3]);
            dec = Math.pow(10, dec);
        }else if(formula.length >= 4 && isNaN(Number(formula[3]))){
            result[0] = "Invalid input in MATH RANDOM command.</br>To use the RANDOM command, input minimum two numbers to represent minimum and maximum value, where minimum value is not greater than maximum value. Optionally, a third input will say the amount of decimal numbers, and a fourth input generates the desired amount of random numbers.</br>Example:</br>0 10 2 5";
            return result;
        }
        if (formula.length == 5 && !isNaN(Number(formula[4]))) {
            loop = Number(formula[4]);
        }else if(formula.length >= 5 && isNaN(Number(formula[4]))){
            result[0] = "Invalid input in MATH RANDOM command.</br>To use the RANDOM command, input minimum two numbers to represent minimum and maximum value, where minimum value is not greater than maximum value. Optionally, a third input will say the amount of decimal numbers, and a fourth input generates the desired amount of random numbers.</br>Example:</br>0 10 2 5";
            return result;
        }
        for (var i = 0; i < loop; i++) {
            var randomNumber = (Math.floor(Math.random()*dec*(maxNumber-minNumber+1)+minNumber))/dec;
            result[i] = "Generated: " + randomNumber;
        }


    } else {
        result[0] = "Invalid input in MATH RANDOM command.</br>To use the RANDOM command, input minimum two numbers to represent minimum and maximum value, where minimum value is not greater than maximum value. Optionally, a third input will say the amount of decimal numbers, and a fourth input generates the desired amount of random numbers.</br>Example:</br>0 10 2 5";
    }
    return result;
}

function equation(formula){
    var result = [];
    try{
        result[0] = math.eval(formula[1]);
    }catch(error){
        result[0] = "Syntax error on </br>" + formula[1] + "</br>Look for typos and mistakes, or look up the help section for allowed operations.";
    }
    return result;
}
