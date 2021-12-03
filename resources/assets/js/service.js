$(document).ready(function() {
    function getProject(selectedProject) {

        let projectId = selectedProject.value;
    
        $.ajax({
            url: url,
            success: function (result) {
                let projectStartDate = result.project.start_date;
                $("#date").attr({
    
                    "min": projectStartDate,
    
                });
            }
        });
    }
});
