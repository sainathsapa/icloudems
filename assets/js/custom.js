function addQuestion(id) {

    $("#submitbtn").removeAttr("disabled");
    // Function select qns from Bank and add to Qpaper

    // Setting Up IDS
    let questionID = "#qns" + id + "id";
    let maxMarksID = "#mxMarks" + id + "id";
    let coMapingID = "#comap" + id + "id";
    let difficultyID = "#diffLVL" + id + "id";

    //GETIING SELECT VALUES
    let coMAPValue = $(coMapingID).val();
    let difficultyValue = $(difficultyID).val();
    let selectedcomapvalue = "#comap" + id + "a option[value=" + coMAPValue + "]";
    let selectedDifficultValue = "#difficult" + id + "a option[value=" + difficultyValue + "]";
    $("#sections").attr("disabled", true);
    let sectionsValue = $("#sections").val();
   // $("#sectionValue").val(sectionsValue);
    let iterValueForSection = 0;
    let emptySectionElement = '';
    let arrayOFSections = ["A", "B", "C", "D"];
    while (iterValueForSection < sectionsValue) {

        emptySectionElement += '<option value="' + arrayOFSections[iterValueForSection] + '">' + arrayOFSections[iterValueForSection] + '</option>';
        iterValueForSection++;

    }
    let startSectionCode = '<select name="section[]" class="form-select form-control">';
    let endSectionCode = '</select>'

    //creating appendable element
    let addElement = '<tr id="row' + id + 'id"><td>' + id + '</td><td><input type="text" class="form-control" name="qns[]" value="' + $(questionID).val() + '" readonly id="qns' + id + 'id"/></td><td>' + startSectionCode + emptySectionElement + endSectionCode + '</td><td><input type="text" class="form-control" name="maxMarks[]" value="' + $(maxMarksID).val() + '" id="maxMarks' + id + 'id" readonly required/></td><td><select class="form-control" type="text" name="COMAP[]" id="comap' + id + 'a" required disabled ><option value="CO1">CO1</option><option value="CO2">CO2</option><option value="CO3">CO3</option><option value="CO4">CO4</option></select><td><select class="form-control" type="text" name="diffcult[]" id="difficult' + id + 'a" required disabled ><option value="Remember">Remember</option><option value="Understand">Understand</option><option value="Apply">Apply</option><option value="Learn">Learn</option></select></td><td><button type="button" class="btn btn-primary" onclick="edit_qns_row(' + id + '); changeFlag();" id="btn' + id + 'id">Edit</button>  <button type="button" class="btn btn-danger" onclick="delete_qns_row(' + id + ');">Delete</button></td></tr>';

    $("#added-qns").append(addElement); //adding element


    //presetting the selected values
    $(selectedcomapvalue).prop("selected", true);
    $(selectedDifficultValue).prop("selected", true);




}


let flag = 0;
//function to edit the added row if any
function edit_qns_row(idtest) {

    if (flag == 0) {
        let comapEditID = "#comap" + idtest + "a"; $(comapEditID).removeAttr("disabled"); let difficultEditID = "#difficult" + idtest + "a"; $(difficultEditID).removeAttr("disabled"); let maxMarksEditID = "#maxMarks" + idtest + "id"; $(maxMarksEditID).removeAttr("readonly"); let btnID = "#btn" + idtest + "id"; $(btnID).html("Done");
        flag = 1;

    }
    else {
        let comapEditID = "#comap" + idtest + "a"; $(comapEditID).attr("disabled", true); let difficultEditID = "#difficult" + idtest + "a"; $(difficultEditID).attr("disabled", true); let questionEditID = "#qns" + idtest + "id"; $(questionEditID).attr("readonly", true); let maxMarksEditID = "#maxMarks" + idtest + "id"; $(maxMarksEditID).attr("readonly", true); let btnID = "#btn" + idtest + "id"; $(btnID).html("Edit");

        flag = 0;
    }
}


//function to delete the the added row and show the question in bank
function delete_qns_row(idtest) {
    let deleteRowID = "#row" + idtest + "id"; $(deleteRowID).remove();
    let rowID = '#row_sub_qns' + idtest + 'id';
    $(rowID).show();

}

