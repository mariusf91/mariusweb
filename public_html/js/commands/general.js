$.getScript("/js/mathjs.js", function () { /* Optional function */
});
$.getScript("/js/commands/mathCommands.js", function () { /* Optional function */
});
$.getScript("/js/commands/currencyCommands.js", function () { /* Optional function */
});
$.getScript("/js/commands/databaseCommands.js", function () { /* Optional function */
});


var save = "";

function commandInput(input) {
    input = save + input;
    input = input.replace(' ', '?ACTION?');
    var command = input.split('?ACTION?');
    var complete = commandSwitch(command[0], command[1]);
    return complete;
}

function commandSwitch(keyword, action) {
    var result = [];
    var complete = "<tr class='area-text-blue'><td class='area-td-blue'>" + keyword.toUpperCase() + " " + action.toUpperCase() + "</td></tr>";
    switch (keyword) {
        case "save":
            save = action + " ";
            result[0] = "Save set to " + action.toUpperCase();
            break;
        case "math":
            result = mathCommand(action);
            break;
        case "currency":
        case "cur":
            result = currencyCommand(action);
            break;
        case "db":
        case "database":
            result = databaseCommand(action);
            break;
        default:
            result[0] = "Invalid command " + keyword.toUpperCase();
            break;

    }
    complete += "<tr class='area-text-green'><td class='area-td-green'>";
    $.each(result, function (index, value) {
        complete += value + "</br>";
    });
    complete += "</td></tr><tr><td class='area-td-space'></td></tr>";
    commandFinish();
    return complete;
}

function commandFinish() {
    var soundEnter = new Audio('/sounds/typing/enter1.wav');
    soundEnter.pause();
    soundEnter.currentTime = 0;
    soundEnter.play();
}