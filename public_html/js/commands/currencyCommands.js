function currencyCommand(command){
    var result = [];

    var input = command.split(" ");
    if(input[0] == "convert") {
        result = getConvert(input);

    }else if(input[0] == "reload"){
        result = reloadRates();

    }else if(input[0] == "what"){
        if((typeof input[1] === 'undefined')){
            result[0] = "Please provide a currency or a country."
        }else if(input[1].length == 3 && typeof input[2] === 'undefined'){
            result = getWhat(input);
        }else{
            var country = input[1];
            $.each(input, function(key, value){
                if(key>1){
                    country += " " + value;
                }
            });
            result = getCountry(country);
        }

    }else if(input[0] == "where" || input[0] == "who"){
        if((typeof input[1] === 'undefined' || input[1].length != 3)){
            result[0] = "Please provide a valid currency, like USD or EUR.";
        }else{
            result = getWhere(input[1]);
        }


    }else{
        result[0] = "Invalid command " + input[0].toUpperCase() + ".";
    }
    return result;
}

function getConvert(input){
    var result = [];
    var response = [];
    $.ajax({
        url: "/json/countries/currencyrates.json",
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function(key, value){
                response[key] = value;
            });
        }
    });

    var rates = [];
    $.each(response['rates'], function(key, value){
        rates[key.toLowerCase()] = value;
    });

    if(isNaN(Number(input[1])) || input.length<4){
        result[0] = "Please provide a number, a from-currency and a to-currency.</br>Example:</br>200 USD EUR.";
        return result;
    }

    if(typeof rates[input[2]] === 'undefined'){
        result[0] = "Could not find the rates of " + input[2].toUpperCase() + ".";
        return result;
    }

    if(typeof rates[input[3]] === 'undefined'){
        result[0] = "Could not find the rates of " + input[3].toUpperCase() + ".";
        return result;
    }

    var calc = (input[1] / Number(rates[input[2]])) * Number(rates[input[3]]) + ".";
    result[0] = calc;
    return result;
}

function getWhat(input){
    var what = input[1];
    var result = [];
    $.ajax({
        url: "https://openexchangerates.org/api/currencies.json",
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function(key, value){
                if(what == key.toLowerCase() || what.indexOf(value.toLowerCase())!=-1 && what.length != 3 || value.toLowerCase().indexOf(what) !=-1 && what.length != 3){
                    result[0] = key + " => " + value + ".";
                }
            });
            if(typeof result[0] == 'undefined'){
                result[0] = input[1].toUpperCase() + " is not a valid currency.";
            }
        }
    });
    return result;
}

function getWhere(currency){
    var currencies = [];
    $.ajax({
        url: "/json/countries/countrycurrencies.json",
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function(key, value){
                currencies[key] = value.toLowerCase();
            });
        }
    });

    var result = []
    var loop = 0;
    $.ajax({
        url: "/json/countries/countrynames.json",
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function(key, value){
                if(currencies[key] == currency){
                    result[loop] = value;
                    loop++;
                }
            });
        }
    });
    if(typeof result[0] === 'undefined'){
        result[0] = currency.toUpperCase() + " is not a valid currency.";
    }
    return result;
}

function getCountry(country){
    var countryCode;
    var result = [];
    var loop = 0;
    $.ajax({
        url: "/json/countries/countrynames.json",
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function(key, value){
                if(country == value.toLowerCase()){
                    countryCode = key;
                }
            });
        }
    });

    $.ajax({
        url: "/json/countries/countrycurrencies.json",
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function(key, value){
                if(countryCode == key){
                    result[0] = value;
                    return false;
                }
            });
            if(typeof result[0] === 'undefined'){
                result[0] = country.toUpperCase() + " was not found in list of countries.";
            }
        }
    });

    return result;
}

function reloadRates(){
    var result = [];
    $.ajax({
        method: 'get',
        url: "/command/currency/reload",
        data: {},
        async: false
    }).error(function (msg) {
        result[0] = "Error reloading rates.";
    }).done(function (response){
        result[0] = "Rates have been reloaded.";
    });
    return result;
}