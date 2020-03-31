$(function(){$('#isviolentCheck').click(function() {
       $(isviolentBox).val() == "yes" ? violent_no() : violent_yes();
    });
});
function violent_no() {
    $('#isviolentBox').val("no");
    $('#isviolentCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function violent_yes() {
    $('#isviolentBox').val("yes");
    $('#isviolentCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#ismentalCheck').click(function() {
       $(ismentalBox).val() == "yes" ? mental_no() : mental_yes();
    });
});
function mental_no() {
    $('#ismentalBox').val("no");
    $('#ismentalCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function mental_yes() {
    $('#ismentalBox').val("yes");
    $('#ismentalCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#ispolhateCheck').click(function() {
       $(ispolhateBox).val() == "yes" ? polhate_no() : polhate_yes();
    });
});
function polhate_no() {
    $('#ispolhateBox').val("no");
    $('#ispolhateCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function polhate_yes() {
    $('#ispolhateBox').val("yes");
    $('#ispolhateCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#gangaffCheck').click(function() {
       $(gangaffBox).val() == "yes" ? ganaff_no() : ganaff_yes();
    });
});
function ganaff_no() {
    $('#gangaffBox').val("no");
    $('#gangaffCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function ganaff_yes() {
    $('#gangaffBox').val("yes");
    $('#gangaffCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#wepcarryCheck').click(function() {
       $(wepcarryBox).val() == "yes" ? wepcarry_no() : wepcarry_yes();
    });
});
function wepcarry_no() {
    $('#wepcarryBox').val("no");
    $('#wepcarryCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function wepcarry_yes() {
    $('#wepcarryBox').val("yes");
    $('#wepcarryCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#druguserCheck').click(function() {
       $(druguserBox).val() == "yes" ? drugeruser_no() : drugeruser_yes();
    });
});
function drugeruser_no() {
    $('#druguserBox').val("no");
    $('#druguserCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function drugeruser_yes() {
    $('#druguserBox').val("yes");
    $('#druguserCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#drugdistCheck').click(function() {
       $(drugdistBox).val() == "yes" ? drugerdist_no() : drugerdist_yes();
    });
});
function drugerdist_no() {
    $('#drugdistBox').val("no");
    $('#drugdistCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function drugerdist_yes() {
    $('#drugdistBox').val("yes");
    $('#drugdistCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#escaperiskCheck').click(function() {
       $(escaperiskBox).val() == "yes" ? escape_no() : escape_yes();
    });
});
function escape_no() {
    $('#escaperiskBox').val("no");
    $('#escaperiskCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function escape_yes() {
    $('#escaperiskBox').val("yes");
    $('#escaperiskCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
////////////////////////////////////////////////////////////////////////////////
$(function(){$('#felonyconCheck').click(function() {
       $(felonyconBox).val() == "yes" ? felonycon_no() : felonycon_yes();
    });
});
function felonycon_no() {
    $('#felonyconBox').val("no");
    $('#felonyconCheck').removeClass("CautionLabelActive").addClass("CautionLabel");
    // do play
}
function felonycon_yes() {
    $('#felonyconBox').val("yes");
    $('#felonyconCheck').removeClass("CautionLabel").addClass("CautionLabelActive");
    // do pause
}
