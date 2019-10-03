function togTables(table) {
    if($('#'+table).hasClass("activeTable")) {
        $('#'+table).removeClass("activeTable");
        $('#'+table).slideToggle("fast");
    }
    else {
        $('.activeTable').slideToggle("fast");
        $('.activeTable').removeClass("activeTable");
        $('#'+table).slideToggle("slow");
        $('#'+table).addClass("activeTable");
    }
}

function togForms(form) {
    if($('.'+form).hasClass("activeForm")) {
        $('.'+form).removeClass("activeForm");
        $('.'+form).slideToggle("fast");
    }
    else {
        $('.activeForm').slideToggle("fast");
        $('.activeForm').removeClass("activeForm");
        $('.'+form).slideToggle("slow");
        $('.'+form).addClass("activeForm");
    }	
}