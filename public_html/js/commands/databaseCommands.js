function databaseCommand(input){
    var result = [];
    var keywords = input.split(" ");
    switch(keywords[0]){
        case "create":
            result[0] = "Function not implemented.";
            break;

        case "read":
            result =  dbRead(keywords[1]);
            break;

        case "update":
            result[0] = "Function not implemented.";
            break;

        case "delete":
            result[0] = "Function not implemented.";
            break;

        default:
            result[0] = keywords[0] + " is not a valid CRUD command."
            break;
    }
    return result;
}

function dbCreate(){

}

function dbRead(table){
    var result = [];
    $.ajax({
       'url': '/command/database/read',
        'method': 'POST',
        'data': {table: table.toLowerCase()},
        'async': false
    }).error(function (msg){
        result[0] = "Unable to read " + table.toUpperCase();
    }).done(function (response){
        result[0] = response;
    });
    return result;
}

function dbUpdate(){

}

function dbDelete(){

}